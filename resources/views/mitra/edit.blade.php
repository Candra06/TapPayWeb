@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Mitra</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/mitra">Mitra</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- Detail Mitra -->
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Mitra</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="row mb-3">
                            <label for="nama_usaha" class="text-right col-lg-3 col-form-label">Nama Usaha</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="nama_usaha" placeholder="Nama Usaha">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="text-right col-lg-3 col-form-label">Username</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="text-right col-lg-3 col-form-label">Password</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telepon" class="text-right col-lg-3 col-form-label">Telepon</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="telepon" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="info" class="text-right col-lg-3 col-form-label">Info</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="info" placeholder="Info">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat" class="text-right col-lg-3 col-form-label">Alamat</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="text-right col-lg-3 col-form-label">Status</label>
                            <div class="col-lg-8">
                                <select class="form-control" id="status">
                                    <option>Aktif</option>
                                    <option>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse col-lg-11">
                            <div class="text-end">
                                <button class="btn btn-info p-2" type="submit">Simpan Perubahan</button>
                                <a class="btn btn-dark p-2" href="/mitra" role="button">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
