<?php

namespace App\Http\Controllers;

use App\Models\PatientForm;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
  
        $botman->hears('{message}', function($botman, $message) {
  
            if ($message == 'Schedule Of Appointment' || $message == 'schedule of appointment' || $message == 'Schedule of Appointment' || $message == 'SCHEDULE OF APPOINTMENT') {
                $this->askAppointment($botman);
            } else if ($message == 'Link of FB Page' || $message == 'link of fb page' || $message == 'link of FB page' || $message == 'Link of fb Page' || $message == 'link of FB page') {
                $this->askLinkFbPage($botman);
            } else if ($message == 'Things Needed to Bring' || $message == 'things needed to bring') {
                $this->askThingsToBring($botman);
            } else {
                $botman->reply("Please choose on the selections above");
            }
  
        });
  
        $botman->listen();
    }
  
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            $this->say('Nice to meet you '.$name);
        });
    }

    public function askAppointment($botman)
    {
        $botman->ask('Can I get your name for verification?', function(Answer $answer) {
  
            $name = $answer->getText();
  
            //Query for the DB to get date, of  appointment and doctor assigned
            $query = PatientForm::where('name', 'LIKE', "%".$name."%")->select('name', 'doctor_consulting', 'day', 'available_from', 'available_to')->first();

            if ($query != null) {
                $this->say('Here is your Appointments Information: '. "Name: " . $query->name . ", " . "Doctor Consulting: " . $query->doctor_consulting . ", " ."Day: " . $query->day . ", " . "Available From: " . $query->available_from . ", " . "Available To: " . $query->available_to);
            } else {
                $this->say('Oops. Looks like you dont have any record found. Please Fill out the patient form for you to have an appointment. Thank you');
            }

        });
    }

    public function askThingsToBring($botman)
    {
        
        $botman->ask('Press B', function(Answer $answer) {
            
            $text = $answer->getText();
            
            $this->say('Bring the ff: Updated medical records for the past 3-6 months, Recent tests and other doctors opinion about your case');
        });

        // $botman->startConversation(function ($bot) {
        //     $bot->reply('Bring the ff: Updated medical records for the past 3-6 months, Recent tests and other doctors opinion about your case');
        // });
    }

    public function askLinkFbPage($botman)
    {
        $botman->ask('Press A', function(Answer $answer) {
  
            $text = $answer->getText();
  
            $this->say('This is the FB Page Link: https://www.facebook.com/profile.php?id=100088906832935&mibextid=ZbWKwL');
        });

        // $botman->startConversation(function ($bot) {
        //     $bot->reply('This is the FB Page Link: https://www.facebook.com/profile.php?id=100088906832935&mibextid=ZbWKwL');
        // });
    }
}
