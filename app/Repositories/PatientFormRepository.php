<?php

namespace App\Repositories;

use App\Models\DayTable;
use App\Models\PatientForm;
use App\Models\Schedule;
use Illuminate\Pipeline\Pipeline;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

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

    public function storePatientForm($request)
    {
        $getDay = DayTable::where('id', $request->day)->select('day')->first();

        $patientForm = PatientForm::insert([
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
            // 'day' => $getDay->day ,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        Schedule::insert([
            'text' => $request->name." ".$request->age." ".$request->gender." ".$request->current_medications." ".$request->reason_for_consultation,
            'start_date' => $request->date." ".$request->available_from,
            'end_date' => $request->date." ".$request->available_to,
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
}
