@extends('layouts.edit')

@section('ocho')

    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">

            <li hidden>{{$restaurants = Restaurant::all()}}</li>

                <i class="fa fa-user"></i> Edicion de comida : {{$product->product}}
                    <div class="pull-right">
                    {{ Form::open(array('route' => array('menu.destroy', $product->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Comida</button>
                    {{ Form::close() }}
                    </div>
            </div>
                <!-- /.panel-heading -->
                    <div class="panel-body">
                                {{ Form::open(array('route' => array('menu.update', $product->id), 'method' => 'put', 'files'=>true)) }}
                            <div class="form-group">
                                <img style="width: 80px; margin: 0 auto;" src="../../uploads/{{$product->image_url}}" />
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
                <!-- /.panel-body -->
          </div>
    </div>
@stop
