<?php

namespace App\Exports;

use App\Models\Enrollment;
use Maatwebsite\Excel\Concerns\FromCollection;

class EnrollmentsExport implements FromCollection
{
    public function collection()
    {
        return Enrollment::all();
    }
}
