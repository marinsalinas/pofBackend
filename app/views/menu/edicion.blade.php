@extends('layouts.edit')

@section('edit')

 <section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Edicion de Comidas</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                                <li hidden>{{$restaurants = Restaurant::all()}}</li>

                        <div class="panel-heading">
                        <h4 class="mb"><i class="fa fa-cutlery"></i>Edicion de comida : {{$product->product}}</h4>
                        {{ Form::open(array('route' => array('menu.destroy', $product->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Comida</button>
                        {{ Form::close() }}
                        </div>
                        {{ Form::open(array('route' => array('menu.update', $product->id), 'method' => 'put', 'files'=>true)) }}
                            <div class="form-group">
                                <img style="width: 80px; margin: 0 auto;" src="../../uploads/{{$product->image_url}}"/>
                            </div>
                                <div class="form-group">
                                    Restaurante <select name="restaurant_id">
                                        @foreach($restaurants as $restaurant)
                                                    <option value="{{$restaurant->id}}" @if($restaurant->id==$product->restaurant_id) selected=yes @endif>
                                                    {{$restaurant->name}}
                                                    </option>
                                        @endforeach
                                                </select>
                                    {{$errors->first('restaurant_id')}}
                                </div>
                                <div class="form-group">
                                Comida <select name="food_id">
                                @foreach($foods as $food)
                                <option value="{{$food->id}}" @if($food->id==$product->food_id) selected=yes @endif>
                                {{$food->food_name}}</option>
                                @endforeach
                                </select>
                                {{$errors->first('food_id')}}
                                </div>

                                <div class="form-group">
                                    {{Form::label('product','Nombre del Platillo: ')}}
                                    {{Form::input('text','product', $product->product,array('class'=>'form-control'))}}
                                    {{$errors->first('product')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('price','Precio: ')}}
                                    {{Form::input('text','price', $product->price,array('class'=>'form-control'))}}
                                    {{$errors->first('price')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('description','Descripcion: ')}}
                                    {{Form::input('text','description', $product->description,array('class'=>'form-control'))}}
                                    {{$errors->first('description')}}
                                </div>
                                 <div class="form-group">
                                {{ Form::label('photo', 'Logo') }}
                                <!--así se crea un campo file en laravel-->
                                {{ Form::file('photo') }}
                                {{$errors->first('photo')}}
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
                                        <a class="active" href=../../"menu" >
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
