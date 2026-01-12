@extends('layouts.admin')

@section('page-title', 'Manajemen Mobil')

@section('content')
    <!-- Header Actions -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
        <div>
            <form action="{{ route('admin.mobil.index') }}" method="GET" style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                <div style="position: relative;">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari model mobil..." 
                        style="padding: 0.625rem 1rem 0.625rem 2.5rem; border: 1px solid #d1d5db; border-radius: 8px; width: 280px; font-size: 0.875rem;">
                    <i class="fas fa-search" style="position: absolute; left: 0.875rem; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                </div>
                <select name="tipe" onchange="this.form.submit()" style="padding: 0.625rem 1rem; border: 1px solid #d1d5db; border-radius: 8px; font-size: 0.875rem; background: white;">
                    <option value="">Semua Tipe</option>
                    <option value="Sedan" {{ request('tipe') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="SUV" {{ request('tipe') == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="MPV" {{ request('tipe') == 'MPV' ? 'selected' : '' }}>MPV</option>
                    <option value="Hatchback" {{ request('tipe') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                </select>
                <button type="submit" class="btn btn-secondary btn-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
                @if(request('search') || request('tipe'))
                    <a href="{{ route('admin.mobil.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-times"></i> Reset
                    </a>
                @endif
            </form>
        </div>
        <a href="{{ route('admin.mobil.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mobil
        </a>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="card-header">
            <h3>Data Mobil</h3>
            <span style="color: #6b7280; font-size: 0.875rem;">
                Total: {{ $mobils->total() }} mobil
            </span>
        </div>
        <div class="card-body" style="padding: 0;">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th style="width: 80px;">Foto</th>
                            <th>Model</th>
                            <th>Tipe</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th style="width: 140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($mobils as $mobil)
                            <tr>
                                <td style="color: #6b7280;">#{{ $mobil->id_mobil }}</td>
                                <td>
                                    @if($mobil->foto)
                                        <img src="{{ $mobil->foto_url }}" alt="{{ $mobil->nama_mobil }}" class="thumbnail">
                                    @else
                                        <div style="width: 60px; height: 45px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-car" style="color: #9ca3af;"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $mobil->nama_mobil }}</strong>
                                    <br><small style="color: #6b7280;">{{ $mobil->warna }}</small>
                                </td>
                                <td><span class="badge" style="background: #dbeafe; color: #2563eb;">{{ $mobil->tipe }}</span></td>
                                <td>{{ $mobil->tahun_produksi }}</td>
                                <td style="font-weight: 600; color: #003DA5;">{{ $mobil->formatted_harga }}</td>
                                <td>
                                    @if($mobil->stok > 0)
                                        <span class="badge badge-success">{{ $mobil->stok }} unit</span>
                                    @else
                                        <span class="badge badge-danger">Habis</span>
                                    @endif
                                </td>
                                <td>
                                    <div style="display: flex; gap: 0.5rem;">
                                        <a href="{{ route('admin.mobil.edit', $mobil->id_mobil) }}" class="btn btn-secondary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.mobil.destroy', $mobil->id_mobil) }}" method="POST" 
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center; padding: 3rem; color: #6b7280;">
                                    <i class="fas fa-car" style="font-size: 2.5rem; margin-bottom: 1rem; display: block; color: #d1d5db;"></i>
                                    @if(request('search') || request('tipe'))
                                        Tidak ada mobil yang sesuai filter
                                    @else
                                        Belum ada data mobil
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    @if($mobils->hasPages())
        <div class="pagination" style="margin-top: 1.5rem;">
            {{ $mobils->links() }}
        </div>
    @endif
@endsection
