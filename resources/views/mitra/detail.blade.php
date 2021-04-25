@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Mitra</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/mitra')}}">Mitra</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->

    <!-- ----------------------------------------- -->
    <!-- Detail Mitra-->
    <!-- ----------------------------------------- -->
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Detail Mitra</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">Nama Usaha</small>
                            <h6>Nama Usaha</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Username</small>
                            <h6>username</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">Telepon</small>
                            <h6>0888888888888</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Password</small>
                            <h6>username123</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">Alamat</small>
                            <h6>Jl. KIS Mangunsarkoro</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Status</small>
                            <h6>Aktif</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small class="text-muted">Info</small>
                            <h6>BRI. 123</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------- -->
    <!-- List Paket-->
    <!-- ----------------------------------------- -->
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">List Paket</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Tarif</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Paket Internet</td>
                            <td>100000</td>
                            <td>Aktif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    <!-- ----------------------------------------- -->
    <!-- List Pelanggan -->
    <!-- ----------------------------------------- -->
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">List Pelanggan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pelanggan</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td><a href="{{url('/pelanggan/detail/{id}')}}">Nama Pelanggan<a></td>
                            <td>Paket Internet</td>
                            <td>Aktif</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
@endsection
