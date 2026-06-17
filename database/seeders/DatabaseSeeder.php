<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kredit; // Pastikan import model Kredit
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat 10 data user dummy
        User::factory(10)->create();

        // 2. Membuat 1 akun admin utama
        User::factory()->create([
            'nama' => 'Admin1',
            'username' => 'Admin4',
            'jabatan' => 'Admin',
            'alamat' => 'Subang',
            'password' => bcrypt('Admin4'),
        ]);

        // 3. Membuat 10 data dummy untuk tabel kredit
        Kredit::factory(10)->create();

        // 4. Membuat data spesifik untuk tabel kredit
        Kredit::factory()->create([
            'nama' => 'Listrik',
            'tanggal' => '2026-05-19',
            'jenis_pengeluaran' => 'tetap',
            'saldo_kredit' => 9000000,
            'keterangan' => 'Listrik Habis bulan ini',
            'status' => 'setuju',
        ]);
    }
}
