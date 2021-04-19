@extends('templates/index')

@section('judul','Halaman List Admin')

@section('content')
<div class="container-fluid">
<div class="block-header">

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Admin <i>Application Files Storages</i>
                            </h2>
                            <br>
                            <form action="{{ Route('search')}}" method="POST">
                            @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="keyword" autocomplete="off" placeholder="Search Engine">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if (session('status'))
                                <div class="alert alert-success my-3">
                                    {{ session('status') }}
                                </div>
                        @endif
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role</th>
                                        <th>NAMA</th>
                                        <th>EMAIL</th>
                                        <th>CREATED AT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($admin as $as)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$as->role}}</td>
                                        <td><a href="/profile/{{$as->id}}">{{$as->name}}</a></td>
                                        <td>{{$as->email}}</td>
                                        <td>{{$as->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</div>
</div>

@endsection