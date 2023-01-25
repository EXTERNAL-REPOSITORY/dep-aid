<?php

namespace App\Http\Controllers;

use App\Repositories\DoctorNurseRepository;
use App\Http\Requests\StoreDoctorNurseRequest;
use App\Http\Requests\UpdateDoctorNurseRequest;
use App\Models\DoctorNurse;
use Illuminate\Http\Request;

class DoctorNurseController extends Controller
{
    public $doctorNurse;

    public function __construct(DoctorNurseRepository $doctorNurse)
    {
        $this->doctorNurse = $doctorNurse;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->doctorNurse->getAllDoctorNurse($request);
        return view('pages.doctor-nurse', $result);
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
        $this->doctorNurse->storeDoctorNurse($request);
        return redirect()->route('doctor-nurse.index')->with('success', 'User added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $result = $this->doctorNurse->showDoctorNurse($request);
        return $result;
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
        //
    }

    public function generatePdf()
    {
        $result = $this->doctorNurse->generatePdf();
        return $result;
    }

    public function getSchedules(Request $request)
    {
        $result = $this->doctorNurse->getSchedules($request);
        return $result;
    }
}
