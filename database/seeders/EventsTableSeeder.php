<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelPatients;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            ['id'=>1, 'text'=>'Patient #1', 'start_date'=>'2022-11-05 08:00:00',
                 'end_date'=>'2022-11-05 11:00:00'],
            ['id'=>2, 'text'=>'Patient #2', 'start_date'=>'2022-11-06 15:00:00',
                 'end_date'=>'2022-11-06 16:30:00'],
            ['id'=>3, 'text'=>'Patient #3', 'start_date'=>'2022-11-04 00:00:00',
                 'end_date'=>'2022-11-20 00:00:00'],
            ['id'=>4, 'text'=>'Patient #4', 'start_date'=>'2022-11-01 08:00:00',
                 'end_date'=>'2022-11-01 11:00:00'],
            ['id'=>5, 'text'=>'Patient #5', 'start_date'=>'2022-11-20 08:00:00',
                 'end_date'=>'2022-11-20 11:00:00'],
            ['id'=>6, 'text'=>'Patient #6', 'start_date'=>'2022-12-25 08:00:00',
                 'end_date'=>'2022-12-25 11:00:00'],
            ['id'=>7, 'text'=>'Patient #7', 'start_date'=>'2022-12-05 08:00:00',
                 'end_date'=>'2022-12-05 11:00:00'],
            ['id'=>8, 'text'=>'Patient #8', 'start_date'=>'2022-12-06 15:00:00',
                 'end_date'=>'2022-12-06 16:30:00'],
            ['id'=>9, 'text'=>'Patient #9', 'start_date'=>'2022-12-04 00:00:00',
                 'end_date'=>'2022-12-20 00:00:00'],
            ['id'=>10, 'text'=>'Patient #10', 'start_date'=>'2022-12-01 08:00:00',
                 'end_date'=>'2022-12-01 12:00:00'],
            ['id'=>12, 'text'=>'Patient #12', 'start_date'=>'2022-12-20 08:00:00',
                 'end_date'=>'2022-12-20 12:00:00'],
            ['id'=>13, 'text'=>'Patient #12', 'start_date'=>'2022-12-25 08:00:00',
                 'end_date'=>'2022-12-25 12:00:00']
        ]);
    }
}
