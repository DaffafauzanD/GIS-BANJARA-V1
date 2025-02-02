<!DOCTYPE html>
<html lang="en">

<x-header></x-header>

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
                        <a href="#" class="btn text-light bg-secondary mb-3 mt-3 filter-btn" data-kode-kategori="all">Show all</a>
                        <a href="#" class="btn text-light bg-secondary mb-3 filter-btn" data-kode-kategori="1">Filter by Kode Kategori 1</a>
                        <a href="#" class="btn text-light bg-secondary mb-3 filter-btn" data-kode-kategori="2">Filter by Kode Kategori 2</a>
                        <a href="#" class="btn text-light bg-secondary mb-3 filter-btn" data-kode-kategori="3">Filter by Kode Kategori 3</a>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <a>Sort By</a>
                </div>
            </div>
            <div id="faskes-data">
                
            </div>
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
