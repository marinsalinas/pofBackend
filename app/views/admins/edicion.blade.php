@extends('layouts.edit')

@section('edit')

 <section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Edicion de Admin</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <div class="panel-heading">
                        <h4 class="mb"><i class="fa fa-user"></i> Edicion de usuario : {{$admin->fullname}}</h4>
                        {{ Form::open(array('route' => array('admins.destroy', $admin->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Cuenta</button>
                        {{ Form::close() }}
                        </div>
                        {{ Form::open(array('route' => array('admins.update', $admin->id), 'method' => 'put')) }}
                        <div class="form-group">
                        {{Form::label('username','User: ')}}
                        {{Form::input('text','username', $admin->username ,array('class'=>'form-control'))}}
                        {{$errors->first('username')}}
                        </div>
                        <div class="form-group">
                        {{Form::label('fullname','Nombre Completo: ')}}
                        {{Form::input('text','fullname', $admin->fullname,array('class'=>'form-control'))}}
                        {{$errors->first('fullname')}}
                        </div>
                        <div class="form-group">
                        {{Form::label('email','Email: ')}}
                        {{Form::input('text','email', $admin->email,array('class'=>'form-control'))}}
                        {{$errors->first('email')}}
                        </div>
                        <div class="form-group">
                        {{Form::label('phone','Telefono: ')}}
                        {{Form::input('text','phone', $admin->phone,array('class'=>'form-control'))}}
                        {{$errors->first('phone')}}
                        </div>
                        <div class="form-group">
                        {{Form::submit('Cambiar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                        </div>
                        {{Form::close()}}
                        </div>
            </div><!-- col-lg-12-->
        </div><!-- /row -->
    </section>
</section>

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
