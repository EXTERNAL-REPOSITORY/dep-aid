<?php

namespace App\Repositories;

use App\Models\DispensedMedicines;
use App\Models\Schedule;
use App\Models\Inventory;
use App\Models\PatientForm;
use Illuminate\Pipeline\Pipeline;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;

class DispensedMedicinesRepository
{

    public function getAllDispensedMedicines($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : ""
        ];
        $query = DispensedMedicines::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchDispensedMedicinesTable::class,
            ])->thenReturn();

        $data = $result ? $result : $query;
        $dispensedMedicines = $data->select('*')->selectRaw('dispensed_medicines.created_at as dispensed_date, dispensed_medicines.id as dispensed_med_id')
            ->join('inventory', 'dispensed_medicines.medicine_id', '=', 'inventory.id', 'LEFT')
            ->join('patient_form', 'dispensed_medicines.patient_form_id', '=', 'patient_form.id', 'LEFT')->paginate(10);
        // dd($dispensedMedicines);
        return compact('dispensedMedicines', 'requestData');
    }

    public function dispenseMedicines($request)
    {
        //         $jsonDays = array(
        //             '1' => "Monday",
        //             '2' => "Tuesday",
        //             '3' => "Wednesday",
        //             '4' => "Thursday",
        //             '5' => "Friday",
        //             '6' => "Saturday",
        //             '7' => "Sunday"
        //         );

        //         $patientForm = PatientForm::create([
        //             'first_name' => $request->first_name,
        //             'middle_name' => $request->middle_name,
        //             'last_name' => $request->last_name,
        //             'name' => $request->name,
        //             'age' => $request->age,
        //             'gender' => $request->gender,
        //             'height' => $request->height,
        //             'weight' => $request->weight,
        //             'birthdate' => $request->birthdate,
        //             'address' => $request->address,
        //             'contact_number' => $request->contact_number,
        //             'email' => $request->email,
        //             'main_reason_for_consultation' => $request->main_reason_for_consultation,
        //             'heart_rate' => $request->heart_rate,
        //             'blood_pressure' => $request->blood_pressure,
        //             'temperature' => $request->temperature,
        //             'oxygen_saturation' => $request->oxygen_saturation,
        //             'other_reason_for_consultation' => $request->other_reason_for_consultation,
        //             'allergies' => $request->allergies,
        //             'maintenance_medications' => $request->maintenance_medications,
        //             'current_medications' => $request->current_medications,
        //             'doctor_consulting' => $request->attending_id,
        //             'available_from' => $request->available_from,
        //             'available_to' => $request->available_to,
        //             'day' => $jsonDays[$request->day],
        //             'created_at' => \Carbon\Carbon::now(),
        //             'updated_at' => \Carbon\Carbon::now()
        //         ]);
        //         $patientFormId = $patientForm->id;

        //         $from = \Carbon\Carbon::parse($request->date." ".($request->available_from??'00:00:00'))->format('Y-m-d H:i');
        //         $to = \Carbon\Carbon::parse($request->date." ".($request->available_to??'00:00:00'))->format('Y-m-d H:i');

        //         $sched_text = "Name: ".$request->name." Age:".$request->age." Gender:".$request->gender." ".$request->current_medications." ".$request->main_reason_for_consultation;

        //         $schedule = Schedule::create([
        //             'patient_form_id' => $patientFormId,
        //             'attending_id' => $request->attending_id,
        //             'text' => $sched_text,
        //             'start_date' =>  $from,
        //             'end_date' => $to,
        //             'created_at' => \Carbon\Carbon::now(),
        //             'updated_at' => \Carbon\Carbon::now()
        //         ]);

        //         $data = [
        //             'title' => 'Appointment Details - Dep-Aid Malaybalay Bukidnon',
        //             'body' => '
        // Good day '.Str::title($request->name).',

        // Thank you for having an appointment with us, here is your schedule of visit to our clinic.

        // Schedule: '.\Carbon\Carbon::parse($request->date)->format('F d, Y').' from '.\Carbon\Carbon::parse($from)->format('g:i A').' to '.\Carbon\Carbon::parse($to)->format('g:i A').'

        // Please be on time, thank you!
        //             ',
        //         ];

        //         try {
        //             if($request->email!=null){
        //                 Mail::to($request->email)->send(new SendMail($data));
        //             }
        //             return array('patientForm' => $patientForm,'date' => \Carbon\Carbon::parse($request->date)->format('F d, Y'),
        //             'start' => \Carbon\Carbon::parse($from)->format('g:i A'), 
        //             'end' => \Carbon\Carbon::parse($to)->format('g:i A') );
        //         } catch (Exception $th) {
        //             return redirect()->route('patient-form')->with('error', 'Error: '.$th);
        //         }
    }

    public function deleteFromQueue($request)
    {
        // return PatientForm::find($request->id)->delete();
    }

    public function generatePdf(Request $request)
    {
        // $requestData = [
        //     'search' => isset($request->search) ? $request->search : ""
        // ];
        // $query = PatientForm::query();

        // $result = app(Pipeline::class)
        //     ->send($query)
        //     ->through([
        //         \App\Pipelines\Search\SearchPatientTable::class,
        //         \App\Pipelines\Filter\DateFilter::class
        //     ])->thenReturn();

        // $data = $result ? $result : $query;
        // $patient = $data->with('schedule')->get();

        // $data = [
        //     'title' => 'DEP-AID Patient List Report',
        //     'users' => $patient
        // ];

        // $pdf = PDF::loadView('pdf.queued-patient', $data)->setPaper('A4','landscape');

        // return $pdf->download('DEP-AID Patient List Report.pdf');
    }
}
