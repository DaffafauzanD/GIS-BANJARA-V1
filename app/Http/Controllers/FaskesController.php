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
    private const VIEW_NAME = 'home';
    private const VIEW_NAME_FILTER = 'homefilter';

    /**
     * Fetch and format Faskes data.
     *
     * @param \Illuminate\Database\Eloquent\Collection $faskesData
     * @return array
     */
    private function fetchFaskesData($faskesData)
    {
        return [
            'type' => 'FeatureCollection',
            'features' => $faskesData->map(function ($item) {
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
                        'id' => $item->id,
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
    }

    public function index(Request $request)
    {
        try {
            // Check if there is a 'nama_faskes' parameter in the request
            if ($request->has('nama_faskes')) {
                return $this->filterByNamaFaskes($request);
            }

            // Fetch data from the database
            $faskesData = Faskes::paginate(30);
            // Convert the data to GeoJSON format
            $geoJson = $this->fetchFaskesData($faskesData->getCollection());

            // Check for the 'format' query parameter
            $format = $request->query('format', 'view');

            if ($format === 'json') {
                return response()->json([
                    'faskesData' => $geoJson,
                    'pagination' => $faskesData->links()->toHtml()
                ], Response::HTTP_OK);
            } elseif ($format === 'geojson') {
                return response()->json($geoJson, Response::HTTP_OK);
            } else {
                return view(self::VIEW_NAME, ['faskesData' => $geoJson, 'pagination' => $faskesData->links()]);
            }
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error in FaskesController@index: ' . $e->getMessage());
            return view(self::VIEW_NAME, ['faskesData' => ['features' => []]]);
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function usermanager()
    {
        return view('usermanager');
    }

    public function managepoint()
    {
        return view('managepoint');
    }

    /**
     * Retrieve Faskes data in GeoJSON format.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getGeoJson()
    {
        try {
            // Retrieve data from the index method
            $faskesData = Faskes::all();
            $geoJson = $this->fetchFaskesData($faskesData);

            return response()->json($geoJson, Response::HTTP_OK);
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to retrieve data'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getAllData()
{
    try {
        $faskesData = Faskes::all();
        return response()->json(data: ['data' => $faskesData], status: Response::HTTP_OK);
    } catch (\Exception $e) {
        Log::error(message: 'Error fetching data: ' . $e->getMessage());
        return response()->json(data: ['error' => 'Failed to retrieve data'], status: Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

    /**
     * Filter Faskes by name.
        
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function filterByNamaFaskes(Request $request)
    {
        $namaFaskes = $request->input('nama_faskes');
        $faskesData = Faskes::filterByNamaFaskes($namaFaskes);
        $geoJson = $this->fetchFaskesData($faskesData);

        return view(self::VIEW_NAME, ['faskesData' => $geoJson]);
    }

    public function filterByKodeDesa($kodeDesa)
    {
        $faskesData = Faskes::filterByKodeDesa($kodeDesa);
        $geoJson = $this->fetchFaskesData($faskesData);

        return view(self::VIEW_NAME, ['faskesData' => $geoJson]);
    }

    public function filterByKodeKategori($kodeKategori, Request $request)
    {
        try {
            $faskesData = Faskes::filterByKodeKategori($kodeKategori);
            $geoJson = $this->fetchFaskesData($faskesData);

            // Check for the 'format' query parameter
            $format = $request->query('format', 'view');

            if ($format === 'geojson') {
                return response()->json($geoJson, Response::HTTP_OK);
            } else {
                return view(self::VIEW_NAME, ['faskesData' => $geoJson]);
            }
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error in FaskesController@filterByKodeKategori: ' . $e->getMessage());
            return view(self::VIEW_NAME, ['faskesData' => ['features' => []]]);
        }
    }
}
