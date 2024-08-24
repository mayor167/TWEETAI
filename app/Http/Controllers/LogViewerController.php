<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogViewerController extends Controller
{
    public function index()
    {
        $logFile = storage_path('logs/laravel.log');
        
        if (file_exists($logFile)) {
            $logs = file_get_contents($logFile);
        } else {
            $logs = "Log file not found.";
        }

        $logs = array_reverse(explode("\n", $logs));

        return view('logs', ['logs' => $logs]);
    }
}


