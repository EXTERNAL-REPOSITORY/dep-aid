<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SchedulesRepository;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public $schedules;

    public function __construct(SchedulesRepository $schedules)
    {
        $this->schedules = $schedules;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->schedules->getAllSchedules();
        return view('pages.schedule', compact('result'));
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
        $schedules = Schedule::insert([
            'text' => $request->text,
            'patient_form_id' => $request->patient_form_id,
            'start_date' =>  \Carbon\Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date' => \Carbon\Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('patient-queued.index')->with('success', 'Schedule added successfully');
    }

    public function store2(Request $request)
    {
        $schedules = Schedule::insert([
            'text' => $request->text,
            'patient_form_id' => $request->patient_form_id,
            'start_date' =>  \Carbon\Carbon::parse($request->start_date)->format('Y-m-d H:i:s'),
            'end_date' => \Carbon\Carbon::parse($request->end_date)->format('Y-m-d H:i:s'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('patient.index')->with('success', 'Schedule added successfully');
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
        //
    }

    public function validateSchedule(Request $request)
    {
        // dd(\Carbon\Carbon::parse($request->start_date)->format('Y-m-d H:i:s'));
        // $result = Schedule::where(['attending_id'=>$request->attending_id,'start_date'=>$request->start_date])->first();
        return Schedule::where('start_date', 'LIKE', '%' . $request->start_date . '%')->get(['attending_id', 'start_date']);
        // if ($result) {
        //     // if exist, do not include
        //     return 1;
        // }else{
        //     // if not exist, include
        //     return 0;
        // }
    }
}
