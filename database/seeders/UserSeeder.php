<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => 'John Doe',
        //     'email' => 'yusron1@gmail.com',
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        DB::table('karyawan')->insert([
            'nama_lengkap' => 'John Doe',
            'nik' => '111',
            'jabatan' => 'guru',
            'no_hp' => '0812',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
