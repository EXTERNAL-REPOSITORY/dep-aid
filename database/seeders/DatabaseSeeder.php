<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@argon.com',
            'password' => bcrypt('secret')
        ]);

        $this->call([
            EventsTableSeeder::class,
            // DaySeeder::class,
            InventorySeeder::class,
            PatientFormSeeder::class,
            Districts::class,
            Barangays::class,
            DispensedMedicineSeeder::class
        ]);
    }
}
