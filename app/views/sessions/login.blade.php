@extends('layouts.login')
@section('login')


{{Form::open(['url' => 'store'])}}
<div style="text-align: center">
                                <div class="form-group">

{{Form::text('username', null,array('class'=>'form-control','placeholder'=>'Username'))}}

</div></br>
                                <div class="form-group">
{{Form::password('password',null,array('class'=>'form-control','placeholder'=>'Password'))}}
</div></br>
                                <div class="form-group">

{{Form::submit('Acceder',array('class'=>'btn btn-lg btn-success btn-block'))}}

</div>
</div>
{{Form::close()}}
@stop