<?php

namespace Database\Seeders;

use App\Models\Faskes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaskesSeeder extends Seeder
{
    public function run()
    {
        $faskesData = [
            // Paste the output from parse_geojson.php here
            [
                "nama_faskes"=> "Puskesmas Banjaran Kota",
                "kode_desa"=> "BJR01",
                "kode_kategori"=> 1,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Pajagalan No.18, Banjaran",
                "no_telp"=> "0225945253",
                "latitude"=> -7.0460934,
                "longitude"=> 107.5897
            ],
            [
                "nama_faskes"=> "Puskesmas Kiangroke",
                "kode_desa"=> "BJR09",
                "kode_kategori"=> 1,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Raya Pangalengan No.444, Kiangroke",
                "no_telp"=> "0225944601",
                "latitude"=> -7.0556149,
                "longitude"=> 107.5698776
            ],
            [
                "nama_faskes"=> "Bidan Anisa Rohmatunisa A.M.,Keb.",
                "kode_desa"=> "BJR04",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Lemah Duhur, Mekarjaya",
                "no_telp"=> "",
                "latitude"=> -7.0864159,
                "longitude"=> 107.5916366
            ],
            [
                "nama_faskes"=> "Bidan Yeni Rusyani",
                "kode_desa"=> "BJR09",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Lembang No.59, Kiangroke",
                "no_telp"=> "0225944601",
                "latitude"=> -7.0549877,
                "longitude"=> 107.5661083
            ],
            [
                "nama_faskes"=> "BPM.FARIDA HAFNI",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Mekar Jaya, Banjaran Wetan",
                "no_telp"=> "",
                "latitude"=> -7.076427,
                "longitude"=> 107.597828
            ],
            [
                "nama_faskes"=> "Bidan santi.s amKeb",
                "kode_desa"=> "BJR05",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Sindangpanon No.64, Sindangpanon",
                "no_telp"=> "081802178304",
                "latitude"=> -7.051861,
                "longitude"=> 107.5833914
            ],
            [
                "nama_faskes"=> "Praktek Bidan Siti Julaeha",
                "kode_desa"=> "BJR05",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Sindangpanon, Sindangpanon",
                "no_telp"=> "088218752883",
                "latitude"=> -7.0550823,
                "longitude"=> 107.5834529
            ],
            [
                "nama_faskes"=> "Praktek Mandiri Bidan Hj Pipih Supriyati",
                "kode_desa"=> "BJR09",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Raya Pangalengan No.373A, Kiangroke",
                "no_telp"=> "085722024174",
                "latitude"=> -7.0526442,
                "longitude"=> 107.574332
            ],
            [
                "nama_faskes"=> "Bidan Rini Anriani",
                "kode_desa"=> "BJR09",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Kp Lembang No.29, RT.001\/RW.005, Kiangroke",
                "no_telp"=> "",
                "latitude"=> -7.05437,
                "longitude"=> 107.5688656
            ],
            [
                "nama_faskes"=> "Bidan Eti Rositawati",
                "kode_desa"=> "BJR04",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Batu, Mekarjaya",
                "no_telp"=> "082120487130",
                "latitude"=> -7.0848792,
                "longitude"=> 107.5863707
            ],
            [
                "nama_faskes"=> "Bidan Erika Trisia Pujiastuti",
                "kode_desa"=> "BJR06",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Pasir Mulya, Pasirmulya",
                "no_telp"=> "",
                "latitude"=> -7.0866413,
                "longitude"=> 107.5841181
            ],
            [
                "nama_faskes"=> "Bidan Erika Agustina, Amd.Keb",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Cileutik, RT. 006, RT.006\/RW.008, Banjaran Wetan",
                "no_telp"=> "089531303428",
                "latitude"=> -7.0512516,
                "longitude"=> 107.595417
            ],
            [
                "nama_faskes"=> "Praktek Bidan Pajagalan bisa BPJS",
                "kode_desa"=> "BJR01",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Pajagalan asri residen, blok A8, RT.02\/RW.11, Banjaran",
                "no_telp"=> "082311319946",
                "latitude"=> -7.0442278,
                "longitude"=> 107.5907573
            ],
            [
                "nama_faskes"=> "Praktek Mandiri Bidan Siti Julaeha Irawan, AMd.Keb",
                "kode_desa"=> "BJR05",
                "kode_kategori"=> 2,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Kp. Pamoyanan, Sindangpanon",
                "no_telp"=> "081322822040",
                "latitude"=> -7.0612146,
                "longitude"=> 107.5802252
            ],
            [
                "nama_faskes"=> "Polindes Banjaran Wetan",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 3,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Kiara Payung, Banjaran Wetan",
                "no_telp"=> "",
                "latitude"=> -7.070749,
                "longitude"=> 107.6072109
            ],
            [
                "nama_faskes"=> "Klinik Pratama KIMFA MEDIKA",
                "kode_desa"=> "BJR03",
                "kode_kategori"=> 3,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Ciapus, RT.01\/RW.06, Ciapus",
                "no_telp"=> "085659974168",
                "latitude"=> -7.0575981,
                "longitude"=> 107.5895656
            ],
            [
                "nama_faskes"=> "Klinik Banjaran Medika",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 3,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Raya Banjaran Barat No.46, Banjaran Wetan",
                "no_telp"=> "",
                "latitude"=> -7.0473194,
                "longitude"=> 107.5925036
            ],
            [
                "nama_faskes"=> "Klinik Bersalin Norma Masitha",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 3,
                "kode_jenis"=> 2,
                "alamat"=> "Jl. Raya Banjaran Barat, Banjaran Wetan",
                "no_telp"=> "0225944144",
                "latitude"=> -7.0476091,
                "longitude"=> 107.592831
            ],
            [
                "nama_faskes"=> "Klinik Purnama Medika",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 3,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Kapten Sarwono No.188, Banjaran Wetan",
                "no_telp"=> "",
                "latitude"=> -7.0489818,
                "longitude"=> 107.5922529
            ],
            [
                "nama_faskes"=> "Klinik Pratama Rahmah Ermansyah",
                "kode_desa"=> "BJR02",
                "kode_kategori"=> 3,
                "kode_jenis"=> 1,
                "alamat"=> "Jl. Raya Banjaran No.02, Banjaran Wetan",
                "no_telp"=> "082116524797",
                "latitude"=> -7.0462261,
                "longitude"=> 107.5928886
            ]
            // Add more data as needed
        ];

        DB::table('faskes')->insert($faskesData);
    }
}
