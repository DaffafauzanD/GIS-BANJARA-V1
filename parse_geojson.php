<?php
// File: parse_geojson.php

$path = __DIR__ . '/storage/app/private/Md-Image/faskes.geojson'; // Adjust the path if necessary
if (file_exists($path)) {
    $json = file_get_contents($path);
    $data = json_decode($json, true);

    if ($data === null) {
        throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
    }

    // Extract the features
    $features = $data['features'];

    // Prepare the data for seeding
    $faskesData = [];
    foreach ($features as $feature) {
        $faskesData[] = [
            'kode_faskes' => $feature['properties']['kode_faskes'],
            'nama_faskes' => $feature['properties']['nama_faskes'],
            'kode_desa' => $feature['properties']['kode_desa'],
            'kode_kategori' => $feature['properties']['kode_kategori'],
            'kode_jenis' => $feature['properties']['kode_jenis'],
            'alamat' => $feature['properties']['alamat'],
            'no_telp' => $feature['properties']['no_telp'],
            'latitude' => $feature['geometry']['coordinates'][1],
            'longitude' => $feature['geometry']['coordinates'][0],
        ];
    }

    // Print the data for seeding
    echo json_encode($faskesData, JSON_PRETTY_PRINT);
} else {
    throw new \Exception('File not found: ' . $path);
}