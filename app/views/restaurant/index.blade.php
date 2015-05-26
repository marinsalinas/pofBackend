@extends('layouts.dash')

@section('members')
     <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>Restaurantes</h3>
                <div class="row mt">
                    <div class="col-lg-8">
                                    <div class="form-panel">
                                        <div class="panel-heading">
                                        <i class="fa fa-map-marker"></i>Restaurantes</div>
                                        <a href="menu/create"> Alta de Comidas</a>

                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                        <div id="map-canvas" style="width: 100%; height: 500px;"></div>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                </div><!-- col-lg-12-->
                  <div class="col-lg-4">
                        @foreach($restaurants as $restaurant)
                          <div class="form-panel">
                              <div class="panel-heading">
                                <i class="fa fa-users"></i> {{link_to ("restaurant/{$restaurant->name}",$restaurant->name)}}
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                        Opciones
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li>{{link_to ("restaurant/{$restaurant->name}/edit", 'Edicion')}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                              </div>
                              <!-- /.panel-heading -->
                              <div class="panel-body">
                                  <ul>
                                      <li>Nombre: {{$restaurant->name}}</li>
                                      <li>Direccion: {{$restaurant->textaddress}}</li>
                                      <li>Tipo de Restaurante: {{$restaurant->type}}</li>
                                      <li>Descripcion: {{$restaurant->description}}</li>
                                  </ul>
                              </div>
                              <!-- /.panel-body -->
                          </div>
                        @endforeach
                        </div>

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
