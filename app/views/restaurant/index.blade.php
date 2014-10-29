@extends('layouts.master')

@section('contenido')

<div style="text-align: right; position: relative">{{link_to('restaurant/create','Dar de alta un restaurante')}}</div>
<div style="text-align: left">{{link_to('logout','Logout')}}</div>

  <div><h1> Todos los Restaurantes</h1></div>
  <div style="width: 100%">
  @foreach($restaurants as $restaurant)

<ul>
    <li> {{ link_to ("restaurant/{$restaurant->name}", $restaurant->name)}}</li>
</ul>
  @endforeach
  </div>
  @stop
