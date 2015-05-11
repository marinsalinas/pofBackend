@extends('layouts.login')
@section('login')


{{Form::open(['url' => 'store','class'=>'form-login'])}}
		        <h2 class="form-login-heading">
		        <img src="img/poffull2.png" style="max-width:20%;
                                                            max-height:100%; position: relative; margin-bottom: 10px;"></br>
Accede al sitio
		        </h2>

		        <div class="login-wrap">
{{Form::text('username', null,array('class'=>'form-control','placeholder'=>'Username','id'=>'inputEmail'))}}
		            <br>
{{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','id'=>"inputPassword"))}}
<br>
{{Form::submit('Acceder',array('class'=>'btn btn-theme btn-block'))}}
</div>

{{Form::close()}}
@stop