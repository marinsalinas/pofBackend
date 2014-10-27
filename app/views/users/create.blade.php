
@extends('layouts.master')

@section('contenido')
<div style="text-align: left">{{link_to('users','Atras')}}</div>

<center>
<h1> Alta de usuario</h1>

    {{Form::open(['route'=> 'users.store'])}}


       <div> {{Form::label('username','Escribe el usuario:')}}
        {{Form::input('text','username')}}
        {{$errors->first('username')}}
</div><div>
        {{Form::label('password','Escribe la contrasenia:')}}
        {{Form::input('password','password')}}
                {{$errors->first('password')}}

</div>
  <div> {{Form::label('email','Escribe el correo:')}}
        {{Form::input('text','email')}}
        {{$errors->first('email')}}
</div>
<div> {{Form::label('phone','Escribe el telefono:')}}
        {{Form::input('text','phone')}}
        {{$errors->first('phone')}}
</div>
<div>
{{Form::submit('Grabar')}}
</div>

    {{Form::close()}}
</center>
  @stop

