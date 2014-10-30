@extends('layouts.theme')

@section('contenido')
    <h1 style="text-align: center">Admins</h1>
      @foreach($users as $user)
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i>{{$user->username}}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul>
                    <li>{{$user->email}}</li>
                    <li>{{$user->fullname}}</li>
                    <li>{{$user->phone}}</li>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>
      @endforeach
@stop
