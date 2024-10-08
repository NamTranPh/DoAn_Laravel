<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('admins')->insert([
            [
                // 'name' => 'Tuấn Anh',
                // 'email' => 'tuananh@gmail.com',
                // 'password' => bcrypt('123'),
                // 'level' => '1',
                // 'role' => 'Quản lý'
                'name' => 'Quang Anh',
                'email' => 'quanganh@gmail.com',
                'password' => bcrypt('567'),
                'level' => '0',
                'role' => 'Nhân viên'
            ]
        ]);

        // DB::table('users')->insert([
        //     [
        //         'name' => 'ha anh',
        //         'email' => 'hanh@gmail.com',
        //         'password' => bcrypt('hanh123'),
        //     ]
        // ]);
    }
}
