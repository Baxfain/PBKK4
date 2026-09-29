@extends('layouts.app')

@section('title', 'Secure Feedback Hub')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- Notifikasi Sukses -->
            @if(session('success'))
                <x-status-banner type="success" :message="session('success')" />
            @endif

            <x-info-card title="Formulir Umpan Balik Mahasiswa">
                <!-- Method POST wajib digunakan -->
                <form method="POST" action="{{ route('feedback.submit') }}">
                    <!-- Token pelindung CSRF -->
                    @csrf
                    
                    <!-- Input Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Mahasiswa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap Anda">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email ITS <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@student.its.ac.id">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dropdown Kategori -->
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Masukan <span class="text-danger">*</span></label>
                        <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Akademik" {{ old('kategori') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                            <option value="Sarana Prasarana" {{ old('kategori') == 'Sarana Prasarana' ? 'selected' : '' }}>Sarana Prasarana</option>
                            <option value="Kegiatan Mahasiswa" {{ old('kategori') == 'Kegiatan Mahasiswa' ? 'selected' : '' }}>Kegiatan Mahasiswa</option>
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Textarea Pesan -->
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Isi Pesan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="4" placeholder="Tuliskan masukan atau kritik Anda di sini...">{{ old('pesan') }}</textarea>
                        @error('pesan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Dynamic Math Captcha -->
                    <div class="mb-4">
                        <label for="captcha" class="form-label fw-bold">Verifikasi Keamanan: {{ $captcha_question }} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Masukkan angka jawaban">
                        @error('captcha')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Kirim Umpan Balik</button>
                    </div>
                </form>
            </x-info-card>
            
        </div>
    </div>
@endsection