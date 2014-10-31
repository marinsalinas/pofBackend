@extends('layouts.edit')

@section('ocho')
<div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Edicion de restaurante : {{$restaurant->name}}
            </div>
                <!-- /.panel-heading -->
                        <div class="panel-body">
                            {{Form::open(['route'=> 'restaurant.store'])}}
                                <div class="form-group">
                                    {{Form::input('text','name', $restaurant->name ,array('class'=>'form-control'))}}
                                    {{$errors->first('name')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','textaddress', $restaurant->textaddress ,array('class'=>'form-control'))}}
                                    {{$errors->first('textaddress')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('onlycash','Solo acepta efectivo ? : ')}}
                                    {{Form::select('onlycash', array('No','Si'),'No');}}
                                    {{$errors->first('onlycash')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','type', $restaurant->type,array('class'=>'form-control'))}}
                                    {{$errors->first('type')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','description', $restaurant->description,array('class'=>'form-control'))}}
                                    {{$errors->first('description')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('text','latitude', null,array('id'=>'rest-lat','class'=>'form-control','placeholder'=>'Latitud', 'disabled'=>'true'))}}
                                {{$errors->first('latitude')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('text','longitude', null,array('id'=>'rest-lng','class'=>'form-control','placeholder'=>'Longitud', 'disabled'=>'true'))}}
                                 {{$errors->first('longitude')}}
                                 </div>
                                 <div class="form-group">
                                     <div id="map-canvas" style="width: 100%; height: 250px; background: #000000"></div>
                                 </div>

                                <div class="form-group">
                                    {{Form::submit('Grabar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                                </div>
                                    {{Form::close()}}
                        </div>

                <!-- /.panel-body -->
          </div>
    </div>

@stop