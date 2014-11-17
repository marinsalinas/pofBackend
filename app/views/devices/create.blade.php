
@extends('layouts.slash')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Alta de Dispositivo</h3>
                </div>
                    <div class="panel-body">
                        {{Form::open(['route'=> 'devices.store'])}}
                            <div class="form-group">
                                Restaurante <select name="restaurant_id">
                                @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                                </select>
                                {{$errors->first('restaurant_id')}}
                            </div>
                                <div class="form-group">
                                    {{Form::input('text','imei', null,array('class'=>'form-control','placeholder'=>'Ingrese el IMEI del dispositivo'))}}
                                    {{$errors->first('imei')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','name', null,array('class'=>'form-control','placeholder'=>'Ingrese el nombre del dispositivo'))}}
                                    {{$errors->first('name')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','phone', null,array('class'=>'form-control','placeholder'=>'Telefono del dispositivo'))}}
                                    {{$errors->first('phone')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','description', null,array('class'=>'form-control','placeholder'=>'Descripcion del dispositivo'))}}
                                    {{$errors->first('description')}}
                                </div>
                                <div class="form-group">
                                    {{Form::select('status', array('Inactivo' => 'Inactivo', 'Activo' => 'Activo'))}}
                                    {{$errors->first('status')}}
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

