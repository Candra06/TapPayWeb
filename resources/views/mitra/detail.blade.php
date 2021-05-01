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
                            <h6>{{$detail->nama_usaha}}</h6>
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
                        <div class="col-md-6">
                            <small class="text-muted">Alamat</small>
                            <h6>{{$detail->alamat}}</h6>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Info</small>
                            <h6>{{$detail->info}}</h6>
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
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($paket as $item)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$item->nama_paket}}</td>
                                    <td>{{$item->tarif}}</td>
                                    <td>{{$item->status}}</td>
                                </tr> 
                                @php
                                    $no = 1;
                                @endphp
                            @endforeach
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
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($berlangganan as $item)
                                <tr>
                                    <th scope="row">{{$no}}</th>
                                    <td><a href="{{url('/pelanggan/detail/'.$item->id)}}">{{$item->nama}}<a></td>
                                    <td>{{$item->nama_paket}}</td>
                                    <td>{{$item->status}}</td>
                                </tr>
                                @php
                                    $no++;
                                @endphp  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
