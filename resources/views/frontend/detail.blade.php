@extends('layouts.app')

@section('title', $mobil->nama_mobil . ' - BYD Indonesia')

@section('content')
    <!-- Breadcrumb -->
    <div style="background: #f3f4f6; padding: 1rem 2rem;">
        <div style="max-width: 1400px; margin: 0 auto; display: flex; gap: 0.5rem; font-size: 0.875rem;">
            <a href="{{ route('home') }}" style="color: #6b7280; text-decoration: none;">Home</a>
            <span style="color: #9ca3af;">/</span>
            <a href="{{ route('katalog') }}" style="color: #6b7280; text-decoration: none;">Katalog</a>
            <span style="color: #9ca3af;">/</span>
            <span style="color: #003DA5; font-weight: 500;">{{ $mobil->nama_mobil }}</span>
        </div>
    </div>

    <!-- Detail Section -->
    <section style="padding: 3rem 2rem;">
        <div style="max-width: 1400px; margin: 0 auto;">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem;">
                <!-- Image Section -->
                <div>
                    <div style="background: linear-gradient(135deg, #f3f4f6, #e5e7eb); border-radius: 16px; overflow: hidden; aspect-ratio: 16/10; display: flex; align-items: center; justify-content: center;">
                        @if($mobil->foto)
                            <img src="{{ $mobil->foto_url }}" alt="{{ $mobil->nama_mobil }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-car" style="font-size: 6rem; color: #9ca3af;"></i>
                        @endif
                    </div>
                </div>

                <!-- Info Section -->
                <div>
                    <div style="display: flex; gap: 0.75rem; margin-bottom: 1rem;">
                        <span class="badge badge-primary">{{ $mobil->tipe }}</span>
                        @if($mobil->stok > 0)
                            <span class="badge badge-success"><i class="fas fa-check"></i> Tersedia ({{ $mobil->stok }} unit)</span>
                        @else
                            <span class="badge badge-danger"><i class="fas fa-times"></i> Stok Habis</span>
                        @endif
                    </div>

                    <h1 style="font-size: 2.25rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem;">
                        {{ $mobil->nama_mobil }}
                    </h1>
                    <p style="color: #6b7280; margin-bottom: 1.5rem;">
                        Tahun {{ $mobil->tahun_produksi }} • {{ $mobil->warna }} • {{ $mobil->transmisi }}
                    </p>

                    <div style="background: linear-gradient(135deg, #003DA5 0%, #00A3E0 100%); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem;">
                        <p style="color: rgba(255,255,255,0.8); font-size: 0.875rem; margin-bottom: 0.25rem;">Harga</p>
                        <p style="color: white; font-size: 2rem; font-weight: 800;">{{ $mobil->formatted_harga }}</p>
                    </div>

                    <!-- Quick Specs -->
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-bottom: 2rem;">
                        <div style="background: #f9fafb; border-radius: 10px; padding: 1rem; text-align: center;">
                            <i class="fas fa-battery-full" style="font-size: 1.5rem; color: #10b981; margin-bottom: 0.5rem;"></i>
                            <p style="font-size: 0.75rem; color: #6b7280;">Kapasitas Baterai</p>
                            <p style="font-weight: 700; color: #111827;">{{ $mobil->kapasitas_baterai ?? '-' }}</p>
                        </div>
                        <div style="background: #f9fafb; border-radius: 10px; padding: 1rem; text-align: center;">
                            <i class="fas fa-road" style="font-size: 1.5rem; color: #3b82f6; margin-bottom: 0.5rem;"></i>
                            <p style="font-size: 0.75rem; color: #6b7280;">Jarak Tempuh</p>
                            <p style="font-weight: 700; color: #111827;">{{ $mobil->jarak_tempuh ?? '-' }}</p>
                        </div>
                        <div style="background: #f9fafb; border-radius: 10px; padding: 1rem; text-align: center;">
                            <i class="fas fa-bolt" style="font-size: 1.5rem; color: #f59e0b; margin-bottom: 0.5rem;"></i>
                            <p style="font-size: 0.75rem; color: #6b7280;">Waktu Charging</p>
                            <p style="font-weight: 700; color: #111827;">{{ $mobil->waktu_charging ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-success" style="flex: 1; justify-content: center; padding: 1rem 2rem; font-size: 1rem;">
                            <i class="fab fa-whatsapp"></i> Hubungi Kami via WhatsApp
                        </a>
                        <a href="{{ route('katalog') }}" class="btn btn-secondary" style="padding: 1rem 2rem;">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Full Specifications -->
            <div style="margin-top: 4rem;">
                <h2 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 1.5rem;">
                    <i class="fas fa-list-ul" style="color: #003DA5;"></i> Spesifikasi Lengkap
                </h2>
                <div class="card" style="overflow: hidden;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500; width: 30%;">Nama Mobil</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->nama_mobil }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Tipe</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->tipe }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Tahun Produksi</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->tahun_produksi }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Warna</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->warna }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Transmisi</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->transmisi }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Kapasitas Baterai</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->kapasitas_baterai ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Jarak Tempuh</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->jarak_tempuh ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Waktu Charging</td>
                            <td style="padding: 1rem 1.5rem;">{{ $mobil->waktu_charging ?? '-' }}</td>
                        </tr>
                        <tr style="border-bottom: 1px solid #e5e7eb;">
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Harga</td>
                            <td style="padding: 1rem 1.5rem; font-weight: 700; color: #003DA5;">{{ $mobil->formatted_harga }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 1rem 1.5rem; background: #f9fafb; font-weight: 500;">Stok</td>
                            <td style="padding: 1rem 1.5rem;">
                                @if($mobil->stok > 0)
                                    <span class="badge badge-success">{{ $mobil->stok }} unit tersedia</span>
                                @else
                                    <span class="badge badge-danger">Stok Habis</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Description -->
            @if($mobil->deskripsi)
                <div style="margin-top: 3rem;">
                    <h2 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 1.5rem;">
                        <i class="fas fa-info-circle" style="color: #003DA5;"></i> Deskripsi
                    </h2>
                    <div class="card" style="padding: 1.5rem;">
                        <p style="line-height: 1.8; color: #374151;">{{ $mobil->deskripsi }}</p>
                    </div>
                </div>
            @endif

            <!-- Similar Cars -->
            @if($similarMobils->count() > 0)
                <div style="margin-top: 4rem;">
                    <h2 style="font-size: 1.5rem; font-weight: 700; color: #111827; margin-bottom: 1.5rem;">
                        <i class="fas fa-car" style="color: #003DA5;"></i> Mobil Serupa
                    </h2>
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                        @foreach($similarMobils as $similar)
                            <div class="card">
                                <div style="height: 180px; background: #f3f4f6; overflow: hidden;">
                                    @if($similar->foto)
                                        <img src="{{ $similar->foto_url }}" alt="{{ $similar->nama_mobil }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <div style="display: flex; align-items: center; justify-content: center; height: 100%;">
                                            <i class="fas fa-car" style="font-size: 2.5rem; color: #9ca3af;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div style="padding: 1.25rem;">
                                    <h3 style="font-size: 1rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">{{ $similar->nama_mobil }}</h3>
                                    <p style="font-size: 1rem; font-weight: 800; color: #003DA5; margin-bottom: 1rem;">{{ $similar->formatted_harga }}</p>
                                    <a href="{{ route('mobil.detail', $similar->id_mobil) }}" class="btn btn-primary btn-sm" style="width: 100%; justify-content: center;">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('styles')
<style>
    @media (max-width: 1024px) {
        section:first-of-type > div > div {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
