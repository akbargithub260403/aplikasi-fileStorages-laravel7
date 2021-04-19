@extends('templates/index')

@section('judul','Halaman Profile')

@section('content')

<div class="container-fluid">
    <div class="block-header">

    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Admin Application 
                            </h2>
                        </div>
                            @if (session('status'))
                                <div class="alert alert-success my-3">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <div class="body">
                            <form class="form-horizontal" action="/admin/{{$admin->id}}" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama</label>
                                    </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="text" id="email_address_2" autocomplete="off" class="form-control @error('name') is-invalid @enderror" value="{{$admin->name}}" name="name">
                            @error('name')
                                <div class="alert alert-warning invalid-feedback">
                                    <strong>Kesalahan!</strong> {{ $message }}
                                </div>
                            @enderror
                            </div>
                            </div>
                            </div>
                            <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Role</label>
                                    </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="text" id="email_address_2" autocomplete="off" class="form-control @error('role') is-invalid @enderror" value="{{$admin->role}}" name="role">
                            @error('role')
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
                                        <label for="email_address_2">Email Address</label>
                                    </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="email" id="email_address_2" autocomplete="off" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$admin->email}}">
                            @error('email')
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
                                        <label for="password_2">Jabatan</label>
                                    </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="text" name="jabatan" autocomplete="off" id="password_2" class="form-control @error('jabatan') is-invalid @enderror" value="{{$admin->jabatan}}">
                            @error('jabatan')
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
                                        <label for="password_2">Avatar</label>
                                    </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                            <div class="form-line">
                            <input type="file" name="avatar" autocomplete="off" id="password_2" value="{{$admin->avatar}}" class="form-control @error('avatar') is-invalid @enderror" >
                            @error('avatar')
                            <div class="alert alert-warning invalid-feedback">
                                <strong>Kesalahan!</strong> {{ $message }}
                            </div>
                              @enderror
                            </div>
                            </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection