<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // <-- Pastikan model di-import

class MahasiswaWebController extends Controller
{
    public function index()
    {
        $daftarMahasiswa = Mahasiswa::with('programStudi')
            ->orderBy('nama')
            ->paginate(10);

        return view('mahasiswa.data', ['daftarMahasiswa' => $daftarMahasiswa]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'program_studi_id' => ['required', 'exists:program_studis,id'],
            'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas,nim'],
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:mahasiswas,email'],
            'angkatan' => ['required', 'integer', 'min:2000'],
        ]);

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.data')->with('sukses', 'Data mahasiswa berhasil disimpan');
    }
}