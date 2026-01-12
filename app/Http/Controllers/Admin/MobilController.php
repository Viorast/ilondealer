<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mobil::query();

        // Search
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Filter by tipe
        if ($request->has('tipe') && $request->tipe) {
            $query->byTipe($request->tipe);
        }

        $mobils = $query->latest()->paginate(10)->withQueryString();

        return view('admin.mobil.index', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:100',
            'tipe' => 'required|in:Sedan,SUV,MPV,Hatchback',
            'tahun_produksi' => 'required|integer|min:2020|max:' . (date('Y') + 1),
            'harga' => 'required|numeric|min:0',
            'warna' => 'required|string|max:50',
            'kapasitas_baterai' => 'nullable|string|max:50',
            'jarak_tempuh' => 'nullable|string|max:50',
            'waktu_charging' => 'nullable|string|max:50',
            'transmisi' => 'required|string|max:30',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ], [
            'nama_mobil.required' => 'Nama mobil wajib diisi.',
            'tipe.required' => 'Tipe mobil wajib dipilih.',
            'tipe.in' => 'Tipe mobil tidak valid.',
            'tahun_produksi.required' => 'Tahun produksi wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.min' => 'Stok tidak boleh negatif.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/mobil'), $filename);
            $validated['foto'] = $filename;
        }

        Mobil::create($validated);

        return redirect()->route('admin.mobil.index')->with('success', 'Data mobil berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mobil $mobil)
    {
        return view('admin.mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('admin.mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mobil $mobil)
    {
        $validated = $request->validate([
            'nama_mobil' => 'required|string|max:100',
            'tipe' => 'required|in:Sedan,SUV,MPV,Hatchback',
            'tahun_produksi' => 'required|integer|min:2020|max:' . (date('Y') + 1),
            'harga' => 'required|numeric|min:0',
            'warna' => 'required|string|max:50',
            'kapasitas_baterai' => 'nullable|string|max:50',
            'jarak_tempuh' => 'nullable|string|max:50',
            'waktu_charging' => 'nullable|string|max:50',
            'transmisi' => 'required|string|max:30',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        // Handle foto upload
        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($mobil->foto && file_exists(public_path('images/mobil/' . $mobil->foto))) {
                unlink(public_path('images/mobil/' . $mobil->foto));
            }
            
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/mobil'), $filename);
            $validated['foto'] = $filename;
        }

        $mobil->update($validated);

        return redirect()->route('admin.mobil.index')->with('success', 'Data mobil berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        // Delete photo file
        if ($mobil->foto && file_exists(public_path('images/mobil/' . $mobil->foto))) {
            unlink(public_path('images/mobil/' . $mobil->foto));
        }

        $mobil->delete();

        return redirect()->route('admin.mobil.index')->with('success', 'Data mobil berhasil dihapus!');
    }
}
