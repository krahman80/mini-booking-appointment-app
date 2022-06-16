<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(1)->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'is_admin' => true,
        ]);

        \App\Models\User::factory()->count(1)->create([
            'name' => 'user2',
            'email' => 'user2@mail.com',
        ]);

    }
}
