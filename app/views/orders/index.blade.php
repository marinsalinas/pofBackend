@extends('layouts.dash')

@section('members')
 <section id="main-content">
          <section class="wrapper">
              <div class="row">
    <div class="col-lg-12">
                <div class="form-panel">
                    <div class="panel-heading">
                                    <i class="fa fa-clock-o fa-fw"></i> Pedidos
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-exclamation-circle"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">En proceso</h4>
                                                    <p>
                                                        {{--<small class="text-muted"><i class="fa fa-time"></i> 11 hours ago via Twitter</small>--}}
                                                    </p>
                                                </div>
                                                <div class="timeline-body">
                                                    @foreach($orders as $order)
                                                    @if($order->status=="En Proceso")
                                                            <ul>
                                                                <li>{{link_to ("orders/{$order->id}","Orden: ".$order->id)}}</li>
                                                            </ul>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge warning"><i class="fa fa-bolt"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">En camino</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    @foreach($orders as $order)
                                                    @if($order->status=="En Camino")
                                                        <ul>
                                                            <li>{{link_to ("orders/{$order->id}","Orden: ".$order->id)}}</li>
                                                        </ul>
                                                    @endif
                                                    @endforeach
                                                    </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge"><i class="fa fa-compass"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Por llegar</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    @foreach($orders as $order)
                                                    @if($order->status=="Por Llegar")
                                                        <ul>
                                                            <li>{{link_to ("orders/{$order->id}","Orden: ".$order->id)}}</li>
                                                        </ul>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info"><i class="fa fa-thumbs-up"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">En domicilio</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    @foreach($orders as $order)
                                                    @if($order->status=="En Domicilio")
                                                        <ul>
                                                            <li>{{link_to ("orders/{$order->id}","Orden: ".$order->id)}}</li>
                                                        </ul>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted">
                                            <div class="timeline-badge success"><i class="fa fa-check"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h4 class="timeline-title">Entregado</h4>
                                                </div>
                                                <div class="timeline-body">
                                                    @foreach($orders as $order)
                                                    @if($order->status=="Entregado")
                                                        <ul>
                                                            <li>{{link_to ("orders/{$order->id}","Orden: ".$order->id)}}</li>
                                                        </ul>
                                                    @endif
                                                    @endforeach                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.panel-body -->
                </div>
    </div>
</div></section></section>
@stop

@section('seccion')
 <li class="mt">
                      <a  href="dashboard">
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
                                       <a class="active" href="orders" >
                                           <i class="fa fa-map-marker"></i>
                                           <span>Pedidos</span>
                                       </a>
                                   </li>

@stop
