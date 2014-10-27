@extends('layouts.master')
@section('contenido')


{{Form::open(['url' => 'store'])}}
<div style="text-align: center">
<div>

{{Form::label('username','Usuario')}}
{{Form::text('username')}}

</div></br>
<div>
{{Form::label('password','Password')}}
{{Form::password('password')}}
</div></br>
<div>

{{Form::submit('Acceder')}}

</div>
</div>

{{Form::close()}}
@stop