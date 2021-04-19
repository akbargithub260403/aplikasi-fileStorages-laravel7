@extends('templates/index')

@section('judul','Halaman My Post')

@section('content')
<div class="container-fluid">
<div class="block-header">

<div class="container-fluid">
            <div class="block-header">
                <h2>POSTINGAN</h2>
            </div>
@foreach ($data as $dt)
            <!-- Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{$dt->pembuat}}
                                <small>{{$dt->keterangan}}</small>
                            </h2>
                        </div>
                        <div class="body">
                            <a href="{{ Route('showPost',$dt->id)}}" class="btn bg-pink waves-effect m-b-15">
                                LINK TO POST
                            </a>
                        </div>
                    </div>
@endforeach
                </div>
            </div>
        </div>

</div>
</div>

@endsection