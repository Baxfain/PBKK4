<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $namaUser = $request->query('user');
        return view('beranda', compact('namaUser'));
    }

    public function profil()
    {
        $mahasiswa = [
            'nama' => 'Severinus Fabian Tanuwidjaja',
            'nrp' => '5025201110',
            'departemen' => 'Teknik Informatika',
            'institusi' => 'Institut Teknologi Sepuluh Nopember (ITS)'
        ];
        
        return view('profil-mahasiswa', compact('mahasiswa'));
    }

    public function ideRiset()
    {
        return view('ide-agent');
    }
}