@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')
    <x-info-card title="Data Diri Mahasiswa">
        <div class="row align-items-center">
            
            <!-- Kolom Kiri: Informasi Teks -->
            <div class="col-md-10">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Nama:</strong> {{ $mahasiswa['nama'] }}</li>
                    <li class="list-group-item"><strong>NRP:</strong> {{ $mahasiswa['nrp'] }}</li>
                    <li class="list-group-item"><strong>Departemen:</strong> {{ $mahasiswa['departemen'] }}</li>
                    <li class="list-group-item"><strong>Institusi:</strong> {{ $mahasiswa['institusi'] }}</li>
                </ul>
            </div>

            <!-- Kolom Kanan: Foto Profil -->
            <div class="col-md-2 text-end">
                <img src="{{ asset('images/foto-profil.png') }}" alt="Foto Profil" class="img-fluid rounded shadow-sm" style="max-width: 150px;">
            </div>
            
        </div>
    </x-info-card>
@endsection