@extends('layouts.show')

@section('edit')
 <section id="main-content">
          <section class="wrapper">
              <div class="row">
<div class="col-lg-12">
    <label hidden><{{$user = User::whereId($order->user_id)->first()}}</label>
    <label hidden><{{$adress = Address::whereId($order->address_id)->first()}}</label>
    <label hidden><{{$device = Devices::whereId($order->device_id)->first()}}</label>
    <label hidden><{{$restaurant = Restaurant::whereId($order->restaurant_id)->first()}}</label>
        @if($order->status!=='Entregado')
            <div class="form-panel">
                <div class="panel-heading">
                    <i class="fa fa-user"></i> Orden
                    <div class="pull-right">
                                        {{ Form::open(array('route' => array('orders.destroy', $order->id), 'method' => 'delete')) }}
                                            <button type="submit" >Entregado</button>
                                        {{ Form::close() }}
                                        </div>
                </div>
                    <!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul>
                                    <li>Nombre: {{$user->fullname}}</li>
                                    <li>Direccion: {{$adress->textaddress}} {{$adress->description}}</li>
                                    <li>Restaurant: {{$restaurant->name}}</li>
                                    <li>Dispositivo: {{$device->name}} </li>
                                    <li>Status: {{$order->status}}</li>
                                </ul>
                                {{ Form::open(array('route' => array('orders.update', $order->id), 'method' => 'put', 'files'=>true)) }}
                                <label hidden><{{$devices = Devices::all()}}</label>
                                @if($order->status=='En Proceso')
                                <select name="id_device">
                                    @foreach($devices as $dev)
                                    @if($dev->status=='Inactivo')
                                    <option value="{{$dev->id}}">{{$dev->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @else
            <!-- 'En Proceso' 1,'En Camino' 2,'Por Llegar' 3,'En Domicilio' 4,'Entregado' 5 -->
                                <label hidden><{{$status = Orders::all()}}</label>
                                Status de orden:
                                <select name="id_device">
                                    <option value="En Camino">En Camino</option>
                                    <option value="Por Llegar">Por Llegar</option>
                                    <option value="En Domicilio">En Domicilio</option>
                                </select>
                                    @endif
                                     <br><br>
                                     {{Form::submit('Asignar')}}
                                {{Form::close()}}
                            </div>
                    <!-- /.panel-body -->
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-user"></i> Orden
                    </div>
                        <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <ul>
                                        <li>Nombre: {{$user->fullname}}</li>
                                        <li>Direccion: {{$adress->textaddress}} {{$adress->description}}</li>
                                        <li>Restaurant: {{$restaurant->name}}</li>
                                        <li>Dispositivo: {{$device->name}} </li>
                                        <li>Status: {{$order->status}}</li>
                                    </ul>

                                </div>
                        <!-- /.panel-body -->
                </div>
        @endif
</div>
</div></section></section>
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
                                         <a href="../../restaurant" >
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
