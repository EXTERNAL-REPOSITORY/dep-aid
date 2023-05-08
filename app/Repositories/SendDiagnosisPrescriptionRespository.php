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
        $data = [
            'title' => 'Mail from Dep-Aid Malaybalay Bukidnon',
            'body' => $request->body,
            'files' => $request->attachments
        ];
         
        try {        
            Mail::to($request->patient_email)->send(new SendMail($data));
            return redirect()->route('patient-queued.index')->with('success', 'Diagnosis and Prescription sent successfully');
        } catch (Exception $th) {
            return redirect()->route('patient-queued.index')->with('error', 'Error: '.$th);
        }

    }   
}
