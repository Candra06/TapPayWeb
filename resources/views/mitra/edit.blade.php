@extends('layout.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Mitra</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/mitra') }}">Mitra</a></li>
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
                    <h4 class="mb-0 text-white">Edit Mitra</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/mitra/update/' . $mitra->id) }}" method="post">
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
                        <input type="hidden" value="{{ $mitra->id_akun }}" name="id_akun">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label " for="nama_usaha">Nama Usaha</span></label>
                                    <input id="nama_usaha" class="form-control col-md-12 col-xs-12" name="nama_usaha"
                                        placeholder="Nama Usaha" required="required" type="text"
                                        value="{{ old('nama_usaha', $mitra->nama_usaha) }}">

                                    @if ($errors->has('nama_usaha'))
                                        <span class="errormsg">{{ $errors->first('nama_usaha') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label " for="telepon">Telepon</span></label>

                                    <input id="telepon" class="form-control col-md-12 col-xs-12" name="telepon"
                                        placeholder="Telepon" required="required" type="text"
                                        value="{{ old('telepon', $mitra->telepon) }}">

                                    @if ($errors->has('telepon'))
                                        <span class="errormsg">{{ $errors->first('telepon') }}</span>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label " for="status">Status</span></label>

                                    <select name="status" class="form-control">
                                        <option value="">Status Mitra</option>
                                        <option value="Aktif" {{ $mitra->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="Banned" {{ $mitra->status == 'Banned' ? 'selected' : '' }}>Banned
                                        </option>
                                        <option value="Suspend" {{ $mitra->status == 'Suspend' ? 'selected' : '' }}>
                                            Suspend </option>
                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="errormsg">{{ $errors->first('status') }}</span>
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="alamat">Alamat</span></label>
                                    <textarea id="alamat" class="form-control " rows="1" name="alamat" placeholder="Alamat"
                                        required="required">{{ $mitra->alamat }}</textarea>

                                    @if ($errors->has('alamat'))
                                        <span class="errormsg">{{ $errors->first('alamat') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="info">Info</span></label>
                                    <textarea id="info" class="form-control " name="info" placeholder="Info"
                                        required="required">{{ $mitra->info }}</textarea>
                                    @if ($errors->has('info'))
                                        <span class="errormsg">{{ $errors->first('info') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label " for="username">Username</span></label>

                                    <input id="username" class="form-control" name="username" placeholder="Username"
                                        required="required" type="text" value="{{ old('username', $mitra->username) }}">

                                    @if ($errors->has('username'))
                                        <span class="errormsg">{{ $errors->first('username') }}</span>
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label " for="password">Password</span></label>

                                    <input id="password" class="form-control" name="password" placeholder="Kosongkan jika tidak ingin dirubah"
                                         type="password">

                                    @if ($errors->has('password'))
                                        <span class="errormsg">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                            </div>
                        </div> --}}
                        <div class="d-flex flex-row-reverse">
                            <div class="text-end">
                                <button class="btn btn-info p-2" type="submit">Simpan Perubahan</button>
                                <a class="btn btn-dark p-2" href="{{ url('/mitra') }}" role="button">Batal</a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
