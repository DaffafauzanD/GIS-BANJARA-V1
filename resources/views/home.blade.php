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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <div id="sidemenu-container">
        <div id="sidemenu" class="well">
            <div class="btn-group btn-group-justified btn-group-sm">
                <a class="btn btn-default"> <i class="bi bi-filter"></i> Filter </a>
            </div>
            <div class="divider10"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>Filter by</p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a>Sort By</a>
                </div>
            </div>
            @if ($faskesData && isset($faskesData['features']))
                <div id="faskes-data">
                    <div class="list-group point-list-view" id="list-group-container"
                        style="max-height: 400px; overflow-y: auto;">
                        @foreach ($faskesData['features'] as $faskes)
                            <a href="#" class="list-group-item point-item">
                                <h4 class="list-group-item-heading">
                                    {{ $faskes['properties']['nama_faskes'] ?? 'Nama tidak tersedia' }}</h4>
                                <p class="list-group-item-text">
                                    {{ implode(', ', $faskes['geometry']['coordinates']) }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div> 
            @else
                <p>No data available.</p>
            @endif
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
    <script src="js\ConfigurationMap.js"></script>



    <script>
        // Fungsi untuk menyisipkan elemen ke dalam kontrol Leaflet
        function injectCustomDiv() {
            // Cari elemen dengan kelas 'leaflet-top leaflet-left'
            var leafletTopLeft = document.querySelector('.leaflet-top.leaflet-left');

            const element = document.querySelector('.leaflet-control-zoom');
            if (element) {
                element.id = 'Myzoom';
            }
            if (leafletTopLeft) {
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
