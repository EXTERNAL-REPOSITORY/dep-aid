<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Barangays extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangays')->insert([
            ['id' => 1, 'barangay_name' => 'Apo Macote', 'district_id' => 1],
            ['id' => 2, 'barangay_name' => 'Linabo', 'district_id' => 1],
            ['id' => 3, 'barangay_name' => 'Maligaya', 'district_id' => 1],
            ['id' => 4, 'barangay_name' => 'Managok', 'district_id' => 1],
            ['id' => 5, 'barangay_name' => 'Miglamin', 'district_id' => 1],
            ['id' => 6, 'barangay_name' => 'San Martin', 'district_id' => 1],
            ['id' => 7, 'barangay_name' => 'Santo Niño', 'district_id' => 1],
            ['id' => 8, 'barangay_name' => 'Simaya', 'district_id' => 1],
            ['id' => 9, 'barangay_name' => 'Sinanglanan', 'district_id' => 1],
            ['id' => 10, 'barangay_name' => 'Sinanglanan', 'district_id' => 1],
            ['id' => 11, 'barangay_name' => 'Can-ayan', 'district_id' => 2],
            ['id' => 12, 'barangay_name' => 'Capitan Angel', 'district_id' => 2],
            ['id' => 13, 'barangay_name' => 'Dalwangan', 'district_id' => 2],
            ['id' => 14, 'barangay_name' => 'Imbayao', 'district_id' => 2],
            ['id' => 15, 'barangay_name' => 'Kalasungay', 'district_id' => 2],
            ['id' => 16, 'barangay_name' => 'Kibalabag', 'district_id' => 2],
            ['id' => 17, 'barangay_name' => 'Manalog', 'district_id' => 2],
            ['id' => 18, 'barangay_name' => 'Patpat', 'district_id' => 2],
            ['id' => 19, 'barangay_name' => 'Sumpong', 'district_id' => 2],
            ['id' => 20, 'barangay_name' => 'Barangay 1', 'district_id' => 3],
            ['id' => 21, 'barangay_name' => 'Barangay 2', 'district_id' => 3],
            ['id' => 22, 'barangay_name' => 'Barangay 3', 'district_id' => 3],
            ['id' => 23, 'barangay_name' => 'Barangay 4', 'district_id' => 3],
            ['id' => 24, 'barangay_name' => 'Barangay 5', 'district_id' => 3],
            ['id' => 25, 'barangay_name' => 'Barangay 6', 'district_id' => 3],
            ['id' => 26, 'barangay_name' => 'Barangay 7', 'district_id' => 3],
            ['id' => 27, 'barangay_name' => 'Barangay 8', 'district_id' => 3],
            ['id' => 28, 'barangay_name' => 'Barangay 9', 'district_id' => 3],
            ['id' => 29, 'barangay_name' => 'Barangay 10 (Impalambong)', 'district_id' => 3],
            ['id' => 30, 'barangay_name' => 'Barangay 11 (Impalambong)', 'district_id' => 3],
            ['id' => 31, 'barangay_name' => 'Aglayan', 'district_id' => 4],
            ['id' => 32, 'barangay_name' => 'Bangcud', 'district_id' => 4],
            ['id' => 33, 'barangay_name' => 'Cabangahan', 'district_id' => 4],
            ['id' => 34, 'barangay_name' => 'Casisang', 'district_id' => 4],
            ['id' => 35, 'barangay_name' => 'Laguitas', 'district_id' => 4],
            ['id' => 36, 'barangay_name' => 'Magsaysay', 'district_id' => 4],
            ['id' => 37, 'barangay_name' => 'Mapayag', 'district_id' => 4],
            ['id' => 38, 'barangay_name' => 'San Jose', 'district_id' => 4],
            ['id' => 39, 'barangay_name' => 'Busdi', 'district_id' => 5],
            ['id' => 40, 'barangay_name' => 'Caburacanan', 'district_id' => 5],
            ['id' => 41, 'barangay_name' => 'Indalasa', 'district_id' => 5],
            ['id' => 42, 'barangay_name' => 'Kulaman', 'district_id' => 5],
            ['id' => 43, 'barangay_name' => 'Mapulo', 'district_id' => 5],
            ['id' => 44, 'barangay_name' => 'Saint Peter', 'district_id' => 5],
            ['id' => 45, 'barangay_name' => 'Silae', 'district_id' => 5],
            ['id' => 46, 'barangay_name' => 'Zamboanguita', 'district_id' => 5],
        ]);
    }
}
