<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ticket = Booking::generateTicket();
        Booking::create([
            'ticket' => $ticket,
            'date' => '2022-06-17',
            'start' => '09:00',
            'end' => '09:45',
        ]);

        $ticket2 = Booking::generateTicket();
        Booking::create([
            'ticket' => $ticket2,
            'date' => '2022-06-16',
            'start' => '09:45',
            'end' => '10:30',
        ]);
        
    }
}
