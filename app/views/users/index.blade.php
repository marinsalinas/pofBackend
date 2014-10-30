@extends('layouts.theme')

@section('contenido')
  <h1> Todos los Usuarios</h1>
  @foreach($users as $user)

<ul>
    <li> {{ link_to ("users/{$user->username}", $user->username)}}</li>
</ul>
  @endforeach
  @stop
