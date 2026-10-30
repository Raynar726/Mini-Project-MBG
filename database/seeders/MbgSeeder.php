<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\School;
use App\Models\Distribution;
use App\Models\Report;
use Illuminate\Support\Facades\Hash;

class MbgSeeder extends Seeder
{
    public function run(): void
    {
        $pelapor = User::create([
            'name' => 'Rina Amalia',
            'email' => 'rinaamalia@gmail.com',
            'password' => Hash::make('rina000'),
            'role' => 'pelapor',
        ]);

        $pemantau = User::create([
            'name' => 'Dedi Kurniawan',
            'email' => 'dedikurniawan@gmail.com',
            'password' => Hash::make('dedi123'),
            'role' => 'pemantau',
        ]);

        $koordinator = User::create([
            'name' => 'Sari Rahayu',
            'email' => 'sarirahayu@gmail.com',
            'password' => Hash::make('rahayu999'),
            'role' => 'koordinator',
        ]);

        $smpHarapan = School::create(['nama_sekolah' => 'SMP Harapan']);
        $sdNusa = School::create(['nama_sekolah' => 'SD Nusantara']);

        $dist1 = Distribution::create([
            'sekolah_id' => $smpHarapan->id,
            'tanggal_distribusi' => '2026-10-26',
        ]);

        $dist2 = Distribution::create([
            'sekolah_id' => $smpHarapan->id,
            'tanggal_distribusi' => '2026-10-27',
        ]);

        $dist3 = Distribution::create([
            'sekolah_id' => $sdNusa->id,
            'tanggal_distribusi' => '2026-10-27',
        ]);

        Report::create([
            'pelapor_id' => $pelapor->id,
            'sekolah_id' => $smpHarapan->id,
            'distribusi_id' => $dist1->id,
            'deskripsi_kejadian' => 'Beberapa siswa mengalami mual dan sakit perut setelah mengonsumsi makanan distribusi.',
            'status' => 'menunggu',
        ]);
    }
}