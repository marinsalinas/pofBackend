@extends('layouts.master')

@section('contenido')
<div style="text-align: left">{{link_to('users','Atras')}}</div>

<center>
<h3>{{link_to("users")}}</h3>
<h1> Detalle del usuario {{$user->username}}</h1>
<h2>El id es {{$user->id}}:</h2>
</center>
  @stop
