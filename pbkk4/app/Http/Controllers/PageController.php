<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function feedback()
    {
        // Tantangan 1: Dynamic Math Captcha
        $angka1 = rand(1, 10);
        $angka2 = rand(1, 10);
        
        // Simpan hasil penjumlahan di Session server
        Session::put('captcha_result', $angka1 + $angka2);
        $captcha_question = "Berapakah $angka1 + $angka2 ?";

        return view('feedback', compact('captcha_question'));
    }

    public function submitFeedback(Request $request)
    {
        // 1. Definisikan aturan validasi sesuai spesifikasi Tugas 3
        $rules = [
            'nama' => 'required|min:3',
            'email' => 'required|email|ends_with:@student.its.ac.id',
            'kategori' => 'required|in:Akademik,Sarana Prasarana,Kegiatan Mahasiswa',
            'pesan' => 'required|min:15',
            'captcha' => 'required|numeric|in:' . Session::get('captcha_result'),
        ];

        // 2. Definisikan pesan kesalahan kustom berbahasa Indonesia
        $messages = [
            'nama.required' => 'Nama Mahasiswa wajib diisi.',
            'nama.min' => 'Nama Mahasiswa minimal terdiri dari 3 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.ends_with' => 'Email wajib menggunakan akhiran @student.its.ac.id.',
            'kategori.required' => 'Kategori Masukan wajib dipilih.',
            'kategori.in' => 'Kategori yang dipilih tidak valid.',
            'pesan.required' => 'Isi Pesan wajib diisi.',
            'pesan.min' => 'Isi Pesan minimal terdiri dari 15 karakter.',
            'captcha.required' => 'Jawaban captcha keamanan wajib diisi.',
            'captcha.numeric' => 'Jawaban captcha harus berupa angka.',
            'captcha.in' => 'Jawaban captcha matematika Anda salah.',
        ];

        // 3. Eksekusi validasi
        $validated = $request->validate($rules, $messages);

        // 4. Jika sukses, hapus session captcha dan redirect kembali dengan pesan sukses
        Session::forget('captcha_result');
        return back()->with('success', 'Terima kasih! Umpan balik Anda berhasil dikirim secara aman.');
    }
}