@extends('layouts.login')
@section('login')


{{Form::open(['url' => 'store','class'=>'form-signin'])}}
        <h2 class="form-signin-heading">Acceso al sitio</h2>
        <label for="inputEmail" class="sr-only">Email address</label>

{{Form::text('username', null,array('class'=>'form-control','placeholder'=>'Username','id'=>'inputEmail'))}}
        <label for="inputPassword" class="sr-only">Password</label>

{{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','id'=>"inputPassword"))}}

{{Form::submit('Acceder',array('class'=>'btn btn-lg btn-primary btn-block'))}}

{{Form::close()}}
@stop