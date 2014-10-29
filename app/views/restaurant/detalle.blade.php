@extends('layouts.master')

@section('contenido')
<div style="text-align: left">{{link_to('restaurant','Atras')}}</div>
<center>
        <h1> Detalle del Restaurante {{$restaurant->name}}</h1>
        <h2>El id es : {{$restaurant->id}}</h2>
        <h2>EL nombre es :{{$restaurant->name}}</h2>
        <h2>La direccion es : {{ $restaurant->textaddress}}</h2>
        <h2>Tipo de cambio :{{$restaurant->onlycash}}</h2>
        <h2>Tipo de Restaurante : {{$restaurant->type}}</h2>
        <h2>Descripcion : {{$restaurant->description}}</h2>
</center>
  @stop
