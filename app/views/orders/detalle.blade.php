@extends('layouts.show')
<i hidden>{{$comidas = Menu::all()}}</i>

@section('ocho')

<div class="col-lg-8">
    <label hidden><{{$user = User::whereId($order->user_id)->first()}}</label>
    <label hidden><{{$adress = Address::whereId($order->address_id)->first()}}</label>
    <label hidden><{{$device = Devices::whereId($order->device_id)->first()}}</label>
    <label hidden><{{$restaurant = Restaurant::whereId($order->restaurant_id)->first()}}</label>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Comida
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
    </div>
@stop