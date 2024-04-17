<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'Admin',
            'password' => Hash::make('8888'), // Mã hóa mật khẩu
            'email' => 'c9smoothie1995@gmail.com',
            'is_admin' => 1,
        ]);
    }
}
