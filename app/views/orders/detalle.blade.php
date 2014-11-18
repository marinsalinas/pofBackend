@extends('layouts.show')

@section('ocho')

<div class="col-lg-12">
    <label hidden><{{$user = User::whereId($order->user_id)->first()}}</label>
    <label hidden><{{$adress = Address::whereId($order->address_id)->first()}}</label>
    <label hidden><{{$device = Devices::whereId($order->device_id)->first()}}</label>
    <label hidden><{{$restaurant = Restaurant::whereId($order->restaurant_id)->first()}}</label>
        @if($order->status!=='Entregado')
            <div class="panel panel-default">
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
@stop