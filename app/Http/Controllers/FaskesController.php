<?php
// File: app/Http/Controllers/FaskesController.php

namespace App\Http\Controllers;

use App\Models\Faskes;
use Illuminate\Http\Request;

class FaskesController extends Controller
{
    public function index()
    {
        try {
            $faskesData = Faskes::getDataFromLocal();
            return view('home', ['faskesData' => $faskesData]);
        } catch (\Exception $e) {
            // Debugging: Log the error message
            \Log::error($e->getMessage());
            return view('home', ['faskesData' => null]);
        }
    }
}