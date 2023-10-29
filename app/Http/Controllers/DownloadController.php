<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($file)
    {
        
        $filePath = storage_path("app/public/assets/registrationcertificate/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadTACetificate($file)
    {
        
        $filePath = storage_path("app/public/assets/12Acertificate/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadFCRACetificate($file)
    {
        
        $filePath = storage_path("app/public/assets/FCRAcertificate/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAuditReport1($file)
    {
        
        $filePath = storage_path("app/public/assets/AuditReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAuditReport2($file)
    {
        
        $filePath = storage_path("app/public/assets/AuditReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAuditReport3($file)
    {
        
        $filePath = storage_path("app/public/assets/AuditReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAnnualReport1($file)
    {
        
        $filePath = storage_path("app/public/assets/AnnualReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAnnualReport2($file)
    {
        
        $filePath = storage_path("app/public/assets/AnnualReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }

    public function downloadAnnualReport3($file)
    {
        
        $filePath = storage_path("app/public/assets/AnnualReport/{$file}");
        

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return back()->with('error', 'File does not found.');
        }
    }
}
