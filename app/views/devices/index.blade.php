@extends('layouts.theme')

@section('doce')
    <div class="col-lg-12">
        <h1 class="page-header">Devices</h1>
    </div>
@stop

@section('ocho')

                <div class="col-lg-8">

                    <!-- /.panel -->
                </div>

@stop

@section('cuatro')
                <div class="col-lg-4">

    <h1 style="text-align: center">Dispositivos</h1>
      @foreach($devices as $device)
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i> {{ link_to ("users/{$device->username}/edit", $device->username)}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>{{$device->imei}}</li>
                    <li>{{$device->name}}</li>
                    <li>{{$device->phone}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>

      @endforeach
      </div>
@stop
