@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Tagihan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/tagihan') }}">Tagihan</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                    <h4 class="mb-0 text-white">Detail Tagihan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-muted">Nama Mitra</label>
                            <h6><a href="{{ url('mitra/detail/' . $data->id_mitra) }}">{{ $data->nama_usaha }}</a></h6>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Jumlah Tagihan</label>
                            <h6>Rp. {{ Helper::uang($data->jumlah_tagihan) }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-muted">Tagihan Bulan</label>
                            <h6>{{ Helper::bulantahun($data->tagihan_bulan) }}</h6>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Status</label>
                            <h6>{{ $data->status_tagihan }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-muted">Dibuat Pada</label>
                            <h6>{{ $data->created_at }}</h6>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted">Diubah Pada</label>
                            <h6>{{ $data->updated_at }}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-muted">Dibuat Oleh</label>
                            <h6>Admin</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email2">Bukti Pembayaran</label>
                                @if ($data->bukti == null)
                                    <h6>Belum ada bukti pembayaran</h6>
                                @else
                                    <img src="{{ url('/' . $data->bukti) }}" class="col-md-12" alt="" srcset="">
                                @endif
                            </div>

                        </div>
                    </div>
                    @if ($data->status_tagihan != 'Lunas')
                        <div class="row mt-4">
                            <div class="col-md-1">
                                <form action="{{ url('/tagihan/' . $data->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status_tagihan" value="Lunas" id="">
                                    <button class="btn btn-success p-2" type="submit"><span><i
                                                class="fa fa-check"></i></span> Terima</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="{{ url('/tagihan/' . $data->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <input type="hidden" name="status_tagihan" value="Ditolak" id="">
                                    <button class="btn btn-danger p-2" type="submit"><span><i
                                                class="fa fa-times"></i></span> Tolak</button>
                                </form>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
