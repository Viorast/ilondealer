@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <i class="fas fa-car"></i>
            </div>
            <div class="stat-content">
                <h4>Total Mobil</h4>
                <p>{{ $stats['total_mobil'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon green">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-content">
                <h4>Stok Tersedia</h4>
                <p>{{ $stats['tersedia'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon red">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stat-content">
                <h4>Stok Habis</h4>
                <p>{{ $stats['stok_habis'] }}</p>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon yellow">
                <i class="fas fa-coins"></i>
            </div>
            <div class="stat-content">
                <h4>Total Nilai Inventori</h4>
                <p style="font-size: 1.125rem;">Rp {{ number_format($stats['total_nilai'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Cars & Quick Actions -->
    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
        <!-- Recent Cars Table -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-clock" style="color: #3b82f6; margin-right: 0.5rem;"></i> Mobil Terbaru</h3>
                <a href="{{ route('admin.mobil.index') }}" class="btn btn-secondary btn-sm">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body" style="padding: 0;">
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Model</th>
                                <th>Tipe</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mobilTerbaru as $mobil)
                                <tr>
                                    <td>
                                        @if($mobil->foto)
                                            <img src="{{ $mobil->foto_url }}" alt="{{ $mobil->nama_mobil }}" class="thumbnail">
                                        @else
                                            <div style="width: 60px; height: 45px; background: #f3f4f6; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-car" style="color: #9ca3af;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td style="font-weight: 500;">{{ $mobil->nama_mobil }}</td>
                                    <td><span class="badge badge-primary" style="background: #dbeafe; color: #2563eb;">{{ $mobil->tipe }}</span></td>
                                    <td>{{ $mobil->formatted_harga }}</td>
                                    <td>
                                        @if($mobil->stok > 0)
                                            <span class="badge badge-success">{{ $mobil->stok }} unit</span>
                                        @else
                                            <span class="badge badge-danger">Habis</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center; padding: 2rem; color: #6b7280;">
                                        Belum ada data mobil
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-bolt" style="color: #f59e0b; margin-right: 0.5rem;"></i> Quick Actions</h3>
            </div>
            <div class="card-body">
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="{{ route('admin.mobil.create') }}" class="btn btn-primary" style="justify-content: center;">
                        <i class="fas fa-plus"></i> Tambah Mobil Baru
                    </a>
                    <a href="{{ route('admin.mobil.index') }}" class="btn btn-secondary" style="justify-content: center;">
                        <i class="fas fa-list"></i> Lihat Semua Mobil
                    </a>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-secondary" style="justify-content: center;">
                        <i class="fas fa-external-link-alt"></i> Lihat Website
                    </a>
                </div>

                <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid #e5e7eb;">

                <div style="text-align: center;">
                    <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">Logged in as</p>
                    <p style="font-weight: 600; color: #111827;">{{ session('admin_username', 'Admin') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    @media (max-width: 1024px) {
        .content > div:last-child {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endpush
