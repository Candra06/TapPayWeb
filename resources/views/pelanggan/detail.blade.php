@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Pelanggan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/pelanggan')}}">Pelanggan</a></li>
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
                    <h4 class="mb-0 text-white">Detail Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">Nama Pelanggan</small>
                            <h6>{{$detail->nama}}</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Username</small>
                            <h6>{{$detail->username}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">Telepon</small>
                            <h6>{{$detail->telepon}}</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Status</small>
                            <h6>{{$detail->status}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <small class="text-muted">Alamat</small>
                            <h6>{{$detail->alamat}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
