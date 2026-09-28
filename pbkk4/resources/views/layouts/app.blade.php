<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Mahasiswa')</title>
    
    <!-- Wajib menggunakan Vite, pastikan npm install & npm run dev sudah dijalankan -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar Statis -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">PBKK-4</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('beranda') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profil') }}">Profil Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ide.riset') }}">Ide Riset</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Container Konten -->
    <main class="container mt-5 flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer ITS -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <p class="mb-0">&copy; {{ date('Y') }} Institut Teknologi Sepuluh Nopember (ITS)</p>
    </footer>

</body>
</html>