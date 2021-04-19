@extends('templates/index')

@section('judul','Halaman Show Post')

@section('content')
<div class="container-fluid">
<div class="block-header">

 <!-- Multiple Items To Be Open -->
 @foreach ($data as $dt)
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                @foreach ($post as $p)
                                    {{$p->name}}
                                @endforeach
                                <small>{{$dt->judul}}</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_19">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                                                        <i class="material-icons">perm_contact_calendar</i>Keterangan Postingan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                                                <div class="panel-body">
                                                    {{$dt->keterangan}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-cyan">
                                            <div class="panel-heading" role="tab" id="headingTwo_19">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="false" aria-controls="collapseTwo_19">
                                                        <i class="material-icons">cloud_download</i> Files Postingan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19">
                                                <div class="panel-body">
                                                <?php $path = url('files/'.$dt->file)?>
                                                <b><a href="{{ url($path) }}" style="margin-left:20px; color:white;">{{$dt->file}}</a></b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-teal">
                                            <div class="panel-heading" role="tab" id="headingThree_19">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="false" aria-controls="collapseThree_19">
                                                        <i class="material-icons">contact_phone</i> 
                                                        Contact Postingan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_19">
                                                <div class="panel-body">
                                                @foreach ($post as $p)
                                                    {{$p->email}}
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-orange">
                                            <div class="panel-heading" role="tab" id="headingFour_19">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="false" aria-controls="collapseFour_19">
                                                        <i class="material-icons">folder_shared</i> Notice Postingan
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour_19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_19">
                                                <div class="panel-body">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Multiple Items To Be Open -->
 @endforeach

</div>
</div>

@endsection