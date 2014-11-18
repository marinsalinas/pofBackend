@extends('layouts.theme')

@section('doce')
    <div class="col-lg-12">
        <h1 class="page-header">Comidas</h1>
    </div>
@stop

@section('ocho')

                <div class="col-lg-8">
{{--<h1 style="text-align: center">Menus</h1>--}}
      @foreach($menus as $menu)
        <div class="panel panel-default">
                            <li hidden><{{$restaurant = Restaurant::whereId($menu->restaurant_id)->first()}}</li>
            <div class="panel-heading">
              <i class="fa fa-users"></i> {{ link_to ("menu/{$menu->product}/edit", $menu->product)}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>Restaurante: {{$restaurant->name}}</li>
                    <li>Comida: {{$menu->product}}</li>
                    <li>Precio: {{$menu->price}}</li>
                    <li>Descripcion: {{$menu->description}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>

      @endforeach
                    <!-- /.panel -->
                </div>

@stop

@section('cuatro')
                <div class="col-lg-4">

      </div>
@stop
