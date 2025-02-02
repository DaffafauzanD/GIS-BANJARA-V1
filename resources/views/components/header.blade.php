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

