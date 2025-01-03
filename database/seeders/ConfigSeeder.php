<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'blogname',
                'value' => 'Almar Developer'
            ],
            [
                'name' => 'title',
                'value' => 'Wellcome To Almar Developer'
            ],
            [
                'name' => 'caption',
                'value' => 'Wellcome To Almar Developer'
            ],
            [
                'name' => 'ads_widget',
                'value' => 'adsense 1'
            ],
            [
                'name' => 'ads_header',
                'value' => 'adsense 2'
            ],
            [
                'name' => 'ads_footer',
                'value' => 'adsense 2'
            ],
            [
                'name' => 'phone',
                'value' => '082121115898'
            ],
            [
                'name' => 'email',
                'value' => 'fajarchandra12@gmail.com'
            ],
            [
                'name' => 'facebook',
                'value' => 'facebook'
            ],
            [
                'name' => 'youtube',
                'value' => 'youtube'
            ],
            [
                'name' => 'instagram',
                'value' => 'instagram'
            ],
            [
                'name' => 'footer',
                'value' => 'Almar Web Development'
            ],
        ]);
    }
}
