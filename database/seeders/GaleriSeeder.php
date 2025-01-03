<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Galeri::insert([
                'name' =>'gambar_1',
                'value' => 'gambar_1.jpg',
        ]);
    }
}
