@extends('layouts.edit')

@section('edit')
  <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Comidas</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                            <div class="form-panel">
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
                                                    <div class="form-group">
                                                        <img style="width: 80px; margin: 0 auto;" src="../../uploads/{{$restaurant->image_url}}" />
                                                    </div>
                                                    {{ Form::open(array('route' => array('restaurant.update', $restaurant->id), 'method' => 'put', 'files'=>true)) }}
                                                    <div class="form-group">
                                                        {{Form::input('text','name', $restaurant->name ,array('id'=>'restName','class'=>'form-control'))}}
                                                        {{$errors->first('name')}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::input('text','textaddress', $restaurant->textaddress ,array('class'=>'form-control'))}}
                                                        {{$errors->first('textaddress')}}
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="onlycash">
                                                            <option value="No" @if($restaurant->onlycash=='No')selected=yes @endif>No</option>
                                                            <option value="Si"@if($restaurant->onlycash=='Si')selected=yes @endif>Si</option>
                                                        </select>
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

                                                                                        {{ Form::label('photo', 'Logo') }}
                                                                                        <!--así se crea un campo file en laravel-->
                                                                                        {{ Form::file('photo') }}
                                                                                        {{$errors->first('photo')}}
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
         </div><!-- /row -->
        </section>
    </section>
@stop


  @section('seccion')
   <li class="mt">
                        <a class="active" href="../../dashboard">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                   <li class="sub-menu">
                                        <a href=../../"menu" >
                                             <i class="fa fa fa-cutlery"></i>
                                             <span>Comidas</span>
                                         </a>
                                          <ul class="sub">
                                          <li><a  href="../../menu">Todas las comidas</a></li>
                                          <li><a  href="../../menu/create">Alta de comidas</a></li>
                                          </ul>

                                     </li>
                                     <li class="sub-menu">
                                         <a  class="active" href="../../restaurant" >
                                             <i class="fa fa-coffee"></i>
                                             <span>Restaurantes</span></a>
                                          <ul class="sub">
                                          <li><a  href="../../restaurant">Todos los restautantes</a></li>
                                          <li><a  href="../../restaurant/create">Alta de restaurantes</a></li>
                                          </ul>

                                     </li>
                                     <li class="sub-menu">
                                         <a href="../../devices" >
                                             <i class="fa fa-cog"></i>
                                             <span>Dispositivos</span></a>
                                              <ul class="sub">
                                          <li><a  href="../../devices">Todos los dispositivos</a></li>
                                          <li><a  href="../../devices/create">Alta de dispositivos</a></li>
                                          </ul>

                                     </li>
                                     <li class="sub-menu">
                                         <a href="../../orders" >
                                             <i class="fa fa-map-marker"></i>
                                             <span>Pedidos</span>
                                         </a>
                                     </li>

  @stop
