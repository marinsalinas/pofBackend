@extends('layouts.edit')

@section('ocho')

    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-user"></i> Edicion de usuario : {{$user->fullname}}
                    <div class="pull-right">
                    {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Cuenta</button>
                    {{ Form::close() }}
                    </div>
            </div>
                <!-- /.panel-heading -->
            <div class="panel-body">




            </div>
                <!-- /.panel-body -->
        </div>
    </div>

@stop
