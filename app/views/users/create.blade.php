
@extends('layouts.slash')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Alta de usuario</h3>
                </div>
                    <div class="panel-body">
                        {{Form::open(['route'=> 'users.store'])}}
                            <div class="form-group">
                                {{Form::input('text','username', null,array('class'=>'form-control','placeholder'=>'Ingrese Username'))}}
                                {{$errors->first('username')}}
                            </div>
                                <div class="form-group">
                                    {{Form::input('password','password', null,array('class'=>'form-control','placeholder'=>'Ingrese el Password'))}}
                                    {{$errors->first('password')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','fullname', null,array('class'=>'form-control','placeholder'=>'Ingrese su Nombre completo'))}}
                                    {{$errors->first('fullname')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','email', null,array('class'=>'form-control','placeholder'=>'Ingrese su correo'))}}
                                    {{$errors->first('email')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','phone', null,array('class'=>'form-control','placeholder'=>'Ingrese el telefono'))}}
                                    {{$errors->first('phone')}}
                                </div>
                                <div class="form-group">
                                {{Form::submit('Grabar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                                </div>
                                {{Form::close()}}
                            </div>
                        </div>
                   </div>
              </div>
         </div>
  @stop

