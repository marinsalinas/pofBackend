
@extends('layouts.master')

@section('contenido')
<div style="text-align: left">{{link_to('restaurants','Atras')}}</div>

<center>
<h1> Alta de Restaurante</h1>

    {{Form::open(['route'=> 'restaurant.store'])}}


       <div> {{Form::label('name','Escribe el Nombre del restaurante:')}}
        {{Form::input('text','name')}}
        {{$errors->first('name')}}
</div><div>
        {{Form::label('textaddress','Direcciion')}}
        {{Form::input('text','textaddress')}}
                {{$errors->first('textaddress')}}

</div>
  <div> {{Form::label('onlycash','Si solo aceptara efectivo (0 o 1)')}}
        {{Form::input('text','onlycash')}}
        {{$errors->first('onlycash')}}
</div>
<div> {{Form::label('type','Tipo del Restaurant:')}}
        {{Form::input('text','type')}}
        {{$errors->first('type')}}
</div>
<div> {{Form::label('description','Escribe alguan descripcion:')}}
        {{Form::input('text','description')}}
        {{$errors->first('type')}}
</div>
<div>

{{Form::submit('Grabar')}}
</div>

    {{Form::close()}}
</center>
  @stop

