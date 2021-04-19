<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Akun ".$judul.".xls");
?>

<h2>Data Akun {{$judul}}</h2>
        <table class="table table-hover table-dark" border="1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Tanggal Pembuatan Akun</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($data as $std)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$std->role}}</td>
                <td>{{$std->name}}</td>
                <td>{{$std->email}}</td>
                <td>{{$std->prodi}}</td>
                <td>{{$std->jabatan}}</td>
                <td>{{$std->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>