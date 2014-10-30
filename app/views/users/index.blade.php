@extends('layouts.theme')

@section('doce')
    <div class="col-lg-12">
        <h1 class="page-header">Administracion</h1>
    </div>
@stop

@section('ocho')

                <div class="col-lg-8">

                    <!-- /.panel -->
                </div>

@stop

@section('cuatro')
                <div class="col-lg-4">

    <h1 style="text-align: center">Admins</h1>
      @foreach($users as $user)
        <div class="panel panel-default">
            <div class="panel-heading">
              <i class="fa fa-users"></i> {{$user->username}}
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
      </div>
@stop
