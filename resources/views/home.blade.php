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






    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('A pretty CSS popup.<br> Easily customizable.')
            .openPopup();

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
