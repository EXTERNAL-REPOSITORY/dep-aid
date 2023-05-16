<?php

namespace App\Http\Controllers;

use App\Models\DispensedMedicines;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Repositories\DispensedMedicinesRepository;
use Carbon\Carbon;

class DispensedMedicinesController extends Controller
{
    public $dispensedMedicines;

    public function __construct(DispensedMedicinesRepository $dispensedMedicines)
    {
        $this->dispensedMedicines = $dispensedMedicines;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->dispensedMedicines->getAllDispensedMedicines($request);
        return view('pages.patient-dispensing', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inventory = Inventory::select('stock_balance')->where(['id'=>$request->medicine_id])->first();
        $newStockBalance = intval($inventory->stock_balance)-intval($request->quantity);
        // dd(intval($request->quantity) >0 && intval($inventory->stock_balance)>=intval($request->quantity));
        // dd([intval($request->quantity),intval($request->quantity) >0]);

        
        if(intval($request->quantity) ==0){
            return redirect()->route('patient-dispensing.index')->with('error', 'Requested medicine quantity is 0');
        }else
        if(intval($request->quantity) >0 && intval($inventory->stock_balance)>=intval($request->quantity)){
            $dispensed = DispensedMedicines::insert([
                'medicine_id' => $request->medicine_id,
                'patient_form_id' =>  $request->patient_form_id,
                'patient_name' =>  $request->patient_name,
                'quantity' => $request->quantity,
                'remarks' => $request->remarks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            
            $updatInventory = Inventory::where(['id'=>$request->medicine_id])->update(['stock_balance'=>$newStockBalance]);
            return redirect()->route('patient-dispensing.index')->with('success', 'Medicine Dispensed Successfully');
        }else{
            return redirect()->route('patient-dispensing.index')->with('error', 'Requested medicine quantity is greater than stock balance!!! Error: Quantity:'.$request->quantity.' > Stock Balance:'.$inventory->stock_balance);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DispensedMedicines  $dispensedMedicines
     * @return \Illuminate\Http\Response
     */
    public function show(DispensedMedicines $dispensedMedicines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DispensedMedicines  $dispensedMedicines
     * @return \Illuminate\Http\Response
     */
    public function edit(DispensedMedicines $dispensedMedicines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DispensedMedicines  $dispensedMedicines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DispensedMedicines $dispensedMedicines)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DispensedMedicines  $dispensedMedicines
     * @return \Illuminate\Http\Response
     */
    public function destroy(DispensedMedicines $dispensedMedicines)
    {
        //
    }
}
