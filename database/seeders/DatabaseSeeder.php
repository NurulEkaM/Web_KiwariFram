<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 10 data user dummy otomatis menggunakan factory baru
        User::factory(10)->create();

        // Membuat 1 akun admin utama khusus untuk Anda login testing
        User::factory()->create([
            'nama' => 'Admin1',
            'username' => 'Admin4',
            'jabatan' => 'Admin',
            'alamat' => 'Subang',
            'password' => bcrypt('Admin4'),
        ]);
    }
}
