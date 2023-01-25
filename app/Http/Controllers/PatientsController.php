<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\Patient;
use App\Repositories\PatientsRepository;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public $patient;

    public function __construct(PatientsRepository $patient)
    {
        $this->patient = $patient;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->patient->getAllPatient($request);
        return view('pages.patients', $result);
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
    public function store(StorePatientsRequest $request)
    {
        $this->patient->storePatient($request);
        return redirect()->route('patients.index')->with('success', 'Patient Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientsRequest $request, Patient $id)
    {
        $this->patient->updatePatient($request, $id);
        return redirect()->route('patients.index')->with('success', 'Patient Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $id)
    {
        $this->patient->deletePatient($id);
        return redirect()->route('patients.index')->with('error', 'Patient Deleted Successfully');
    }

    public function generatePdf()
    {
        $result = $this->patient->generatePdf();
        return $result;
    }
}
