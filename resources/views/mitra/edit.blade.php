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
                    <form action="{{url('/mitra/update',[$mitra->id])}}" method="post">
                        @method('put')
                        {{csrf_field()}}
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_usaha">Nama Usaha</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="nama_usaha" class="form-control col-md-12 col-xs-12" name="nama_usaha" placeholder="Nama Usaha" required="required" type="text" value="{{old('nama_usaha',$mitra->nama_usaha)}}">
                        
                                @if ($errors->has('nama_usaha'))
                                   <span class="errormsg">{{ $errors->first('nama_usaha') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Username</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="username" class="form-control col-md-12 col-xs-12" name="username" placeholder="Username" required="required" type="text" value="{{old('username',$mitra->username)}}">
                        
                                @if ($errors->has('username'))
                                   <span class="errormsg">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telepon">Telepon</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="telepon" class="form-control col-md-12 col-xs-12" name="telepon" placeholder="Telepon" required="required" type="text" value="{{old('telepon',$mitra->telepon)}}">
                        
                                @if ($errors->has('telepon'))
                                   <span class="errormsg">{{ $errors->first('telepon') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status</span></label>
                            <div class="form-check col-md-6 col-sm-6 col-xs-12">
                                <select name="status" class="form-control">
                                    <option value="">Status Mitra</option>
                                    <option value="Aktif" {{ $mitra->status  == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Banned" {{ $mitra->status  == 'Banned' ? 'selected' : '' }}>Banned </option>
                                    <option value="Suspend" {{ $mitra->status  == 'Suspend' ? 'selected' : '' }}>Suspend </option>
                                </select>   

                                @if ($errors->has('status'))
                                   <span class="errormsg">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="alamat" class="form-control col-md-12 col-xs-12" name="alamat" placeholder="Alamat" required="required" type="text" value="{{old('alamat',$mitra->alamat)}}">
                        
                                @if ($errors->has('alamat'))
                                   <span class="errormsg">{{ $errors->first('alamat') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="info">Info</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="info" class="form-control col-md-12 col-xs-12" name="info" placeholder="Info" required="required" type="text" value="{{old('info',$mitra->info)}}">
                        
                                @if ($errors->has('info'))
                                   <span class="errormsg">{{ $errors->first('info') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="submit" name="submit" value='Submit' class='btn btn-success'>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
