<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class EnrollmentController extends Controller
{
    // ✅ Export as Excel (.xlsx)
    public function exportExcel()
    {
        // Eager load clubs to include them in the Excel
        $registrations = Registration::with('clubs')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header row
        $sheet->fromArray([
            ['ID', 'Name', 'Roll No', 'Email', 'Phone', 'Department', 'Clubs', 'Registered At']
        ], null, 'A1');

        // Fill data
        $row = 2;
        foreach ($registrations as $reg) {
            $clubNames = $reg->clubs->pluck('club_name')->implode(', ');
            $sheet->fromArray([
                $reg->id,
                $reg->name,
                $reg->roll_no,
                $reg->email,
                $reg->phone,
                $reg->department,
                $clubNames,
                $reg->created_at->format('d-m-Y H:i')
            ], null, 'A' . $row);

            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Write and return
        $writer = new Xlsx($spreadsheet);
        $fileName = 'registrations.xlsx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    // ✅ Export as PDF using Blade view
    public function exportPDF()
    {
        $students = Registration::with('clubs')->get(); // eager load clubs
        $pdf = Pdf::loadView('pdf.enrollments', compact('students'));
        return $pdf->download('registrations.pdf');
    }
}
