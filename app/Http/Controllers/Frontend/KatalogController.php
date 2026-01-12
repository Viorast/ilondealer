<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Show catalog with filtering
     */
    public function index(Request $request)
    {
        $query = Mobil::query();

        // Search by name
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Filter by tipe
        if ($request->has('tipe') && $request->tipe) {
            $query->byTipe($request->tipe);
        }

        // Filter by price range
        if ($request->has('harga_min') && $request->harga_min) {
            $query->where('harga', '>=', $request->harga_min);
        }
        if ($request->has('harga_max') && $request->harga_max) {
            $query->where('harga', '<=', $request->harga_max);
        }

        // Filter by year
        if ($request->has('tahun') && $request->tahun) {
            $query->byYear($request->tahun);
        }

        // Sorting
        $sort = $request->get('sort', 'terbaru');
        switch ($sort) {
            case 'harga_asc':
                $query->orderBy('harga', 'asc');
                break;
            case 'harga_desc':
                $query->orderBy('harga', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $mobils = $query->paginate(12)->withQueryString();

        // Get unique years for filter dropdown
        $years = Mobil::selectRaw('DISTINCT tahun_produksi')
            ->orderBy('tahun_produksi', 'desc')
            ->pluck('tahun_produksi');

        // Get price range
        $priceRange = [
            'min' => Mobil::min('harga'),
            'max' => Mobil::max('harga'),
        ];

        return view('frontend.katalog', compact('mobils', 'years', 'priceRange'));
    }
}
