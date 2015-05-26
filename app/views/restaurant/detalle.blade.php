@extends('layouts.show')
<i hidden>{{$comidas = Menu::all()}}</i>

@section('edit')
  <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Comidas</h3>
                <div class="row mt">

@foreach($comidas as $comida)
@if($comida->restaurant_id==$restaurant->id)
<div class="col-lg-12">
        <div class="form-panel">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Comida
            </div>
                <!-- /.panel-heading -->
                        <div class="panel-body">
                            <ul>
                                <li>Comida: {{$comida->product}}</li>
                                <li>Precio: {{$comida->price}}</li>
                                <li>Descripcion: {{$comida->description}}</li>
                            </ul>
                        </div>

                <!-- /.panel-body -->
          </div>
    </div>
@endif
@endforeach</div></section></section>

@stop

  @section('seccion')
   <li class="mt">
                        <a  href="../../dashboard">
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
                                         <a class="active" href="../../restaurant" >
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
