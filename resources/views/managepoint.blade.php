<!DOCTYPE html>
<html lang="en">
<x-AdminHeader></x-AdminHeader>

<body class="sb-nav-fixed">
    <x-navbarAdmin></x-navbarAdmin>
    <div id="layoutSidenav">
        <x-sidebarAdmin></x-sidebarAdmin>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    <div class="card mb-4 bg-alabaster rounded-4">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="fs-3 fw-normal text-dark">Manage Point</div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4 d-flex">
                                            <div class="card-body bg-pastelblue rounded-3 flex-still">
                                                <div class="row ">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Nama Fasilitas Kesehatan</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Alamat</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <textarea class="form-control" placeholder="Leave a comment here" style="height: 100px"></textarea>   
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Kode Desa</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Kode Kategori</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Kode Jenis</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">No Telepon</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Longitude</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group m-0">
                                                                <div class="col-md-6">
                                                                    <label class="col-form-label">Latitude</label>    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <input class="form-control">    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-10">
                                                                    <button type="button" class="btn btn-lg bg-alabaster">Tambahkan Titik</button>
                                                                </div>
                                                            </div>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 d-flex">
                                            <div id="map" class="rounded-3 flex-still h-100 d-inline-block"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/ConfigurationMap.js') }}"></script>
    <script src="{{ asset('js/application.js') }}"></script>
    <script src="{{ asset('js/Admin/scripts.js') }}"></script>
    <script src="{{ asset('js/Admin/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/Admin/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/Admin/chart-bar-demo.js') }}"></script>

</body>

</html>
