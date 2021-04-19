@extends('templates/index')

@section('judul','Halaman Utama')

@section('content')
<div class="container-fluid">
<div class="block-header">

            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

    @if (auth()->user()->role == "super_admin"||"admin")
    <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">ALL ADMIN</div>
                            <div class="number count-to" data-from="0" data-to="{{$jumlahAdmin}}" data-speed="1000" data-fresh-interval="20">{{$jumlahAdmin}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">ALL SUPER ADMIN</div>
                            <div class="number count-to" data-from="0" data-to="{{$jumlahSuperAdmin}}" data-speed="1000" data-fresh-interval="20">{{$jumlahSuperAdmin}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">ALL STUDENTS</div>
                            <div class="number count-to" data-from="0" data-to="{{$jumlahSiswa}}" data-speed="1000" data-fresh-interval="20">{{$jumlahSiswa}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <div class="icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                        <div class="content">
                            <div class="text">ALL POSTINGAN</div>
                            <div class="number count-to" data-from="0" data-to="{{$jumlahPost}}" data-speed="1000" data-fresh-interval="20">{{$jumlahPost}}</div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row clearfix">
        <!-- Task Info -->
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                    @if (auth()->user()->role == 'super_admin')
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ Route('admin','admin')}}">Export Admin</a></li>
                                        <li><a href="{{ Route('admin','super_admin')}}">Export Super Admin</a></li>
                                        <li><a href="{{ Route('admin','students')}}">Export Students</a></li>
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($super_admin as $as)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$as->name}}</td>
                                            <?php
                                            if ($as->role == "admin") {
                                                ?>
                                                <td><span class="label bg-red">Admin</span></td>
                                                <?php
                                            }elseif ($as->role == "super_admin") {
                                                ?> 
                                                <td><span class="label bg-green">Super Admin</span></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td><span class="label bg-blue">Students</span></td>
                                                <?php
                                            }
                                                ?>
                                            <td>{{$as->jabatan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Task Info -->
                <div class="col col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card pull-left">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                    @if (auth()->user()->role == 'super_admin')
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ Route('admin','admin')}}">Export Admin</a></li>
                                        <li><a href="{{ Route('admin','super_admin')}}">Export Super Admin</a></li>
                                        <li><a href="{{ Route('admin','students')}}">Export Students</a></li>
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admin as $as)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$as->name}}</td>
                                            <?php
                                            if ($as->role == "admin") {
                                                ?>
                                                <td><span class="label bg-red">Admin</span></td>
                                                <?php
                                            }elseif ($as->role == "super_admin") {
                                                ?> 
                                                <td><span class="label bg-green">Super Admin</span></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td><span class="label bg-blue">Students</span></td>
                                                <?php
                                            }
                                                ?>
                                            <td>{{$as->jabatan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>TASK INFOS</h2>
                            <ul class="header-dropdown m-r--5">
                                    @if (auth()->user()->role == 'super_admin')
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{ Route('admin','admin')}}">Export Admin</a></li>
                                        <li><a href="{{ Route('admin','super_admin')}}">Export Super Admin</a></li>
                                        <li><a href="{{ Route('admin','students')}}">Export Students</a></li>
                                    </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Jabatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $as)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$as->name}}</td>
                                            <?php
                                            if ($as->role == "admin") {
                                                ?>
                                                <td><span class="label bg-red">Admin</span></td>
                                                <?php
                                            }elseif ($as->role == "super_admin") {
                                                ?> 
                                                <td><span class="label bg-green">Super Admin</span></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td><span class="label bg-blue">Students</span></td>
                                                <?php
                                            }
                                                ?>
                                            <td>{{$as->jabatan}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
    @endif 
       
</div>
</div>
@endsection
