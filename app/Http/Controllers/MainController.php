<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PatientFormRepository;
use App\Models\PatientForm;
use App\Models\Districts;
use App\Models\Barangays;

class MainController extends Controller
{

    public $patientForm;

    public function __construct(PatientFormRepository $patientForm)
    {
        $this->patientForm = $patientForm;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $forecast = PatientForm::withCount('')->
        return view('pages.patient-form');
    }

    public function getDistrictsWithBarangays(){
        $districts = Districts::with([
        'barangays'=>function ($query) {
            $query->select('id','district_id','barangay_name')->get();
        }])->get();
        return json_encode(['districts' => $districts]);
    }

    public function getBarangays(Request $request){
        $barangays = Districts::with([
        'barangays'=>function ($query) {
            $query->select('id','district_id','barangay_name')->get();
        }])->where(['district_name' =>$request->district_name])->get();
        return json_encode(['barangays' => $barangays]);
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
        $data = $this->patientForm->storePatientForm($request);

        return view('pages.patient-form-success',$data);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->patientForm->deleteFromQueue($id);
        return redirect()->route('patient-queued.index')->with('success', 'Patient Successfully Deleted');
    }

    public function done(PatientForm $id)
    {
        $this->patientForm->donePatient($id);
        return redirect()->route('patient-queued.index')->with('success', 'Patient Successfully Done');
    }
}
