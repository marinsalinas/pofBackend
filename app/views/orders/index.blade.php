@extends('layouts.theme')

@section('doce')

@stop

@section('ocho')
    <div class="col-lg-12">
        <!-- 'En Proceso' 1,'En Camino' 2,'Por Llegar' 3,'En Domicilio' 4,'Entregado' 5 -->
                <div class="panel panel-default">
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

@stop

@section('cuatro')
    <div class="col-lg-4">
    </div>
@stop
