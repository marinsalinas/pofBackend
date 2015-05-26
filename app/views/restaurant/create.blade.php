@extends('layouts.show')

@section('edit')
<section id="main-content">
          <section class="wrapper">

              <div class="row">

        <div class="col-lg-12">
                <div class="form-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Alta de restaurante</h3>
                    </div>
                        <div class="panel-body">
                            {{Form::open(['route'=> 'restaurant.store',  'files' => true])}}
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
                                    {{$errors->first('description')}}
                                </div>
                                <div class="form-group">

                                    {{ Form::label('photo', 'Logo') }}
                                    <!--así se crea un campo file en laravel-->
                                    {{ Form::file('photo') }}
                                    {{$errors->first('photo')}}
                                    </div>
                                <div class="form-group">
                                {{Form::input('hidden','latitude', null,array('id'=>'rest-lat','class'=>'form-control','placeholder'=>'Latitud'))}}
                                {{$errors->first('latitude')}}
                                </div>
                                <div class="form-group">
                                {{Form::input('hidden','longitude', null,array('id'=>'rest-lng','class'=>'form-control','placeholder'=>'Longitud'))}}
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
                                        <a class="active" href="../restaurant" >
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
