<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $sadmin = User::create([
            'idPengguna' => 'm-2',
            'namaPengguna' => 'mika',
            'kelas' => 'sa01',
            'nohp' => '089876',
            'angkatan' => '2021',
            'username' => 'mika123',
            'password'=> bcrypt('mika123'),
            'admin' => 'admin1',
            'role' => 'Admin',
            'remember_token' => Str::random(36),
        ]);
    }
}
