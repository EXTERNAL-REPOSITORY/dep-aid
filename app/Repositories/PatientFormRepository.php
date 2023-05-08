<?php

namespace App\Repositories;

use App\Models\DayTable;
use App\Models\PatientForm;
use App\Models\Schedule;
use Illuminate\Pipeline\Pipeline;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;
use PDF;

class PatientFormRepository
{
    public function getPatientForm()
    {
        $config = [
            // Your driver-specific configuration
            // "telegram" => [
            //    "token" => "TOKEN"
            // ]
        ];
        
        // Load the driver(s) you want to use
        DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);
        
        // Create an instance
        $botman = BotManFactory::create($config);
        
        // Give the bot something to listen for.
        $botman->hears('hello', function (BotMan $bot) {
            $bot->reply('Hello yourself.');
        });
        
        // Start listening
        $botman->listen();
    }

    public function getAllQueuedPatient($request)
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
        $patient = $data->with('schedule')->paginate(10);

        return compact('patient', 'requestData');
    }

    public function storePatientForm($request)
    {
        $jsonDays = array(
            '1' => "Monday",
            '2' => "Tuesday",
            '3' => "Wednesday",
            '4' => "Thursday",
            '5' => "Friday",
            '6' => "Saturday",
            '7' => "Sunday"
        );

        $patientForm = PatientForm::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'main_reason_for_consultation' => $request->main_reason_for_consultation,
            'heart_rate' => $request->heart_rate,
            'blood_pressure' => $request->blood_pressure,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygen_saturation,
            'other_reason_for_consultation' => $request->other_reason_for_consultation,
            'allergies' => $request->allergies,
            'maintenance_medications' => $request->maintenance_medications,
            'current_medications' => $request->current_medications,
            'doctor_consulting' => $request->doctor_consulting,
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            'day' => $jsonDays[$request->day],
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
        $patientFormId = $patientForm->id;
        
        Schedule::insert([
            'patient_form_id' => $patientFormId,
            'text' => "Name: ".$request->name." Age:".$request->age." Gender:".$request->gender." ".$request->current_medications." ".$request->main_reason_for_consultation,
            'start_date' =>  \Carbon\Carbon::parse($request->date." ".$request->available_from)->format('Y-m-d H:i'),
            'end_date' => \Carbon\Carbon::parse($request->date." ".$request->available_to)->format('Y-m-d H:i'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        return $patientForm;
    }

    public function donePatient($request) 
    {
        $query = PatientForm::where('id', $request->id)->update([
            'is_done_consulting' => 1,
        ]);

        return $query;
    }

    public function deleteFromQueue($request){
        return PatientForm::find($request->id)->delete();
    }

    public function generatePdf()
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
        $patient = $data->with('schedule')->get();
                
        $data = [
            'title' => 'DEP-AID Patient List Report',
            'users' => $patient
        ];

        $pdf = PDF::loadView('pdf.queued-patient', $data);

        return $pdf->download('DEP-AID Patient List Report.pdf');
    }
}
