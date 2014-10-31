@extends('layouts.theme')

    @section('doce')
        <div class="col-lg-12">
            <h1 class="page-header">Restaurantes</h1>
        </div>
    @stop
@section('ocho')

                <div class="col-lg-8">

                    <!-- /.panel -->
                </div>

@stop

  @section('cuatro')
                  <div class="col-lg-4">

        @foreach($restaurants as $restaurant)
          <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-users"></i> {{$restaurant->name}}
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Opciones
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>{{link_to ("restaurant/{$restaurant->name}/edit", 'Edicion')}}
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Eliminar</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <ul>
                      <li>Nombre: {{$restaurant->name}}</li>
                      <li>Direccion: {{$restaurant->textaddress}}</li>
                      <li>Tipo de Restaurante: {{$restaurant->type}}</li>
                      <li>Descripcion: {{$restaurant->description}}</li>
                  </ul>
              </div>
              <!-- /.panel-body -->
          </div>
        @endforeach
        </div>
  @stop
