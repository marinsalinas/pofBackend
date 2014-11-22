
@extends('layouts.slash')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Alta de Comidas</h3>
                </div>
                    <div class="panel-body">
                        {{Form::open(['route'=> 'menu.store', 'files'=>true])}}
                            <div class="form-group">
                                Restaurante <select name="restaurant_id">
                                @foreach($restaurants as $restaurant)
                                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                                </select>
                                {{$errors->first('restaurant_id')}}
                            </div>
                            <div class="form-group">
                                Comida <select name="food_id">
                                    @foreach($foods as $food)
                                                <option value="{{$food->id}}">
                                                {{$food->food_name}}
                                                </option>
                                    @endforeach
                                            </select>
                                {{$errors->first('food_id')}}
                            </div>
                                <div class="form-group">
                                    {{Form::input('text','product', null,array('class'=>'form-control','placeholder'=>'Ingrese el Nombre de la comida'))}}
                                    {{$errors->first('product')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('number','price', null,array('class'=>'form-control','placeholder'=>'Ingrese el precio'))}}
                                    {{$errors->first('price')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','description', null,array('class'=>'form-control','placeholder'=>'Descripcion de la dispositivo'))}}
                                    {{$errors->first('description')}}
                                </div>
                                 <div class="form-group">
                                {{ Form::label('photo', 'Logo') }}
                                <!--así se crea un campo file en laravel-->
                                {{ Form::file('photo') }}
                                {{$errors->first('photo')}}
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

