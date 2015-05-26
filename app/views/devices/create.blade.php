
@extends('layouts.show')

@section('edit')
 <section id="main-content">
          <section class="wrapper">

              <div class="row">
        <div class="col-lg-12">
            <div class="form-panel">
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
         </section></section>
  @stop

 @section('seccion')
  <li class="mt">
                       <a href="../dashboard">
                           <i class="fa fa-dashboard"></i>
                           <span>Dashboard</span>
                       </a>
                   </li>

                  <li class="sub-menu">
                                       <a href=../"menu" >
                                            <i class="fa fa fa-cutlery"></i>
                                            <span>Comidas</span>
                                        </a>
                                         <ul class="sub">
                                         <li><a  href="../menu">Todas las comidas</a></li>
                                         <li><a  href="../menu/create">Alta de comidas</a></li>
                                         </ul>

                                    </li>
                                    <li class="sub-menu">
                                        <a href="../restaurant" >
                                            <i class="fa fa-coffee"></i>
                                            <span>Restaurantes</span></a>
                                         <ul class="sub">
                                         <li><a  href="../restaurant">Todos los restautantes</a></li>
                                         <li><a  href="../restaurant/create">Alta de restaurantes</a></li>
                                         </ul>

                                    </li>
                                    <li class="sub-menu">
                                        <a href="../devices" >
                                            <i class="fa fa-cog"></i>
                                            <span>Dispositivos</span></a>
                                             <ul class="sub">
                                         <li><a  href="../devices">Todos los dispositivos</a></li>
                                         <li><a  href="../devices/create">Alta de dispositivos</a></li>
                                         </ul>

                                    </li>
                                    <li class="sub-menu">
                                        <a href="../orders" >
                                            <i class="fa fa-map-marker"></i>
                                            <span>Pedidos</span>
                                        </a>
                                    </li>

 @stop



