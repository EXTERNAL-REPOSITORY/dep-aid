<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
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
        $patients = PatientForm::count();
        $schedule = Schedule::count();
        $inventory = [
            'cardiac-drugs' => Inventory::where('type', 'Cardiac Drugs')->count(),
            'antibiotics' => Inventory::where('type', 'Antibiotics')->count(),
            'ear-meds' => Inventory::where('type', 'Ear Meds')->count(),
            'topicals' => Inventory::where('type', 'Topicals')->count(),
            'anti-inflammatory' => Inventory::where('type', 'Anti-Inflammatory')->count(),
        ];

        $getTopMedicines = Inventory::orderBy('stock_balance', 'DESC')->select('medicine_name', 'stock_balance')->take(5)->get();
        
        // $illnesses = PatientForm::select(DB::raw('
        //     main_reason_for_consultation AS diagnosis, 
        //     COUNT(main_reason_for_consultation) AS consultation,
        //     created_at
        // '))
        // ->whereRaw('YEAR(patient_form.created_at) BETWEEN YEAR(NOW())-2 AND YEAR(NOW())')
        // ->groupByRaw('patient_form.main_reason_for_consultation,
        // YEAR(patient_form.created_at)')
        // ->orderByRaw('created_at ASC, diagnosis')
        // ->get();

        // return view('pages.dashboard')->with(['patients' => $patients, 'schedule' => $schedule, 'inventory' => $inventory, 'getTopMedicines' => $getTopMedicines, 'illnesses' => $illnesses]);
        return view('pages.dashboard')->with(['patients' => $patients, 'schedule' => $schedule, 'inventory' => $inventory, 'getTopMedicines' => $getTopMedicines]);
    }

    public function getCounts($data)
    {
        foreach ($data as $key => $value) {
            
        }
        return ;
    }
}
