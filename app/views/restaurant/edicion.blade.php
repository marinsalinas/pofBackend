@extends('layouts.edit')

@section('ocho')
<div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Edicion de restaurante : {{$restaurant->name}}
                    <div class="pull-right">
                    {{ Form::open(array('route' => array('restaurant.destroy', $restaurant->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Restaurante</button>
                    {{ Form::close() }}
                    </div>
            </div>
                <!-- /.panel-heading -->
                        <div class="panel-body">
                                {{ Form::open(array('route' => array('restaurant.update', $restaurant->id), 'method' => 'put')) }}
                                <div class="form-group">
                                    {{Form::input('text','name', $restaurant->name ,array('id'=>'restName','class'=>'form-control'))}}
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
                                {{Form::input('hidden','latitude', $restaurant->location->latitude,array('id'=>'rest-lat','class'=>'form-control'))}}
                                {{$errors->first('latitude')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('hidden','longitude', $restaurant->location->longitude,array('id'=>'rest-lng','class'=>'form-control'))}}
                                 {{$errors->first('longitude')}}
                                 </div>
                                 <div class="form-group">
                                     <div id="map-canvas" style="width: 100%; height: 250px;"></div>
                                 </div>

                                <div class="form-group">
                                    {{Form::submit('Cambiar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                                </div>
                                    {{Form::close()}}
                        </div>

                <!-- /.panel-body -->
          </div>
    </div>

@stop