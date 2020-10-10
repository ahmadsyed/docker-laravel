<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //demo seeder
        //data can be seeded from model factory Also
        $provider_data = [
            [
                'name'=>'Google',
                'description'=>'jpg Must be in aspect ratio 4:3 and size should be less than 2 MB ,mp4 should be less that one minute and mp3 should be less that 30 sec long and not more than 5 MB'
            ],
            [
                'name'=>'Snapchat',
                'description'=>'jpg/GIF Must be in aspect ratio 16:9 and size should be less than 5 MB ,mp4/mov should be less that 5 minute and not more than 50 MB.'
            ]
        ];
        DB::table('providers')->insert($provider_data);
    }
}
