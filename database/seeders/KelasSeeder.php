<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'A', 
            'B', 
            'C', 
            'D'
        ];
    
        foreach ($data as $kelasNama) {
            $kelas = new Kelas();
            $kelas->nama_kelas = $kelasNama;
            $kelas->save();
        }
    }
}