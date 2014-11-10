@extends('layouts.show')
<i hidden>{{$comidas = Menu::all()}}</i>

@section('ocho')
@foreach($comidas as $comida)
@if($comida->restaurant_id==$restaurant->id)
<div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Comida
            </div>
                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul>
                                <li>Comida: {{$comida->product}}</li>
                                <li>Precio: {{$comida->price}}</li>
                                <li>Descripcion: {{$comida->description}}</li>
                            </ul>
                        </div>

                <!-- /.panel-body -->
          </div>
    </div>
@endif
@endforeach
@stop