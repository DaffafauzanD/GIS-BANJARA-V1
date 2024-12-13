<?php
// File: app/Models/Faskes.php

namespace App\Models;

class Faskes
{
    public static function getDataFromLocal()
    {
        $path = storage_path('\Md-Image\faskes.geojson'); // Corrected extension
        
        if (file_exists($path)) {
            $json = file_get_contents($path);
            $data = json_decode($json, true);
            
            // Debugging: Check if data is read correctly
            if ($data === null) {
                throw new \Exception('Error decoding JSON: ' . json_last_error_msg());
            }
            
            return $data;
        }

        throw new \Exception('File not found: ' . $path);
    }
}