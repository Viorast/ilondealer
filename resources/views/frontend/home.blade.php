@extends('layouts.app')

@section('title', 'BYD Indonesia - Dealer Resmi Mobil Listrik')

@section('content')
    <!-- Hero Section -->
    <section style="background: linear-gradient(135deg, #003DA5 0%, #001f5c 100%); padding: 5rem 2rem; position: relative; overflow: hidden;">
        <div style="position: absolute; top: 0; right: 0; width: 50%; height: 100%; opacity: 0.1;">
            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
                <circle cx="100" cy="100" r="80" fill="white"/>
            </svg>
        </div>
        <div style="max-width: 1400px; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div style="color: white;">
                <h1 style="font-size: 3rem; font-weight: 800; line-height: 1.2; margin-bottom: 1.5rem;">
                    Build Your Dreams<br>
                    <span style="color: #00A3E0;">Mobil Listrik Masa Depan</span>
                </h1>
                <p style="font-size: 1.125rem; color: rgba(255,255,255,0.8); margin-bottom: 2rem; line-height: 1.8;">
                    Temukan revolusi berkendara dengan mobil listrik BYD. Teknologi terdepan, performa luar biasa, dan ramah lingkungan untuk masa depan Indonesia yang lebih hijau.
                </p>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="{{ route('katalog') }}" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1rem;">
                        <i class="fas fa-arrow-right"></i> Lihat Katalog
                    </a>
                    <a href="{{ route('tentang') }}" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; background: transparent; border-color: white; color: white;">
                        <i class="fas fa-info-circle"></i> Tentang Kami
                    </a>
                </div>
            </div>
            <div style="text-align: center;">
                <div style="background: rgba(255,255,255,0.1); border-radius: 20px; padding: 3rem; backdrop-filter: blur(10px);">
                    <i class="fas fa-car-side" style="font-size: 8rem; color: white; opacity: 0.9;"></i>
                    <p style="color: rgba(255,255,255,0.8); margin-top: 1rem; font-size: 1.25rem;">BYD Electric Vehicles</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section style="padding: 4rem 2rem; background: white;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; text-align: center;">
                <div style="padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #003DA5, #00A3E0); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-car" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <p style="font-size: 2.5rem; font-weight: 800; color: #003DA5;">{{ $stats['total_model'] }}+</p>
                    <p style="color: #6b7280;">Model Tersedia</p>
                </div>
                <div style="padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #10b981, #059669); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-leaf" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <p style="font-size: 2.5rem; font-weight: 800; color: #10b981;">100%</p>
                    <p style="color: #6b7280;">Ramah Lingkungan</p>
                </div>
                <div style="padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-bolt" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <p style="font-size: 2.5rem; font-weight: 800; color: #f59e0b;">{{ $stats['unit_terjual'] }}+</p>
                    <p style="color: #6b7280;">Unit Terjual</p>
                </div>
                <div style="padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, #8b5cf6, #7c3aed); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                        <i class="fas fa-calendar" style="font-size: 2rem; color: white;"></i>
                    </div>
                    <p style="font-size: 2.5rem; font-weight: 800; color: #8b5cf6;">{{ date('Y') - $stats['tahun_berdiri'] }}+</p>
                    <p style="color: #6b7280;">Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars -->
    <section style="padding: 5rem 2rem; background: #f9fafb;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-size: 2.25rem; font-weight: 800; color: #111827; margin-bottom: 1rem;">
                    Mobil <span style="color: #003DA5;">Unggulan</span>
                </h2>
                <p style="color: #6b7280; max-width: 600px; margin: 0 auto;">
                    Jelajahi koleksi mobil listrik BYD terbaru dengan teknologi mutakhir dan desain yang memukau.
                </p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem;">
                @forelse($featuredMobils as $mobil)
                    <div class="card" style="transition: all 0.3s ease;">
                        <div style="position: relative; height: 220px; background: linear-gradient(135deg, #e5e7eb, #f3f4f6); overflow: hidden;">
                            @if($mobil->foto)
                                <img src="{{ $mobil->foto_url }}" alt="{{ $mobil->nama_mobil }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                    <i class="fas fa-car" style="font-size: 4rem; color: #9ca3af;"></i>
                                </div>
                            @endif
                            <span class="badge badge-primary" style="position: absolute; top: 1rem; left: 1rem;">
                                {{ $mobil->tipe }}
                            </span>
                            @if($mobil->stok > 0)
                                <span class="badge badge-success" style="position: absolute; top: 1rem; right: 1rem;">
                                    <i class="fas fa-check"></i> Tersedia
                                </span>
                            @else
                                <span class="badge badge-danger" style="position: absolute; top: 1rem; right: 1rem;">
                                    <i class="fas fa-times"></i> Habis
                                </span>
                            @endif
                        </div>
                        <div style="padding: 1.5rem;">
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">
                                {{ $mobil->nama_mobil }}
                            </h3>
                            <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 1rem;">
                                {{ $mobil->tahun_produksi }} • {{ $mobil->warna }}
                            </p>
                            <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                                <span style="font-size: 0.8125rem; color: #6b7280;">
                                    <i class="fas fa-battery-full" style="color: #10b981;"></i> {{ $mobil->kapasitas_baterai ?? '-' }}
                                </span>
                                <span style="font-size: 0.8125rem; color: #6b7280;">
                                    <i class="fas fa-road" style="color: #3b82f6;"></i> {{ $mobil->jarak_tempuh ?? '-' }}
                                </span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                                <p style="font-size: 1.25rem; font-weight: 800; color: #003DA5;">
                                    {{ $mobil->formatted_harga }}
                                </p>
                                <a href="{{ route('mobil.detail', $mobil->id_mobil) }}" class="btn btn-primary btn-sm">
                                    Detail <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem 2rem;">
                        <i class="fas fa-car" style="font-size: 4rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                        <p style="color: #6b7280;">Belum ada mobil tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('katalog') }}" class="btn btn-primary" style="padding: 1rem 2.5rem;">
                    Lihat Semua Mobil <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    @media (max-width: 1024px) {
        section:first-child > div {
            grid-template-columns: 1fr !important;
            text-align: center;
        }
        section:first-child > div > div:last-child {
            display: none;
        }
        section:first-child h1 {
            font-size: 2rem !important;
        }
    }

    @media (max-width: 768px) {
        section:nth-child(2) > div > div {
            grid-template-columns: repeat(2, 1fr) !important;
        }
    }

    @media (max-width: 480px) {
        section:nth-child(2) > div > div {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
