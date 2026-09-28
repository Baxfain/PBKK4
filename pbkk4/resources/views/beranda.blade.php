@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <x-status-banner type="success" message="Selamat datang di Portal Mahasiswa, {{ $namaUser }}!" />

    <div class="text-center mt-5">
        <h1>Sistem Informasi Mahasiswa</h1>
        <p class="lead">Navigasi cepat ke halaman terkait.</p>
        
        <div class="mt-4">
            <a href="{{ route('profil') }}" class="btn btn-primary mx-2">Lihat Profil Mahasiswa</a>
            <a href="{{ route('ide.riset') }}" class="btn btn-outline-secondary mx-2">Eksplorasi Ide Agentic AI</a>
        </div>
    </div>
@endsection