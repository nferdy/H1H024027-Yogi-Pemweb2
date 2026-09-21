<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        DB::listen(function ($kueri) {
            logger($kueri->sql);
        });

        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->orderBy('nama')
            ->paginate(10);

        return view('mahasiswa.data', ['daftarMahasiswa' => $daftarMahasiswa]);
    }

    public function show(string $nim)
    {
        $mahasiswa = Mahasiswa::with(['programStudi', 'matakuliah'])
            ->where('nim', $nim)
            ->firstOrFail();

        return view('mahasiswa.show', ['mahasiswa' => $mahasiswa]);
    }

    public function cari(Request $request)
    {
        $katakunci = $request->query('q', '');
        
        $hasil = Mahasiswa::with('programStudi')
            ->where('nama', 'like', '%' . $katakunci . '%')
            ->orWhere('nim', 'like', '%' . $katakunci . '%')
            ->get();

        return response()->json([
            'kata_kunci' => $katakunci,
            'metode' => $request->method(),
            'path' => $request->path(),
            'data' => $hasil,
        ]);
    }

    public function prestasiTeknikKomputer()
    {
        $mahasiswaPrestasi = Mahasiswa::whereHas('programStudi', function ($query) {
                $query->where('nama', 'Teknik Komputer');
            })
            ->orderBy('ipk', 'desc')
            ->take(10)
            ->get();

        return view('mahasiswa.prestasi', ['mahasiswaPrestasi' => $mahasiswaPrestasi]);
    }
}