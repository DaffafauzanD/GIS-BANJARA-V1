<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <title>GIS Application</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ext/customScroll/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.default.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        body {
            padding-top: 56px;
            /* Adjust this value based on the height of your navbar */
        }

        .collapsing {
            transition: height 0.35s ease;
        }

        .collapse {
            transition: height 0.35s ease;
        }

        .show {
            transition: height 0.35s ease;
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

    <div id="sidemenu-container" class="z-3">
        <div id="sidemenu" class="well">
            <div class="btn-group w-100 btn-group-sm" id="filter-button">
                <a class="btn bg-light" data-bs-toggle="collapse" href="#filter-by" role="button" aria-expanded="false" aria-controls="filter-by">
                    <i class="bi bi-filter"></i> Filter
                </a>
            </div>
            <div class="my-2"></div>
            <div class="card overflow-y collapse" id="filter-by">
                <div class="card-body">
                    <a>Filter by</a>
                    <div class="d-flex flex-column flex-wrap mb-3">
                        <a href="/home" class="btn text-light bg-secondary mb-3 mt-3" id="filter_kategori_1">show all</a>
                        <a href="{{ url('/home/filterByKodeKategori/1') }}" class="btn text-light bg-secondary mb-3" id="filter_kategori_1">Filter by Kode Kategori 1</a>
                        <a href="{{ url('/home/filterByKodeKategori/2') }}" class="btn text-light bg-secondary mb-3">Filter by Kode Kategori 2</a>
                        <a href="{{ url('/home/filterByKodeKategori/3') }}" class="btn text-light bg-secondary mb-3">Filter by Kode Kategori 3</a>
                    </div>
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
                                <p class="list-group-item-text">
                                    {{ $faskes['properties']['alamat'] ?? 'Alamat tidak tersedia' }}
                                </p>
                                <p class="list-group-item-text">
                                    {{ $faskes['properties']['no_telp'] ?? 'Telepon tidak tersedia' }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
                <script>
                    var faskesData = @json($faskesData);
                </script>
            @else
                <p>No data available.</p>
            @endif
        </div>
    </div>


    <div id="map"></div>

   

    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ext/customScroll/js/jquery.mCustomScrollbar.min.js') }}"></script>
    <script src="{{ asset('ext/customScroll/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('js/ConfigurationMap.js') }}"></script>
    <script src="{{ asset('js/application.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    {{-- <script>
        // Pass the faskesData to JavaScript
        var faskesData = @json($faskesData);
    </script> --}}
</body>

</html>
