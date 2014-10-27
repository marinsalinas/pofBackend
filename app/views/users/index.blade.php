@extends('layouts.master')

@section('contenido')

<div style="text-align: right; position: relative">{{link_to('users/create','Dar de alta un usuario')}}</div>
<div style="text-align: left">{{link_to('logout','Logout')}}</div>

  <h1> Todos los Usuarios</h1>
  @foreach($users as $user)

<ul>
    <li> {{ link_to ("users/{$user->username}", $user->username)}}</li>
</ul>
  @endforeach
  @stop
