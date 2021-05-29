@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Tagihan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Tagihan</li>
            </ol>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Tagihan</h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
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
                                        <td>{{ $item->jumlah_tagihan }}</td>
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
