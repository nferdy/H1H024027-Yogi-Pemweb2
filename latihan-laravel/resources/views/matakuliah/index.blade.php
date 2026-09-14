@extends('layouts.app')
@section('judul', 'Daftar Mata Kuliah')

@section('konten')
<h1 class="h3 mb-4">Daftar Mata Kuliah</h1>

<!-- Form Pencarian Sederhana -->
<form action="{{ route('matakuliah.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Cari mata kuliah..." value="{{ $search ?? '' }}">
        <button class="btn btn-outline-primary" type="submit">Cari</button>
    </div>
</form>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($daftarMatakuliah as $mk)
        <tr>
            <td>{{ $mk['kode'] }}</td>
            <td>{{ $mk['nama'] }}</td>
            <td>
                <x-badge-sks :sks="$mk['sks']" />
            </td>
            <td>
                <a href="{{ route('matakuliah.show', $mk['kode']) }}" class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center">Data mata kuliah tidak ditemukan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection