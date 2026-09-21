<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftar = [
            ['kode' => 'TIF101', 'nama' => 'Pemrograman Web II', 'sks' => 3, 'semester' => 3],
            ['kode' => 'TIF102', 'nama' => 'Jaringan Komputer', 'sks' => 3, 'semester' => 3],
            ['kode' => 'TIF103', 'nama' => 'Sistem Operasi', 'sks' => 2, 'semester' => 3],
        ];

        foreach ($daftar as $item) {
            \App\Models\Matakuliah::create($item);
        }
    }
}
