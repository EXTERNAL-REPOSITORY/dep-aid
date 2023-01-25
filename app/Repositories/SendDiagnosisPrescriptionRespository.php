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
        dd($request->all());
        $query = SendDiagnosis::create([
            'patient_name' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'prescriptions' => $request->prescriptions,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $data = [
            'title' => 'Mail from Dep-Aid',
            'subtitle' => 'Diagnosis and Prescriptions',
            'patient_name' => $request->patient_name,
            'diagnosis' => $request->diagnosis,
            'prescriptions' => $request->prescriptions,
        ];
         
        Mail::to($request->email)->send(new SendMail($data));
           
        return $query;
    }   
}
