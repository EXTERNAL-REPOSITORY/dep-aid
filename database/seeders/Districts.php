<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Districts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            ['id'=>1, 'district_name'=>'Basakan District'], 
            ['id'=>2, 'district_name'=>'North Highway District'],
            ['id'=>3, 'district_name'=>'Poblacion District'],
            ['id'=>4, 'district_name'=>'South Highway District'],
            ['id'=>5, 'district_name'=>'Upper Pulangi District']
        ]);
    }
}
