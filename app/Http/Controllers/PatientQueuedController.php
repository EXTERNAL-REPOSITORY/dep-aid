<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientsRequest;
use App\Http\Requests\UpdatePatientsRequest;
use App\Models\PatientForm;
use App\Repositories\PatientFormRepository;
use Illuminate\Http\Request;

class PatientQueuedController extends Controller
{
    public $patient;

    public function __construct(PatientFormRepository $patient)
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
        $result = $this->patient->getAllQueuedPatient($request);
        return view('pages.patient-queued', $result);
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
    public function store(StorePatientFormRequest $request)
    {
        $this->patient->storePatient($request);
        return redirect()->route('patient-queued.index')->with('success', 'Patient Added Successfully');
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
    public function update(UpdatePatientFormRequest $request, PatientForm $id)
    {
        $this->patient->updatePatient($request, $id);
        return redirect()->route('patient-queued.index')->with('success', 'Patient Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientForm $id)
    {
        $this->patient->deleteFromQueue($id);
        return redirect()->route('patient-queued.index')->with('success', 'Patient Deleted Successfully');
    }

    public function generatePdf(Request $request)
    {
        $result = $this->patient->generatePdf($request);
        return $result;
    }
}
