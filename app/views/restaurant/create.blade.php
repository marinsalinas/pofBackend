
@extends('layouts.slash')

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alta de restaurante</h3>
                    </div>
                        <div class="panel-body">
                            {{Form::open(['route'=> 'restaurant.store'])}}
                                <div class="form-group">
                                    {{Form::input('text','name', null,array('class'=>'form-control','placeholder'=>'Nombre del Restaurante'))}}
                                    {{$errors->first('name')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','textaddress', null,array('class'=>'form-control','placeholder'=>'Ingrese la Direccion'))}}
                                    {{$errors->first('textaddress')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('onlycash','Solo acepta efectivo ? : ')}}
                                    {{Form::select('onlycash', array('No','Si'));}}
                                    {{$errors->first('onlycash')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','type', null,array('class'=>'form-control','placeholder'=>'Ingrese Tipo del Restaurante'))}}
                                    {{$errors->first('type')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','description', null,array('class'=>'form-control','placeholder'=>'Descripcion'))}}
                                    {{$errors->first('type')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('text','description', null,array('id'=>'rest-lat','class'=>'form-control','placeholder'=>'Latitud', 'disabled'=>'true'))}}
                                                                    {{$errors->first('type')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('text','description', null,array('id'=>'rest-lng','class'=>'form-control','placeholder'=>'Longitud', 'disabled'=>'true'))}}
                                                                    {{$errors->first('type')}}
                                 </div>
                                 <div class="form-group">
                                     <div id="map-canvas" style="width: 100%; height: 250px; background: #000000"></div>
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