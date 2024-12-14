<?php
// File: app/Http/Controllers/FaskesController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class FaskesController extends Controller
{
    public function index()
    {
        try {
            // Ensure the file path is correct
            $path = storage_path('app/private/Md-Image/faskes.geojson');
            if (file_exists($path)) {
                $json = file_get_contents($path);
                $faskesData = json_decode($json, true);
                if ($faskesData === null) {
                    throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
                }
            } else {
                throw new \Exception('File not found: ' . $path);
            }
            return view('home', ['faskesData' => $faskesData]);
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());
            return view('home', ['faskesData' => null]);
        }
    }

    public function getGeoJson()
    {
        
        // Pastikan file ada di storage
        if (Storage::exists('Md-Image/faskes.geojson')) {
            // Ambil data GeoJSON dari storage
            // $data1 = Storage::disk('local')->get('faskes.geojson');
             $data = Storage::get('Md-Image/faskes.geojson');

             $faskesData = json_decode($data, true);
            
            // Ubah string JSON ke format yang sesuai dan kembalikan respons
            return response()->json(json_decode($data), Response::HTTP_OK);
            
        
        } else {
            // Jika file tidak ditemukan, kembalikan error 404
            return response()->json(['error' => 'File not found'], Response::HTTP_NOT_FOUND);
        }
    }
}