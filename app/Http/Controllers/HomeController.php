<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\DispensedMedicines;
use App\Models\Schedule;
use App\Models\Patient;
use App\Models\PatientForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $patients = PatientForm::whereRaw('is_done_consulting = 0')->count();
        $schedule = Schedule::whereRaw('start_date >= NOW()')->count();
        $meds = Inventory::whereRaw('expiration_date >= NOW()')->get();
        $inventory = [
            'cardiac-drugs' => 0,
            'antibiotics' => 0,
            'ear-meds' => 0,
            'topicals' => 0,
            'anti-inflammatory' => 0
        ];
        foreach ($meds as $key => $value) {
            switch ($value->type) {
                case ('Cardiac Drugs'):
                    $inventory['cardiac-drugs'] += 1;
                    break;
                case ('Antibiotics'):
                    $inventory['antibiotics'] += 1;
                    break;
                case ('Ear Meds'):
                    $inventory['ear-meds'] += 1;
                    break;
                case ('Topicals'):
                    $inventory['topicals'] += 1;
                    break;
                case ('Anti-inflammatory'):
                    $inventory['anti-inflammatory'] = $inventory['anti-inflammatory'] + 1;
                    break;
            }
        }
        $getTopMedicines = Inventory::orderBy('stock_balance', 'DESC')->select('medicine_name', 'stock_balance')->take(5)->get();
        $getTopDispensedMedicines = DispensedMedicines::select("*")
            ->selectRaw('COUNT(`medicine_id`) AS med_count')
            ->join('inventory', 'dispensed_medicines.medicine_id', '=', 'inventory.id', 'INNER')
            ->groupBy('medicine_id')
            ->orderBy('med_count', 'DESC')->take(5)->get();
        return view('pages.dashboard')->with([
            'patients' => $patients, 'schedule' => $schedule,
            'inventory' => $inventory, 'getTopMedicines' => $getTopMedicines, 'topDispensedMeds' => $getTopDispensedMedicines
        ]);
    }
}
