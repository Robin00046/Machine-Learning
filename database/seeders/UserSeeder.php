<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create( [
            'name' => 'Benny Bora Eka Fravasta',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            ] )->assignRole('Admin');
        User::create( [
            'name' => 'Marjuki',
            'email' => 'gapoktan@gmail.com',
            'password' => Hash::make('password'),
            ] )->assignRole('Ketua Gapoktan');
    }
}
