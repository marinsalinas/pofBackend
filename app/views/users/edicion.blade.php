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
                                {{ Form::open(array('route' => array('users.update', $user->id), 'method' => 'put')) }}
                            <div class="form-group">
                                {{Form::label('username','User: ')}}
                                {{Form::input('text','username', $user->username ,array('class'=>'form-control'))}}
                                {{$errors->first('username')}}
                            </div>
                                <div class="form-group">
                                    {{Form::label('fullname','Nombre Completo: ')}}
                                    {{Form::input('text','fullname', $user->fullname,array('class'=>'form-control'))}}
                                    {{$errors->first('fullname')}}
                                </div>
                                <div class="form-group">
                                    {{Form::input('text','email', $user->email,array('class'=>'form-control'))}}
                                    {{$errors->first('email')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('phone','Telefono: ')}}
                                    {{Form::input('text','phone', $user->phone,array('class'=>'form-control'))}}
                                    {{$errors->first('phone')}}
                                </div>
                                <div class="form-group">
                                {{Form::submit('Cambiar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                                </div>
                                {{Form::close()}}
                    </div>
                <!-- /.panel-body -->
          </div>
    </div>
@stop
