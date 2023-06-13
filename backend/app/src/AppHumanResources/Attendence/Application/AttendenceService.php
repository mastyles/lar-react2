<?php

namespace App\src\AppHumanResources\Attendence\Application;

use App\src\AppHumanResources\Attendence\Domain\Attendence;
use Carbon\Carbon;

class AttendenceService
{
    public static function getTotalWorkingHours($employeeId=null)
    {
        $attendences = Attendence::where('employee_id', $employeeId)->get();

        $totalWorkingHours = 0;

        if(!$attendences->isEmpty()) {
            foreach ($attendences as $attendence) {
                $checkInTime = Carbon::parse($attendence->check_in);
                $checkOutTime = Carbon::parse($attendence->check_out);
                $totalWorkingHours += $checkOutTime->diffInHours($checkInTime);
            }
        }

        return [
            "total_working_hours" => $totalWorkingHours,
            'attendences' => $attendences
        ];
    }
}
