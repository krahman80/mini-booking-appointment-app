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
        Unavailable::create(
            [
                'name' => 'lunch break',
                'date' => '2022-05-23',
                'start_time' => '12:00',
                'end_time' => '13:00',
            ]
        );

        Unavailable::create([
                'name' => 'sunday',
                'date' => '2022-05-22',
                'start_time' => '00:00',
                'end_time' => '23:59',
            ],
        );

        Unavailable::create([
                'name' => 'saturday',
                'date' => '2022-05-21',
                'start_time' => '00:00',
                'end_time' => '23:59',
            ]
        );

    }
}
