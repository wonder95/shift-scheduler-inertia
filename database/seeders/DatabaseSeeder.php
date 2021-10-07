<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\User;
use App\Models\Shift;
use App\Models\Certs;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joe Blow',
            'email' => 'joe.blow@' . env('EMAIL_DOMAIN'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin.user@' . env('EMAIL_DOMAIN'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => 'admin'
        ]);

        User::factory(5)->create();

        // Create stations
        Station::create([
            'station_number' => 12,
            'station_name' => 'Logan'
        ]);

        Station::create([
            'station_number' => 13,
            'station_name' => 'Clarkes'
        ]);

        Station::create([
            'station_number' => 21,
            'station_name' => 'Rehab'
        ]);

        //TODO: get list of existing user IDs
        Shift::factory(30)->create();

        Certs::factory(5)->create();
    }
}
