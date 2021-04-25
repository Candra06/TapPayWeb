@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Pelanggan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/pelanggan')}}">Pelanggan</a></li>
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
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Edit Pelanggan</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama" placeholder="Nama Pelanggan">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" placeholder="Telepon">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status">Status</label>
                                    <select class="form-control" id="status">
                                        <option>Aktif</option>
                                        <option>Tidak Aktif</option>
                                    </select>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <div class="text-end">
                                <button class="btn btn-info p-2" type="submit">Simpan Perubahan</button>
                                <a class="btn btn-dark p-2" href="{{url('/pelanggan')}}" role="button">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
