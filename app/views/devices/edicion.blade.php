@extends('layouts.edit')

@section('ocho')

    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">

            <li hidden>{{$restaurants = Restaurant::all()}}</li>

                <i class="fa fa-user"></i> Edicion de Dispositivo : {{$device->name}}
                    <div class="pull-right">
                    {{ Form::open(array('route' => array('devices.destroy', $device->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Dispositivo</button>
                    {{ Form::close() }}
                    </div>
            </div>
                <!-- /.panel-heading -->
                    <div class="panel-body">
                                {{ Form::open(array('route' => array('devices.update', $device->id), 'method' => 'put')) }}
                            <div class="form-group">
                                Restaurante <select name="restaurant_id">
                                    @foreach($restaurants as $restaurant)
                                                <option value="{{$restaurant->id}}" @if($restaurant->id==$device->restaurant_id) selected=yes @endif>
                                                {{$restaurant->name}}
                                                </option>
                                    @endforeach
                                            </select>
                                {{$errors->first('restaurant_id')}}
                            </div>
                                <div class="form-group">
                                    {{Form::label('imei','IMEI: ')}}
                                    {{Form::input('text','imei', $device->imei,array('class'=>'form-control'))}}
                                    {{$errors->first('imei')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('name','Nombre del dispositivo: ')}}
                                    {{Form::input('text','name', $device->name,array('class'=>'form-control'))}}
                                    {{$errors->first('name')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('phone','Telefono: ')}}
                                    {{Form::input('text','phone', $device->phone,array('class'=>'form-control'))}}
                                    {{$errors->first('phone')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('description','Descripcion: ')}}
                                    {{Form::input('text','description', $device->description,array('class'=>'form-control'))}}
                                    {{$errors->first('description')}}
                                </div>
                               <div class="form-group">
                                <select name="status">
                                    <option value="Inactivo" @if($device->status=='Inactivo')selected=yes @endif>Inactico</option>
                                    <option value="Activo" @if($device->status=='Activo')selected=yes @endif>Activo</option>
                                </select>
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
