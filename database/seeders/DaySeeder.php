<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day')->insert([
            ['id'=>1, 'day'=>'Monday'],
            ['id'=>2, 'day'=>'Tuesday'],
            ['id'=>3, 'day'=>'Wednesday'],
            ['id'=>4, 'day'=>'Thursday'],
            ['id'=>5, 'day'=>'Friday'],
            ['id'=>6, 'day'=>'Saturday'],
            ['id'=>7, 'day'=>'Sunday'],
        ]);
    }
}
