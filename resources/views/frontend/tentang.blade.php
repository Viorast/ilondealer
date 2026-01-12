@extends('layouts.app')

@section('title', 'Tentang Kami - BYD Indonesia')

@section('content')
    <!-- Page Header -->
    <section style="background: linear-gradient(135deg, #003DA5 0%, #001f5c 100%); padding: 3rem 2rem; text-align: center; color: white;">
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 0.5rem;">Tentang Kami</h1>
        <p style="opacity: 0.8;">Mengenal lebih dekat BYD Indonesia</p>
    </section>

    <!-- About Section -->
    <section style="padding: 4rem 2rem;">
        <div style="max-width: 1000px; margin: 0 auto;">
            <div class="card" style="padding: 3rem;">
                <div style="text-align: center; margin-bottom: 3rem;">
                    <div style="width: 100px; height: 100px; background: linear-gradient(135deg, #003DA5, #00A3E0); border-radius: 20px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                        <i class="fas fa-car-side" style="font-size: 2.5rem; color: white;"></i>
                    </div>
                    <h2 style="font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 1rem;">
                        BYD Indonesia - Dealer Resmi
                    </h2>
                    <p style="color: #6b7280; line-height: 1.8; max-width: 700px; margin: 0 auto;">
                        BYD (Build Your Dreams) adalah produsen mobil listrik terkemuka dunia dari China. Sebagai dealer resmi BYD di Indonesia, 
                        kami berkomitmen untuk membawa revolusi transportasi berkelanjutan ke nusantara dengan menyediakan mobil listrik 
                        berkualitas tinggi dengan teknologi terdepan.
                    </p>
                </div>

                <!-- Vision Mission -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 3rem;">
                    <div style="background: #f9fafb; border-radius: 12px; padding: 2rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            <i class="fas fa-eye" style="color: #003DA5; font-size: 1.25rem;"></i>
                            <h3 style="font-weight: 700; color: #111827;">Visi</h3>
                        </div>
                        <p style="color: #6b7280; line-height: 1.8;">
                            Menjadi dealer mobil listrik terdepan di Indonesia yang memberikan layanan terbaik 
                            dan kontribusi nyata terhadap lingkungan yang lebih bersih dan sehat.
                        </p>
                    </div>
                    <div style="background: #f9fafb; border-radius: 12px; padding: 2rem;">
                        <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                            <i class="fas fa-bullseye" style="color: #10b981; font-size: 1.25rem;"></i>
                            <h3 style="font-weight: 700; color: #111827;">Misi</h3>
                        </div>
                        <p style="color: #6b7280; line-height: 1.8;">
                            Menyediakan mobil listrik berkualitas dengan harga kompetitif, pelayanan prima, 
                            dan edukasi tentang kendaraan listrik kepada masyarakat Indonesia.
                        </p>
                    </div>
                </div>

                <!-- Why Choose Us -->
                <div style="margin-bottom: 3rem;">
                    <h3 style="font-size: 1.25rem; font-weight: 700; color: #111827; text-align: center; margin-bottom: 2rem;">
                        Mengapa Memilih Kami?
                    </h3>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem;">
                        <div style="text-align: center; padding: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: #dbeafe; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-certificate" style="color: #2563eb; font-size: 1.25rem;"></i>
                            </div>
                            <h4 style="font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Dealer Resmi</h4>
                            <p style="color: #6b7280; font-size: 0.875rem;">Dealer resmi BYD dengan garansi dan after-sales terpercaya</p>
                        </div>
                        <div style="text-align: center; padding: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: #dcfce7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-headset" style="color: #16a34a; font-size: 1.25rem;"></i>
                            </div>
                            <h4 style="font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Layanan 24/7</h4>
                            <p style="color: #6b7280; font-size: 0.875rem;">Tim support siap membantu kapanpun Anda membutuhkan</p>
                        </div>
                        <div style="text-align: center; padding: 1.5rem;">
                            <div style="width: 60px; height: 60px; background: #fef3c7; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                                <i class="fas fa-hand-holding-usd" style="color: #d97706; font-size: 1.25rem;"></i>
                            </div>
                            <h4 style="font-weight: 600; color: #111827; margin-bottom: 0.5rem;">Harga Terbaik</h4>
                            <p style="color: #6b7280; font-size: 0.875rem;">Penawaran harga kompetitif dengan berbagai promo menarik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<style>
    @media (max-width: 768px) {
        section:nth-child(2) .card > div:nth-child(2),
        section:nth-child(2) .card > div:nth-child(3) > div,
        section:last-child > div > div {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
