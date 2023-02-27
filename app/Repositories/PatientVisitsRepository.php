<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\PatientForm;
use App\Models\SendDiagnosis;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Carbon;
use PDF;

class PatientVisitsRepository
{
    public function getAllPatient($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : ""
        ];
        $query = PatientForm::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchPatientTable::class,
                \App\Pipelines\Filter\DateFilter::class
            ])->thenReturn();
        
        $data = $result ? $result : $query;
        $patient = $data->paginate(10);

        return compact('patient', 'requestData');
    }

    public function storePatient($request)
    {
        $query = Patient::insertGetId([
            'patient_name' => $request->patient_name,
            'scheduled_appointment' => $request->scheduled_appointment,
            'reasons_for_consultation' => $request->reasons_for_consultation,
            'remarks' => $request->remarks,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return $query;
    }

    public function updatePatient($request, $patientId)
    {
        $query = Patient::where('id', $patientId->id)->update([
            'patient_name' => $request->patient_name,
            'scheduled_appointment' => $request->scheduled_appointment,
            'reasons_for_consultation' => $request->reasons_for_consultation,
            'remarks' => $request->remarks,
        ]);

        return $query;
    }

    public function deletePatient($employeeProfileId)
    {
        return Patient::find($employeeProfileId->id)->delete();
    }

    public function generatePdf()
    {
        $query = Patient::get();

        $data = [
            'title' => 'DEP-AID Patient List Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.queued-patient', $data);

        return $pdf->download('DEP-AID Patient List Report.pdf');
    }

    public function sendEmail ($request)
    {
        $query = SendDiagnosis::create([
            'patient_name' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'prescriptions' => $request->prescriptions,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $query;
    }   
}
