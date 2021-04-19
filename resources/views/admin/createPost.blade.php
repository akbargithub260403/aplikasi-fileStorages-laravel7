@extends('templates/index')

@section('judul','Halaman Create Post')

@section('content')

<div class="container-fluid">
<div class="block-header">

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Create Post Application 
                            </h2>
                        </div>
                        @if (session('status'))
                                <div class="alert alert-success my-3">
                                    {{ session('status') }}
                                </div>
                        @endif
                        <div class="body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('inputPost') }}">
                            @csrf
                            <input type="hidden" name="id_admin" value="{{Auth::user()->id}}">
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Judul Postingan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="text" id="email_address_2" autocomplete="off" class="form-control @error('judul') is-invalid @enderror" name="judul">
                                    @error('judul')
                                        <div class="alert alert-warning invalid-feedback">
                                            <strong>Kesalahan!</strong> {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Prodi</label>
                            </div>
                            <div class="col-md-3">
                            <select name="prodi" id="" class="form-control @error('prodi') is-invalid @enderror">
                                <option value="BimbinganKonseling">BimbinganKonseling</option>
                                <option value="AdministrasiPendidikan">AdministrasiPendidikan</option>
                                <option value="PendidikanLuarSekolah">PendidikanLuarSekolah</option>
                                <option value="PendidikanLuarBiasa">PendidikanLuarBiasa</option>
                                <option value="TeknologiPendidikan">TeknologiPendidikan</option>
                                <option value="PGSDBumiSiliwangi">PGSDBumiSiliwangi</option>
                                <option value="PGPAUDBumiSiliwangi">PGPAUDBumiSiliwangi</option>
                                <option value="Psikologi">Psikologi</option>
                                <option value="PerpustakaanDanInformasi">PerpustakaanDanInformasi</option>
                            </select>
                                    @error('role')
                                        <div class="alert alert-warning invalid-feedback">
                                            <strong>Kesalahan!</strong> {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            </div>
                            <br><br>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Pembuat Postingan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="text" autocomplete="off" class="form-control @error('pembuat') is-invalid @enderror" name="pembuat">
                                    @error('pembuat')
                                        <div class="alert alert-warning invalid-feedback">
                                            <strong>Kesalahan!</strong> {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            </div>
                            </div>
                            </div>

                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email_address_2">Keterangan Postingan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <textarea rows="3" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" required></textarea>
                            </div>
                            </div>
                            </div>
                            </div>
                                    @error('keterangan')
                                    <div class="alert alert-warning invalid-feedback">
                                        <strong>Kesalahan!</strong> {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="password_2">File Post</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="file" name="file" autocomplete="off" id="password_2" class="form-control @error('file') is-invalid @enderror" >
                                    @error('file')
                                    <div class="alert alert-warning invalid-feedback">
                                        <strong>Kesalahan!</strong> {{ $message }}
                                    </div>
                                    @enderror
                            </div>
                            </div>
                            </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

<div>
</div>

@endsection