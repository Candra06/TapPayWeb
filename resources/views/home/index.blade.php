@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-info"><i class="mdi mdi-human-greeting"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{ $mitra }}</h3>
                            <small class="text-muted m-b-0">Jumlah Mitra</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-account-multiple"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">{{ $pelanggan }}</h3>
                            <small class="text-muted m-b-0">Jumlah Pelanggan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-primary"><i class="ti-wallet"></i>
                        </div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">Rp. {{Helper::uang($pendapatan)}}</h3>
                            <small class="text-muted m-b-0">Pendapatan </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-credit-card"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0 font-lgiht">Rp. 687</h3>
                            <small class="text-muted m-b-0">Total Tagihan</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Tagihan Bulan {{ Helper::bulantahun(Date('Y-m-d'))}}</h4>
                    <div class="row">
                        <!-- Generate -->
                        <div class="col-lg-7">
                            <a href="{{ url('/generate')}}">
                                <button type="button" class="btn btn-info">Generate Tagihan</button>
                            </a>
                        </div>

                    </div>
                    @if (session('status'))
                        <div class="alert alert-success mt-2" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive ">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mitra</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Bulan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td><a
                                                href="{{ url('/mitra/detail/' . $item->id_mitra) }}">{{ $item->nama_usaha }}</a>
                                        </td>
                                        <td>Rp. {{ Helper::uang($item->jumlah_tagihan) }}</td>
                                        <td>{{ Helper::bulantahun($item->tagihan_bulan)}}</td>
                                        <td>{{ $item->status_tagihan }}</td>
                                        <td>
                                            <a href="{{ url('/tagihan/'. $item->id.'/edit' ) }}" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
