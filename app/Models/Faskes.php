<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    use HasFactory;

    // Nama tabel yang direpresentasikan oleh model (opsional jika sesuai konvensi Laravel)
    protected $table = 'faskes';

    // Atribut yang dapat diisi secara massal
    protected $fillable = [
        'kode_faskes',
        'nama_faskes',
        'kode_desa',
        'kode_kategori',
        'kode_jenis',
        'alamat',
        'no_telp',
        'latitude',
        'longitude',
    ];

    // Atribut yang disembunyikan saat serialisasi (opsional)
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Menentukan tipe data atribut (casting)
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // Accessor: Mengubah format nama_faskes saat diambil
    public function getNamaFaskesAttribute($value)
    {
        return ucwords($value);
    }

    // Mutator: Mengubah format nama_faskes sebelum disimpan
    public function setNamaFaskesAttribute($value)
    {
        $this->attributes['nama_faskes'] = strtolower($value);
    }

    // Method untuk mendapatkan koordinat sebagai array
    public function getCoordinates()
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
