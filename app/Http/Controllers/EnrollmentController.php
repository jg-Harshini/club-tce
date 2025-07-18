<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf; // Add this at the top if not already there




class EnrollmentController extends Controller
{
    public function exportExcel()
    {
        // ✅ Only fetch the fields you want (no photo)
        $registrations = Registration::all(['id', 'name', 'roll_no', 'email', 'phone', 'department', 'created_at']);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ✅ Set header row
        $sheet->fromArray([
            ['ID', 'Name', 'Roll No', 'Email', 'Phone', 'Department', 'Created At']
        ], null, 'A1');

        // ✅ Fill data
        $sheet->fromArray($registrations->toArray(), null, 'A2');

        // ✅ Prepare Excel download
        $writer = new Xlsx($spreadsheet);
        $fileName = 'registrations.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
    public function exportPDF()
{
    $students = Registration::all(['id', 'name', 'roll_no', 'email', 'phone', 'department', 'created_at']); // no photo
    $pdf = Pdf::loadView('pdf.enrollments', compact('students'));
    return $pdf->download('registrations.pdf');
}
}
