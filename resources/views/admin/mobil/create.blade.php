@extends('layouts.admin')

@section('page-title', 'Tambah Mobil Baru')

@section('content')
    <div style="max-width: 800px;">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-plus" style="color: #10b981; margin-right: 0.5rem;"></i> Tambah Mobil Baru</h3>
                <a href="{{ route('admin.mobil.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.mobil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                        <!-- Nama Mobil -->
                        <div class="form-group">
                            <label class="form-label">Nama Mobil <span style="color: red;">*</span></label>
                            <input type="text" name="nama_mobil" class="form-control @error('nama_mobil') error @enderror" 
                                value="{{ old('nama_mobil') }}" placeholder="e.g., BYD Seal" required>
                            @error('nama_mobil')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tipe -->
                        <div class="form-group">
                            <label class="form-label">Tipe <span style="color: red;">*</span></label>
                            <select name="tipe" class="form-control @error('tipe') error @enderror" required>
                                <option value="">Pilih Tipe</option>
                                <option value="Sedan" {{ old('tipe') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                                <option value="SUV" {{ old('tipe') == 'SUV' ? 'selected' : '' }}>SUV</option>
                                <option value="MPV" {{ old('tipe') == 'MPV' ? 'selected' : '' }}>MPV</option>
                                <option value="Hatchback" {{ old('tipe') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                            </select>
                            @error('tipe')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tahun Produksi -->
                        <div class="form-group">
                            <label class="form-label">Tahun Produksi <span style="color: red;">*</span></label>
                            <select name="tahun_produksi" class="form-control @error('tahun_produksi') error @enderror" required>
                                <option value="">Pilih Tahun</option>
                                @for($year = date('Y') + 1; $year >= 2020; $year--)
                                    <option value="{{ $year }}" {{ old('tahun_produksi') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            @error('tahun_produksi')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label class="form-label">Harga (Rp) <span style="color: red;">*</span></label>
                            <input type="number" name="harga" class="form-control @error('harga') error @enderror" 
                                value="{{ old('harga') }}" placeholder="e.g., 500000000" min="0" required>
                            @error('harga')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Warna -->
                        <div class="form-group">
                            <label class="form-label">Warna <span style="color: red;">*</span></label>
                            <input type="text" name="warna" class="form-control @error('warna') error @enderror" 
                                value="{{ old('warna') }}" placeholder="e.g., Aurora White" required>
                            @error('warna')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Transmisi -->
                        <div class="form-group">
                            <label class="form-label">Transmisi <span style="color: red;">*</span></label>
                            <select name="transmisi" class="form-control @error('transmisi') error @enderror" required>
                                <option value="Automatic" {{ old('transmisi') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                                <option value="Manual" {{ old('transmisi') == 'Manual' ? 'selected' : '' }}>Manual</option>
                                <option value="CVT" {{ old('transmisi') == 'CVT' ? 'selected' : '' }}>CVT</option>
                            </select>
                            @error('transmisi')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kapasitas Baterai -->
                        <div class="form-group">
                            <label class="form-label">Kapasitas Baterai</label>
                            <input type="text" name="kapasitas_baterai" class="form-control @error('kapasitas_baterai') error @enderror" 
                                value="{{ old('kapasitas_baterai') }}" placeholder="e.g., 82.5 kWh">
                            @error('kapasitas_baterai')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Jarak Tempuh -->
                        <div class="form-group">
                            <label class="form-label">Jarak Tempuh</label>
                            <input type="text" name="jarak_tempuh" class="form-control @error('jarak_tempuh') error @enderror" 
                                value="{{ old('jarak_tempuh') }}" placeholder="e.g., 650 km">
                            @error('jarak_tempuh')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Waktu Charging -->
                        <div class="form-group">
                            <label class="form-label">Waktu Charging</label>
                            <input type="text" name="waktu_charging" class="form-control @error('waktu_charging') error @enderror" 
                                value="{{ old('waktu_charging') }}" placeholder="e.g., 30 menit (DC fast)">
                            @error('waktu_charging')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div class="form-group">
                            <label class="form-label">Stok <span style="color: red;">*</span></label>
                            <input type="number" name="stok" class="form-control @error('stok') error @enderror" 
                                value="{{ old('stok', 0) }}" placeholder="Jumlah unit" min="0" required>
                            @error('stok')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Foto -->
                    <div class="form-group">
                        <label class="form-label">Foto Mobil</label>
                        <input type="file" name="foto" class="form-control @error('foto') error @enderror" 
                            accept="image/jpeg,image/png,image/jpg" onchange="previewImage(this)">
                        <small style="color: #6b7280; margin-top: 0.25rem; display: block;">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                        @error('foto')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                        <div id="preview" style="margin-top: 1rem; display: none;">
                            <img id="previewImg" src="" alt="Preview" style="max-width: 300px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') error @enderror" 
                            rows="4" placeholder="Deskripsi lengkap mobil...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="error-message">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Buttons -->
                    <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('admin.mobil.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function previewImage(input) {
        const preview = document.getElementById('preview');
        const previewImg = document.getElementById('previewImg');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endpush
