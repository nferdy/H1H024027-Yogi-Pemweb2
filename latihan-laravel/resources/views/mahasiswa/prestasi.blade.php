@extends('layouts.app')
@section('judul', '10 Mahasiswa Berprestasi - Teknik Komputer')

@section('konten')
<h1 class="h3 mb-4">10 Mahasiswa dengan IPK Tertinggi - Teknik Komputer</h1>

<table class="table table-striped table-bordered table-hover bg-white shadow-sm">
    <thead class="bg-primary text-white">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Angkatan</th>
            <th>IPK</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($mahasiswaPrestasi as $index => $mahasiswa)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->programStudi->nama ?? '-' }}</td>
            <td>{{ $mahasiswa->angkatan }}</td>
            <td><strong>{{ $mahasiswa->ipk }}</strong></td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">Tidak ada data mahasiswa ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary mt-3">Kembali ke Data Mahasiswa</a>
@endsection