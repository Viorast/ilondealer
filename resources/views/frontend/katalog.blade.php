@extends('layouts.app')

@section('title', 'Katalog Mobil - BYD Indonesia')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #003DA5 0%, #001f5c 100%); padding: 3rem 2rem; text-align: center; color: white;">
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Katalog Mobil</h1>
        <p style="opacity: 0.8;">Temukan mobil listrik BYD yang sesuai dengan kebutuhan Anda</p>
    </section>

    <!-- Main Content -->
    <section style="padding: 3rem 2rem;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 280px 1fr; gap: 2rem;">
                <!-- Sidebar Filters -->
                <aside>
                    <div class="card" style="padding: 1.5rem; position: sticky; top: 100px;">
                        <h3 style="font-size: 1.125rem; font-weight: 700; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-filter" style="color: #003DA5;"></i> Filter
                        </h3>
                        
                        <form action="{{ route('katalog') }}" method="GET">
                            <!-- Search -->
                            <div style="margin-bottom: 1.25rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem; font-size: 0.8125rem;">Cari Mobil</label>
                                <div style="position: relative;">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nama model..." 
                                        style="width: 100%; padding: 0.625rem 1rem 0.625rem 2.25rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.875rem; transition: border-color 0.2s;"
                                        onfocus="this.style.borderColor='#003DA5'" onblur="this.style.borderColor='#e5e7eb'">
                                    <i class="fas fa-search" style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 0.8125rem;"></i>
                                </div>
                            </div>

                            <!-- Tipe -->
                            <div style="margin-bottom: 1.25rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem; font-size: 0.8125rem;">Tipe Mobil</label>
                                <select name="tipe" style="width: 100%; padding: 0.625rem 1rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.875rem; background: white; cursor: pointer;">
                                    <option value="">Semua Tipe</option>
                                    <option value="Sedan" {{ request('tipe') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                    <option value="SUV" {{ request('tipe') == 'SUV' ? 'selected' : '' }}>SUV</option>
                                    <option value="MPV" {{ request('tipe') == 'MPV' ? 'selected' : '' }}>MPV</option>
                                    <option value="Hatchback" {{ request('tipe') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                                </select>
                            </div>

                            <!-- Tahun -->
                            <div style="margin-bottom: 1.25rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem; font-size: 0.8125rem;">Tahun Produksi</label>
                                <select name="tahun" style="width: 100%; padding: 0.625rem 1rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.875rem; background: white; cursor: pointer;">
                                    <option value="">Semua Tahun</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ request('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Sorting -->
                            <div style="margin-bottom: 1.5rem;">
                                <label style="display: block; font-weight: 600; color: #374151; margin-bottom: 0.5rem; font-size: 0.8125rem;">Urutkan</label>
                                <select name="sort" style="width: 100%; padding: 0.625rem 1rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.875rem; background: white; cursor: pointer;">
                                    <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                    <option value="harga_asc" {{ request('sort') == 'harga_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                                    <option value="harga_desc" {{ request('sort') == 'harga_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                                </select>
                            </div>

                            <div style="display: flex; gap: 0.5rem;">
                                <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 0.625rem 1rem;">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <a href="{{ route('katalog') }}" class="btn btn-secondary" style="padding: 0.625rem 0.875rem;">
                                    <i class="fas fa-redo"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Cars Grid -->
                <div>
                    <!-- Results Info -->
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                        <p style="color: #6b7280;">
                            Menampilkan <strong>{{ $mobils->total() }}</strong> mobil
                        </p>
                    </div>

                    <!-- Grid -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                        @forelse($mobils as $mobil)
                            <div class="card">
                                <div style="position: relative; height: 200px; background: #f3f4f6; overflow: hidden;">
                                    @if($mobil->foto)
                                        <img src="{{ $mobil->foto_url }}" alt="{{ $mobil->nama_mobil }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                            <i class="fas fa-car" style="font-size: 3rem; color: #9ca3af;"></i>
                                        </div>
                                    @endif
                                    <span class="badge badge-primary" style="position: absolute; top: 0.75rem; left: 0.75rem;">
                                        {{ $mobil->tipe }}
                                    </span>
                                    @if($mobil->stok > 0)
                                        <span class="badge badge-success" style="position: absolute; top: 0.75rem; right: 0.75rem;">
                                            Stok: {{ $mobil->stok }}
                                        </span>
                                    @else
                                        <span class="badge badge-danger" style="position: absolute; top: 0.75rem; right: 0.75rem;">
                                            Habis
                                        </span>
                                    @endif
                                </div>
                                <div style="padding: 1.25rem;">
                                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #111827; margin-bottom: 0.25rem;">
                                        {{ $mobil->nama_mobil }}
                                    </h3>
                                    <p style="color: #6b7280; font-size: 0.8125rem; margin-bottom: 0.75rem;">
                                        {{ $mobil->tahun_produksi }} • {{ $mobil->warna }}
                                    </p>
                                    <div style="display: flex; gap: 0.75rem; margin-bottom: 1rem; font-size: 0.75rem; color: #6b7280;">
                                        <span><i class="fas fa-battery-full" style="color: #10b981;"></i> {{ $mobil->kapasitas_baterai ?? '-' }}</span>
                                        <span><i class="fas fa-road" style="color: #3b82f6;"></i> {{ $mobil->jarak_tempuh ?? '-' }}</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 0.75rem; border-top: 1px solid #e5e7eb;">
                                        <p style="font-size: 1.125rem; font-weight: 800; color: #003DA5;">
                                            {{ $mobil->formatted_harga }}
                                        </p>
                                        <a href="{{ route('mobil.detail', $mobil->id_mobil) }}" class="btn btn-primary btn-sm">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem; background: white; border-radius: 12px;">
                                <i class="fas fa-search" style="font-size: 3rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                                <h3 style="color: #374151; margin-bottom: 0.5rem;">Tidak Ada Hasil</h3>
                                <p style="color: #6b7280;">Coba ubah filter pencarian Anda</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($mobils->hasPages())
                        <div style="margin-top: 2rem;">
                            {{ $mobils->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    @media (max-width: 1024px) {
        section:last-child > div > div {
            grid-template-columns: 1fr !important;
        }
        aside > div {
            position: static !important;
        }
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .pagination > * {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        color: #374151;
        background: white;
        border: 1px solid #d1d5db;
    }
    
    .pagination > .active span,
    .pagination > *:hover:not(.disabled) {
        background: #003DA5;
        color: white;
        border-color: #003DA5;
    }
</style>
@endpush
