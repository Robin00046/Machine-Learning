<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Training::create([
            'penjualan' => '30000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '20000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '17000000',
            'prediksi' => '4.25',
        ]);
        Training::create([
            'penjualan' => '15000000',
            'prediksi' => '3.75',
        ]);
        Training::create([
            'penjualan' => '17000000',
            'prediksi' => '4.25',
        ]);
        Training::create([
            'penjualan' => '25000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '25000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '25000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '25000000',
            'prediksi' => '5',
        ]);
        Training::create([
            'penjualan' => '25000000',
            'prediksi' => '5',
        ]);
    }
}
