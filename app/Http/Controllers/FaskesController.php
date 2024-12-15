<?php
// File: app/Http/Controllers/FaskesController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Faskes;

class FaskesController extends Controller
{
    public function index()
    {
        try {
            // Fetch data from the database
            $faskesData = Faskes::all();

            // Convert the data to the format expected by the view
            $faskesDataArray = $faskesData->map(function ($item) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [
                            $item->longitude,
                            $item->latitude,
                            0
                        ]
                    ],
                    'properties' => [
                        'kode_faskes' => $item->kode_faskes,
                        'nama_faskes' => $item->nama_faskes,
                        'kode_desa' => $item->kode_desa,
                        'kode_kategori' => $item->kode_kategori,
                        'kode_jenis' => $item->kode_jenis,
                        'alamat' => $item->alamat,
                        'no_telp' => $item->no_telp,
                    ]
                ];
            });

            return view('home', ['faskesData' => ['features' => $faskesDataArray]]);
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());
            return view('home', ['faskesData' => null]);
        }
    }

    public function getGeoJson()
    {
        
        $faskes = Faskes::all();

        $geoJson = [
            'type' => 'FeatureCollection',
            'features' => $faskes->map(callback: function (Faskes $item): array {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [
                            $item->longitude,
                            $item->latitude,
                            0
                        ]
                    ],
                    'properties' => [
                        'nama_faskes' => $item->nama_faskes,
                        'kode_desa' => $item->kode_desa,
                        'kode_kategori' => $item->kode_kategori,
                        'kode_jenis' => $item->kode_jenis,
                        'alamat' => $item->alamat,
                        'no_telp' => $item->no_telp,
                    ]
                ];
            }),
        ];

        return response()->json(data: $geoJson, status: Response::HTTP_OK);
    }
}