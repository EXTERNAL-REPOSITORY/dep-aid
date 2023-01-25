<?php

namespace App\Repositories;

use App\Models\DayTable;
use App\Models\DoctorNurse;
use Carbon\Carbon;
use Illuminate\Pipeline\Pipeline;
use PDF;
use Illuminate\Support\Facades\DB;

class DoctorNurseRepository
{
    public function getAllDoctorNurse($request)
    {
        $requestData = [
            'search' => isset($request->search) ? $request->search : null
        ];

        $query = DoctorNurse::query();

        $result = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Pipelines\Search\SearchDoctorNurseTable::class,
                \App\Pipelines\Filter\DateFilter::class
        ])->thenReturn();

        $data = $result ? $result : $query;
        $doctorNurse = $data->groupBy('employee_id')->get();

       return compact('doctorNurse', 'requestData');
    }

    public function showDoctorNurse($doctorNurse)
    {
        $data = DoctorNurse::where('employee_id', $doctorNurse->employee_id)->get();
        return compact('data');
    }

    public function storeDoctorNurse($request)
    {
        $day = DayTable::pluck('day')->toArray();
        $employeeIdGenerator = 'DEP-AID-' . $request->first_name . '-' . mt_rand(100000000, 999999999);

        if(!isset($request->from_time) || !isset($request->to_time) || !isset($request->is_working)) {
            $request->from_time = [];
            $request->to_time = [];
            $request->is_working = [];
        }


        foreach($request->day as $key =>$item) {
            if(in_array($key, array_keys($day))){

                $doctorNurse = DoctorNurse::insert([
                    'employee_id' => $employeeIdGenerator,
                    'first_name' => $request->first_name,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'position' => $request->position,
                    'availability_days' => $key,
                    'available_from' => $request->from_time[$key],
                    'available_to' => $request->to_time[$key],
                    'is_working' => $request->is_working[$key],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]); 
            }
        }
        return $doctorNurse;
    }

    public function updateDoctorNurse($request, $doctorNurseId)
    {
        
    }

    public function deleteDoctorNurse($cardiacDrugsId)
    {

    }

    public function generatePdf()
    {
        $query = DoctorNurse::get();

        $data = [
            'title' => 'DEP-AID Doctor - Nurse List Report',
            'users' => $query
        ];

        $pdf = PDF::loadView('pdf.doctor-nurse', $data);

        return $pdf->download('DEP-AID Doctor - Nurse List Report.pdf');
    }

    public function getSchedules($request)
    {
        $result = DoctorNurse::where('availability_days', $request->day)->where('is_working', 0)->get();

        return $result;
    }
}
