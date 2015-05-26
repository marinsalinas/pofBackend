@extends('layouts.dash')

@section('members')
     <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Comidas</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                             @foreach($menus as $menu)
                                    <div class="form-panel">
                                                        <li hidden><{{$restaurant = Restaurant::whereId($menu->restaurant_id)->first()}}</li>
                                        <div class="panel-heading">
                                          <i class="fa fa-users"></i> {{ link_to ("menu/{$menu->product}/edit", $menu->product)}}
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <ul>
                                                <li>Restaurante: {{$restaurant->name}}</li>
                                                <li>Comida: {{$menu->product}}</li>
                                                <li>Precio: {{$menu->price}}</li>
                                                <li>Descripcion: {{$menu->description}}</li>
                                            </ul>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                             @endforeach
                </div><!-- col-lg-12-->
            </div><!-- /row -->
        </section>
    </section>
@stop

@section('seccion')
 <li class="mt">
                      <a class="active" href="dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                 <li class="sub-menu">
                                      <a href="menu" >
                                           <i class="fa fa fa-cutlery"></i>
                                           <span>Comidas</span>
                                       </a>
                                        <ul class="sub">
                                        <li><a  href="menu">Todas las comidas</a></li>
                                        <li><a  href="menu/create">Alta de comidas</a></li>
                                        </ul>

                                   </li>
                                   <li class="sub-menu">
                                       <a href="restaurant" >
                                           <i class="fa fa-coffee"></i>
                                           <span>Restaurantes</span></a>
                                        <ul class="sub">
                                        <li><a  href="restaurant">Todos los restautantes</a></li>
                                        <li><a  href="restaurant/create">Alta de restaurantes</a></li>
                                        </ul>

                                   </li>
                                   <li class="sub-menu">
                                       <a href="devices" >
                                           <i class="fa fa-cog"></i>
                                           <span>Dispositivos</span></a>
                                            <ul class="sub">
                                        <li><a  href="devices">Todos los dispositivos</a></li>
                                        <li><a  href="devices/create">Alta de dispositivos</a></li>
                                        </ul>

                                   </li>
                                   <li class="sub-menu">
                                       <a href="orders" >
                                           <i class="fa fa-map-marker"></i>
                                           <span>Pedidos</span>
                                       </a>
                                   </li>

@stop

