<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\PatientForm;
use App\Models\SendDiagnosis;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Carbon;
use PDF;
use Illuminate\Http\Request;

class PatientsRepository
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
        $patient = $data->whereRaw('is_done_consulting=1')->paginate(10);

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

    public function generatePdf(Request $request)
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
        $patient = $data->whereRaw('is_done_consulting=1')->get();

        $data = [
            'title' => 'DEP-AID Patient List Report',
            'users' => $patient
        ];

        $pdf = PDF::loadView('pdf.patient', $data)->setPaper('A4', 'landscape');

        return $pdf->download('DEP-AID Patient List Report.pdf');
    }

    public function sendEmail($request)
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
