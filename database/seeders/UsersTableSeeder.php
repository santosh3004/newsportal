<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'photo' => '',
                'phone' => '',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),],
            [
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'photo' => '',
                'phone' => '',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),],
        ]);
    }
}
