<?php

namespace App\Repositories;

use App\Models\PatientForm;
use App\Models\SendDiagnosis;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendDiagnosisPrescriptionRespository
{
    public function sendEmail ($request)
    {
        // dd($request->all());
        // $query = SendDiagnosis::create([
        //     'patient_name' => $request->patient_id,
        //     'diagnosis' => $request->diagnosis,
        //     'prescriptions' => $request->prescriptions,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);

        // $data = [
        //     'title' => 'Mail from Dep-Aid',
        //     'subtitle' => 'Diagnosis and Prescriptions',
        //     'patient_name' => $request->patient_name,
        //     'diagnosis' => $request->diagnosis,
        //     'prescriptions' => $request->prescriptions,
        // ];

        // "_token" => "5ToCRCh49c2y91svIyHnFY5yRowvr6yr0ka8G1mR"
        // "patient_name" => "Dr. Jordy Kerluke Jr."
        // "patient_email" => "eli19@yahoo.com"
        // "diagnosis" => "sada"
        // "prescriptions" => "asdsa"

        $data = [
            'title' => 'Mail from Dep-Aid',
            'body' => 'Diagnosis and Prescriptions',
        ];
         
        try {        
            Mail::to('rickycanonigo51@gmail.com')->send(new SendMail($data));
            return redirect()->route('patient-queued.index')->with('success', 'Diagnosis and Prescription sent successfully');
        } catch (Exception $th) {
            return redirect()->route('patient-queued.index')->with('error', 'Error: '.$th);
        }

    }   
}
