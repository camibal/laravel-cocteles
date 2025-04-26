<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DashboardController extends Controller
{
    public function __construct()
    {
        Route::middleware('auth')->group(function() {
            // rutas aquí
        });
    }

    public function index()
    {
        return view('dashboard');
    }
}
