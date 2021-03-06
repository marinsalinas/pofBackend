
@extends('layouts.show')

@section('edit')
 <section id="main-content">
          <section class="wrapper">
              <div class="row">
        <div class="col-lg-12">
            <div class="form-panel">
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
        </section>
 </section>
  @stop

 @section('seccion')
  <li class="mt">
                       <a  href="../dashboard">
                           <i class="fa fa-dashboard"></i>
                           <span>Dashboard</span>
                       </a>
                   </li>

                  <li class="sub-menu">
                                       <a class="active" href=../"menu" >
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

