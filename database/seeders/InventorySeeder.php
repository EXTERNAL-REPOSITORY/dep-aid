<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Prophecy\Call\Call;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventory')->insert([
            ['id'=> 1, 'medicine_name' => 'Med1', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '150', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 2, 'medicine_name' => 'Med2', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Antibiotics', 'quantity' => '250', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 3, 'medicine_name' => 'Med3', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '350', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 4, 'medicine_name' => 'Med4', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Cardiac Drugs', 'quantity' => '530', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 5, 'medicine_name' => 'Med5', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear-Meds', 'quantity' => '540', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 6, 'medicine_name' => 'Med6', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Topicals', 'quantity' => '550', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 7, 'medicine_name' => 'Med7', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '570', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 8, 'medicine_name' => 'Med8', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '580', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 9, 'medicine_name' => 'Med9', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '580', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 10, 'medicine_name' => 'Med10', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '580', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 11, 'medicine_name' => 'Med11', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Antibiotics', 'quantity' => '590', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 12, 'medicine_name' => 'Med12', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Antibiotics', 'quantity' => '590', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 13, 'medicine_name' => 'Med13', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '50', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 14, 'medicine_name' => 'Med14', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear Meds', 'quantity' => '540', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 15, 'medicine_name' => 'Med15', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear Meds', 'quantity' => '250', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 16, 'medicine_name' => 'Med16', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Antibiotics', 'quantity' => '450', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 17, 'medicine_name' => 'Med17', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Cardiac Drugs', 'quantity' => '950', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 18, 'medicine_name' => 'Med18', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Cardiac Drugs', 'quantity' => '650', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 19, 'medicine_name' => 'Med19', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Antibiotics', 'quantity' => '50', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 20, 'medicine_name' => 'Med20', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '560', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 21, 'medicine_name' => 'Med21', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Cardiac Drugs', 'quantity' => '550', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 22, 'medicine_name' => 'Med22', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Topicals', 'quantity' => '850', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 23, 'medicine_name' => 'Med23', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Topicals', 'quantity' => '850', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 24, 'medicine_name' => 'Med24', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear Meds', 'quantity' => '510', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 25, 'medicine_name' => 'Med25', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Anti-Inflammatory', 'quantity' => '5120', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 26, 'medicine_name' => 'Med26', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Cardiac Drugs', 'quantity' => '510', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 27, 'medicine_name' => 'Med27', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Topicals', 'quantity' => '530', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 28, 'medicine_name' => 'Med28', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear Meds', 'quantity' => '5340', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 29, 'medicine_name' => 'Med29', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Ear Meds', 'quantity' => '150', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id'=> 30, 'medicine_name' => 'Med30', 'brand' => 'generic', 'manufacturer_date' => '2022-11-11 00:00:00', 'expiration_date' => '2022-12-12 00:00:00', 'type' => 'Topicals', 'quantity' => '2250', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
