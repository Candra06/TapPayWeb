@extends('layout.master')
@section('content')
      <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Data Mitra</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Mitra</a></li>
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
                    <h4 class="card-title">Data Tautan</h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Usaha</th>
                                    <th>Telepon</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="">Nama Usaha</a></td>
                                    <td>Nama Usaha</td>
                                    <td>Nama Usaha</td>
                                    <td>Nama Usaha</td>
                                    <td>
                                        <a href="" class="btn btn-info"><span><i class="fa fa-pencil"></i></span></a>
                                        <a href="" class="btn btn-danger"><span><i class="fa fa-trash"></i></span></a>
                                    </td>
                                </tr>
                                {{-- @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $dt->kategori }}</td>
                                        <td><a href="{{ $dt->link }}"></a>{{ $dt->link }}</td>
                                        <td>{{ $dt->status }}</td>
                                        <td>
                                        <a href="{{url('tautan/'.$dt->id.'/edit')}}"><button class="btn btn-success"><i
                                                        class="fa fa-pencil"></i></button></a>
                                            <a href=""><button class="btn btn-danger"><i
                                                        class="fa fa-trash"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Tautan</h4>

                   <div class="row">
                       <div class="col-md-4">
                           <small class="text-muted">Nama Usaha</small>
                           <h6>Nama Usaha</h6>
                       </div>
                       <div class="col-md-4">
                        <small class="text-muted">Nama Usaha</small>
                        <h6>Nama Usaha</h6>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted">Nama Usaha</small>
                        <h6>Nama Usaha</h6>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
