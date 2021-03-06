@extends('layouts.theme')

@section('doce')
    <div class="col-lg-12">
        <h1 class="page-header">Administracion</h1>
    </div>
@stop

@section('ocho')

@stop

@section('cuatro')

                <div class="col-lg-8">

    <h1 style="text-align: center">Admins</h1>
      @foreach($admins as $admin)
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i> {{ link_to ("admins/{$admin->username}/edit", $admin->username)}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>{{$admin->email}}</li>
                    <li>{{$admin->fullname}}</li>
                    <li>{{$admin->phone}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>

      @endforeach
      </div>


                <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">


                {{link_to ("dashboard", "Nuevo DASHBOARD...!!!!!")}}
            <!-- /.panel-body -->
        </div>

                    <!-- /.panel -->
                </div>

@stop
