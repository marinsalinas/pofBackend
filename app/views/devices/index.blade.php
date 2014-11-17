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
                                  <li hidden><{{$restaurant = Restaurant::whereId($device->restaurant_id)->first()}}</li>
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-eye"></i> {{ link_to ("devices/{$device->name}/edit", $device->name)}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>Restaurante: {{$restaurant->name}}</li>
                    <li>IMEI: {{$device->imei}}</li>
                    <li>Nombre: {{$device->name}}</li>
                    <li>Telefono: {{$device->phone}}</li>
                    <li>Descripcion: {{$device->description}}</li>
                    <li>Estado: {{$device->status}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>

      @endforeach
      </div>
@stop
