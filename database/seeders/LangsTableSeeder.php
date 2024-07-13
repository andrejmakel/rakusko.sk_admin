<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Seeder;

class LangsTableSeeder extends Seeder
{
    public function run()
    {
        $langs = [
            [
                'id' => 1,
                'lang' => 'SK',
            ],
           [
                'id' => 2,
                'lang' => 'DE'
           ] 
           ];

           Lang::insert($langs);
    }
}
