<?php

namespace App\Repositories;

use App\Models\Schedule;

class SchedulesRepository
{
    public function getAllSchedules()
    {
        $schedules = Schedule::all();

        return $schedules;
    }
}
