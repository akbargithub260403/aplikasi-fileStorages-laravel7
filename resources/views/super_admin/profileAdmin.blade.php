@extends('templates/index')

@section('judul','Halaman Profile')

@section('content')

<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                           <div class="image-area">
                                <img src="{{ $admin->getAvatar()}}" height="150" widht="150" alt="AdminBSB - Profile Image"/>
                                @foreach ($data as $dt)
                            </div>
                            <div class="content-area">
                                <h3>{{ $dt->name }}</h3>
                                <p>{{$dt->jabatan}}</p>
                                <p>{{$dt->role}}</p>
                            </div>
                        </div>

                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">email</i>
                                    Email
                                </div>
                                <div class="content">
                                    {{$dt->email}}
                                </div>
                            </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Fakultas
                                    </div>
                                    <div class="content">
                                       Fakultas Ilmu Pendidikan , Universitas Pendidikan Indonesia
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Prodi
                                    </div>
                                    <div class="content">
                                        Teknologi Pendidikan
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">class</i>
                                        Fakultas
                                    </div>
                                    <div class="content">
                                        Teknologi Pendidikan
                                    </div>
                                </li>
                                @if (auth()->user()->role == 'super_admin')
                                <li>
                                    <div class="title"></div>
                                    <div class="content">
                                    <a href="/admin/{{$dt->id}}/update" class="btn btn-warning">Update</a><br><br>
                                    <form action="/admin/{{$dt->id}}/delete" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                </ul>
                                @if (session('status'))
                                    <div class="alert alert-success my-3">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                @foreach($post as $p)
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                        <div class="media">
                                        <div class="media-left">
                                        <a href="#">
                                            <img src="{{ $admin->getAvatar()}}" />
                                        </a>
                                        </div>
                                        <div class="media-body">
                                        <h4 class="media-heading">
                                        <a href="#">{{ $p->judul }}</a>
                                        </h4>
                                        Shared Postingan - {{ $p->created_at }}
                                        </div>
                                        </div>
                                        </div>
                                        <div class="panel-body">
                                        <div class="post">
                                            <div class="post-heading">
                                            <p>{{$p->keterangan}}</p>
                                            <i><b><small>{{$p->prodi}}</small></b></i>
                                            </div>
                                            <div class="post-content">
                                                <?php $path = url('files/'.$p->file)?>
                                                <a href="{{ url($path) }}" style="margin-left:20px;">{{$p->file}}</a>
                                            </div>
                                            <form action="{{Route('hapusPost',$p->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                                <button class="btn btn-danger pull-right">delete</button>
                                            </form>
                                                <a href="/{{$p->id}}/update/post" class="btn btn-warning pull-right">Update</a>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


@endsection