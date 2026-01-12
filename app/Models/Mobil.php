<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'nama_mobil',
        'tipe',
        'tahun_produksi',
        'harga',
        'warna',
        'kapasitas_baterai',
        'jarak_tempuh',
        'waktu_charging',
        'transmisi',
        'stok',
        'foto',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'tahun_produksi' => 'integer',
            'stok' => 'integer',
        ];
    }

    /**
     * Get formatted price in IDR
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get full photo URL
     */
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto) {
            return asset('images/mobil/' . $this->foto);
        }
        return asset('images/no-image.svg');
    }

    /**
     * Scope for filtering by tipe
     */
    public function scopeByTipe($query, $tipe)
    {
        if ($tipe) {
            return $query->where('tipe', $tipe);
        }
        return $query;
    }

    /**
     * Scope for filtering by price range
     */
    public function scopeByPriceRange($query, $min = null, $max = null)
    {
        if ($min) {
            $query->where('harga', '>=', $min);
        }
        if ($max) {
            $query->where('harga', '<=', $max);
        }
        return $query;
    }

    /**
     * Scope for filtering by year
     */
    public function scopeByYear($query, $year)
    {
        if ($year) {
            return $query->where('tahun_produksi', $year);
        }
        return $query;
    }

    /**
     * Scope for available stock
     */
    public function scopeAvailable($query)
    {
        return $query->where('stok', '>', 0);
    }

    /**
     * Scope for out of stock
     */
    public function scopeOutOfStock($query)
    {
        return $query->where('stok', '<=', 0);
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('nama_mobil', 'like', '%' . $search . '%');
        }
        return $query;
    }
}
