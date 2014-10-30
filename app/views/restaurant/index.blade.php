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

      <h1 style="text-align: center">Restaurantes</h1>
        @foreach($restaurants as $restaurant)
          <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-users"></i> {{$restaurant->name}}
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <ul>
                      <li>{{$restaurant->name}}</li>
                      <li>{{$restaurant->textaddress}}</li>
                  </ul>
              </div>
              <!-- /.panel-body -->
          </div>
        @endforeach
        </div>
  @stop
