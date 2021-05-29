@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Pelanggan</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/pelanggan') }}">Pelanggan</a></li>
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
                    <form action="{{ url('/pelanggan/update/' . $data->id) }}" method="post">
                        @method('put')
                        @csrf
                        @if (session('status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama }}"
                                    placeholder="Nama Pelanggan">
                                @if ($errors->has('nama'))
                                    <span class="errormsg">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" id="telepon" value="{{ $data->telepon }}"
                                    placeholder="Telepon" name="telepon">
                                @if ($errors->has('telepon'))
                                    <span class="errormsg">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="alamat">Alamat</label>
                                <textarea id="alamat" class="form-control " rows="1" name="alamat" placeholder="Alamat"
                                    required="required">{{ $data->alamat }}</textarea>

                                @if ($errors->has('alamat'))
                                    <span class="errormsg">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Aktif" {{ $data->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Banned" {{ $data->status == 'Banned' ? 'selected' : '' }}>Banned
                                    </option>
                                    <option value="Suspend" {{ $data->status == 'Suspend' ? 'selected' : '' }}>Suspend
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="errormsg">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>


                        <button class="btn btn-info p-2" type="submit">Simpan Perubahan</button>
                        <a class="btn btn-dark p-2" href="{{ url('/pelanggan') }}" role="button">Batal</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
