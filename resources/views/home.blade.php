<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <title>GIS Application</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="ext/customScroll/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="css/style.default.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    @vite('resources/js/app.js')
    <style>
        #map {
            height: 917px;
            width: 100%;

        }


        .leaflet-top.leaflet-left {
            display: flex;
            flex-direction: row-reverse;

            padding-left: 20px;
            /* Mengatur elemen sejajar horizontal */
            align-items: baseline;
            /* Menyelaraskan elemen ke atas */
        }
    </style>
</head>

<body>

    <x-navbar></x-navbar>

    <div id="search-box">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="searchText">Search</label>
                <input type="text" class="form-control input-sm" id="searchText" placeholder="Search Location">
            </div>
            <button type="submit" class="btn btn-default btn-sm">
                <i class="glyphicon glyphicon-search"></i>
            </button>
        </form>
    </div>

    <div id="sidemenu-container">
        <div id="sidemenu" class="well">
            <div class="btn-group btn-group-justified btn-group-sm">
                <a class="btn btn-default"> <i class="glyphicon glyphicon-fullscreen"></i> Fit in Window </a>
                <a class="btn btn-default"> <i class="glyphicon glyphicon-filter"></i> Filter </a>
            </div>
            <div class="divider10"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a>Sort By</a>
                </div>
            </div>
            <div class="list-group point-list-view" id="list-group-container">
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 1</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item active">
                    <h4 class="list-group-item-heading">Location 2</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 3</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 1</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 2</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 3</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 1</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 2</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 3</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 1</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 2</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
                <a href="#"class="list-group-item point-item">
                    <h4 class="list-group-item-heading">Location 3</h4>
                    <p class="list-group-item-text">
                        Location Address
                    </p>
                </a>
            </div>
        </div>
    </div>


    <div id="map"></div>








    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="ext/customScroll/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="ext/customScroll/js/jquery.mousewheel.min.js"></script>
    <script src="js/application.js"></script>

    <script src="Md-Image\faskes.geojson"></script>




    <script>

        var map = L.map('map').setView([-7.047736112975044, 107.58393418897262], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // L.marker([-7.047736112975044,107.58393418897262]).addTo(map)
        //     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        //     .openPopup();

        var geojsonData = {
            "type": "FeatureCollection",
            "features": [{
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5897,
                            -7.0460934,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 1,
                        "nama_faskes": "Puskesmas Banjaran Kota",
                        "kode_desa": "BJR01",
                        "kode_kategori": 1,
                        "kode_jenis": 1,
                        "alamat": "Jl. Pajagalan No.18, Banjaran",
                        "no_telp": "0225945253"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5698776,
                            -7.0556149,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 2,
                        "nama_faskes": "Puskesmas Kiangroke",
                        "kode_desa": "BJR09",
                        "kode_kategori": 1,
                        "kode_jenis": 1,
                        "alamat": "Jl. Raya Pangalengan No.444, Kiangroke",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5916366,
                            -7.0864159,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 3,
                        "nama_faskes": "Bidan Anisa Rohmatunisa A.M.,Keb.",
                        "kode_desa": "BJR04",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Lemah Duhur, Mekarjaya",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5661083,
                            -7.0549877,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 4,
                        "nama_faskes": "Bidan Yeni Rusyani",
                        "kode_desa": "BJR09",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Lembang No.59, Kiangroke",
                        "no_telp": "0225944601"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.597828,
                            -7.076427,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 5,
                        "nama_faskes": "BPM.FARIDA HAFNI",
                        "kode_desa": "BJR02",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Mekar Jaya, Banjaran Wetan",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5833914,
                            -7.051861,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 6,
                        "nama_faskes": "Bidan santi.s amKeb",
                        "kode_desa": "BJR05",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Sindangpanon No.64, Sindangpanon",
                        "no_telp": "081802178304"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5834529,
                            -7.0550823,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 7,
                        "nama_faskes": "Praktek Bidan Siti Julaeha",
                        "kode_desa": "BJR05",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Sindangpanon, Sindangpanon",
                        "no_telp": "088218752883"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.574332,
                            -7.0526442,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 8,
                        "nama_faskes": "Praktek Mandiri Bidan Hj Pipih Supriyati",
                        "kode_desa": "BJR09",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Raya Pangalengan No.373A, Kiangroke",
                        "no_telp": "085722024174"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5688656,
                            -7.05437,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 9,
                        "nama_faskes": "Bidan Rini Anriani",
                        "kode_desa": "BJR09",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Kp Lembang No.29, RT.001/RW.005, Kiangroke",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5863707,
                            -7.0848792,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 10,
                        "nama_faskes": "Bidan Eti Rositawati",
                        "kode_desa": "BJR04",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Batu, Mekarjaya",
                        "no_telp": "082120487130"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5841181,
                            -7.0866413,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 11,
                        "nama_faskes": "Bidan Erika Trisia Pujiastuti",
                        "kode_desa": "BJR06",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Pasir Mulya, Pasirmulya",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.595417,
                            -7.0512516,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 12,
                        "nama_faskes": "Bidan Erika Agustina, Amd.Keb",
                        "kode_desa": "BJR02",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Cileutik, RT. 006, RT.006/RW.008, Banjaran Wetan",
                        "no_telp": "089531303428"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5907573,
                            -7.0442278,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 13,
                        "nama_faskes": "Praktek Bidan Pajagalan bisa BPJS",
                        "kode_desa": "BJR01",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Pajagalan asri residen, blok A8, RT.02/RW.11, Banjaran",
                        "no_telp": "082311319946"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5802252,
                            -7.0612146,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 14,
                        "nama_faskes": "Praktek Mandiri Bidan Siti Julaeha Irawan, AMd.Keb",
                        "kode_desa": "BJR05",
                        "kode_kategori": 2,
                        "kode_jenis": 2,
                        "alamat": "Jl. Kp. Pamoyanan, Sindangpanon",
                        "no_telp": "081322822040"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.6072109,
                            -7.070749,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 15,
                        "nama_faskes": "Polindes Banjaran Wetan",
                        "kode_desa": "BJR02",
                        "kode_kategori": 3,
                        "kode_jenis": 1,
                        "alamat": "Jl. Kiara Payung, Banjaran Wetan",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5895656,
                            -7.0575981,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 16,
                        "nama_faskes": "Klinik Pratama KIMFA MEDIKA",
                        "kode_desa": "BJR03",
                        "kode_kategori": 3,
                        "kode_jenis": 1,
                        "alamat": "Jl. Ciapus, RT.01/RW.06, Ciapus",
                        "no_telp": "085659974168"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5925036,
                            -7.0473194,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 17,
                        "nama_faskes": "Klinik Banjaran Medika",
                        "kode_desa": "BJR02",
                        "kode_kategori": 3,
                        "kode_jenis": 1,
                        "alamat": "Jl. Raya Banjaran Barat No.46, Banjaran Wetan",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.592831,
                            -7.0476091,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 18,
                        "nama_faskes": "Klinik Bersalin Norma Masitha",
                        "kode_desa": "BJR02",
                        "kode_kategori": 3,
                        "kode_jenis": 2,
                        "alamat": "Jl. Raya Banjaran Barat, Banjaran Wetan",
                        "no_telp": "0225944144"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5922529,
                            -7.0489818,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 19,
                        "nama_faskes": "Klinik Purnama Medika",
                        "kode_desa": "BJR02",
                        "kode_kategori": 3,
                        "kode_jenis": 1,
                        "alamat": "Jl. Kapten Sarwono No.188, Banjaran Wetan",
                        "no_telp": ""
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "type": "Point",
                        "coordinates": [
                            107.5928886,
                            -7.0462261,
                            0
                        ]
                    },
                    "properties": {
                        "kode_faskes": 20,
                        "nama_faskes": "Klinik Pratama Rahmah Ermansyah",
                        "kode_desa": "BJR02",
                        "kode_kategori": 3,
                        "kode_jenis": 1,
                        "alamat": "Jl. Raya Banjaran No.02, Banjaran Wetan",
                        "no_telp": "082116524797"
                    }
                }
            ]
        };

        L.geoJSON(geojsonData, {
            onEachFeature: function (feature, layer) {
                if (feature.properties && feature.properties.popupContent) {
                    layer.bindPopup(feature.properties.popupContent);
                }
            }
        }).addTo(map);

        // Fungsi untuk menyisipkan elemen ke dalam kontrol Leaflet
        function injectCustomDiv() {
            // Cari elemen dengan kelas 'leaflet-top leaflet-left'
            var leafletTopLeft = document.querySelector('.leaflet-top.leaflet-left');

            const element = document.querySelector('.leaflet-control-zoom');
            if (element) {
                element.id = 'Myzoom';
            }
            if (leafletTopLeft) {
                // Buat elemen div baru
                var sidemenu = document.getElementById('sidemenu-container');
                var searchBox = document.getElementById('search-box');
                var zoomControl = document.getElementById('Myzoom');

                if (leafletTopLeft && sidemenu) {
                    leafletTopLeft.appendChild(searchBox); // Sisipkan ke Leaflet control container
                    leafletTopLeft.appendChild(zoomControl); // Sisipkan ke Leaflet control container

                    leafletTopLeft.appendChild(sidemenu); // Sisipkan ke Leaflet control container
                }
            }
        }

        // Panggil fungsi setelah peta dimuat
        map.whenReady(injectCustomDiv);
    </script>
</body>

</html>
