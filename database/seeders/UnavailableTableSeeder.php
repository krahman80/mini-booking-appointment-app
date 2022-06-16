<?php

namespace Database\Seeders;

use App\Models\Unavailable;
use Illuminate\Database\Seeder;

class UnavailableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Unavailable::create([
                'name' => 'saturday',
                'date' => '2022-06-18',
            ],
        );

        Unavailable::create([
                'name' => 'sunday',
                'date' => '2022-06-19',
            ]
        );

        Unavailable::create([
                'name' => 'saturday',
                'date' => '2022-06-25',
            ],
        );

        Unavailable::create([
                'name' => 'sunday',
                'date' => '2022-06-26',
            ]
        );
        
    }
}
