<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q', '');
        
        $daftarMatakuliah = [
            ['kode' => 'TIF101', 'nama' => 'Pemrograman Web II', 'sks' => 3],
            ['kode' => 'TIF102', 'nama' => 'Jaringan Komputer', 'sks' => 3],
            ['kode' => 'TIF103', 'nama' => 'Sistem Operasi', 'sks' => 2],
            ['kode' => 'TIF104', 'nama' => 'Basis Data', 'sks' => 3],
            ['kode' => 'TIF105', 'nama' => 'Kecerdasan Buatan', 'sks' => 3],
        ];

        // Fitur Pencarian Sederhana
        if ($search) {
            $daftarMatakuliah = array_filter($daftarMatakuliah, function ($item) use ($search) {
                return stripos($item['nama'], $search) !== false || stripos($item['kode'], $search) !== false;
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah,
            'search' => $search
        ]);
    }

    public function show(string $kode)
    {
        return view('matakuliah.show', ['kode' => $kode]);
    }
}