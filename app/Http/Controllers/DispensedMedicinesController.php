<?php

namespace App\Http\Controllers;

use App\Models\DispensedMedicines;
use Illuminate\Http\Request;

class DispensedMedicinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $dispensed = DispensedMedicines::insert([
            'medicine_id' => $request->medicine_id,
            'patient_form_id' =>  $request->patient_form_id,
            'quantity' => $request->quantity,
            'remarks' => $request->remarks
        ]);

        return $dispensed;
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
