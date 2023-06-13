<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendenceImport implements ToCollection, WithHeadingRow
{
    private $data;

    public function collection(Collection $rows)
    {
        $this->data = $rows;
    }

    public function getData()
    {
        return $this->data;
    }
}

