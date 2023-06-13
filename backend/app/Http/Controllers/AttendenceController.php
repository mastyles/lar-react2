<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\src\AppHumanResources\Attendence\Domain\Attendence;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\AttendenceImport;
use App\src\AppHumanResources\Attendence\Application\AttendenceService;

class AttendenceController extends Controller
{
    private $attendenceService;

    public function __construct(AttendenceService $attendenceService)
    {
        $this->attendenceService = $attendenceService;
    }

    public function uploadAttendence(Request $request)
    {
        $file = $request->file;

        if ($file->getClientOriginalExtension() === 'xlsx') {

            $path = $file->storeAs('temp', 'attendence.xlsx');
            $import = new AttendenceImport();
            Excel::import($import, $path);
            $importedData = $import->getData();
            return response()->json([
                    'message' => 'Attendence imported successfully'
                ], 200);

        } else {
            return response()->json([
                'error' => 'Invalid file format. Please upload excel file.'
            ], 400);
        }

    }
}
