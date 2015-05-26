@extends('layouts.edit')

@section('edit')
 <section id="main-content">
          <section class="wrapper">
              <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">

            <li hidden>{{$restaurants = Restaurant::all()}}</li>

                <i class="fa fa-user"></i> Edicion de Dispositivo : {{$device->name}}
                    <div class="pull-right">
                    {{ Form::open(array('route' => array('devices.destroy', $device->id), 'method' => 'delete')) }}
                        <button type="submit" >Borrar Dispositivo</button>
                    {{ Form::close() }}
                    </div>
            </div>
                <!-- /.panel-heading -->
                    <div class="panel-body">
                            <div id="map-canvas" style="width: 100%; height: 200px; background: #000000; margin-bottom: 20px"></div>
                                {{ Form::open(array('route' => array('devices.update', $device->id), 'method' => 'put')) }}
                            <div class="form-group">
                                Restaurante <select name="restaurant_id">
                                    @foreach($restaurants as $restaurant)
                                                <option value="{{$restaurant->id}}" @if($restaurant->id==$device->restaurant_id) selected=yes @endif>
                                                {{$restaurant->name}}
                                                </option>
                                    @endforeach
                                            </select>
                                {{$errors->first('restaurant_id')}}
                            </div>
                                <div class="form-group">
                                    {{Form::label('imei','IMEI: ')}}
                                    {{Form::input('text','imei', $device->imei,array('class'=>'form-control'))}}
                                    {{$errors->first('imei')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('name','Nombre del dispositivo: ')}}
                                    {{Form::input('text','name', $device->name,array('class'=>'form-control'))}}
                                    {{$errors->first('name')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('phone','Telefono: ')}}
                                    {{Form::input('text','phone', $device->phone,array('class'=>'form-control'))}}
                                    {{$errors->first('phone')}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('description','Descripcion: ')}}
                                    {{Form::input('text','description', $device->description,array('class'=>'form-control'))}}
                                    {{$errors->first('description')}}
                                </div>
                               <div class="form-group">
                                <select name="status">
                                    <option value="Inactivo" @if($device->status=='Inactivo')selected=yes @endif>Inactico</option>
                                    <option value="Activo" @if($device->status=='Activo')selected=yes @endif>Activo</option>
                                </select>
                                </div>
                                <div class="form-group">
                                {{Form::submit('Cambiar',array('class'=>'btn btn-lg btn-success btn-block'))}}
                                </div>
                                {{Form::close()}}
                    </div>
                <!-- /.panel-body -->
          </div>
    </div>
    </div></section></section>
@stop

@section('script')
<script>
/**
 * Created by co_mmsalinas on 18/11/2014.
 */
/**
 * Created by co_mmsalinas on 06/11/2014.
 */
var gmap = gmap || {};

gmap.restMArkers = [];

gmap.init = function() {
    var mapDiv = document.getElementById("map-canvas");
    //Si existe este elemento
    if (mapDiv) {
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(25.6488126, -100.3030789),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true
        };

        gmap.map = new google.maps.Map(mapDiv, mapOptions);


        $.get('/devices/position/{{$device->id}}', function(data){
            if(!data.error){
                console.log(data);
                var position =  new google.maps.LatLng(data.last_report.position.latitude,data.last_report.position.longitude);

                console.log(position);
                gmap.map.setCenter(position);
                gmap.map.setZoom(15);
                var icon =
                {
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW ,
                    fillColor: '#383838',
                    fillOpacity: 1,
                    scale: 3,
                    strokeColor: '#383838',
                    strokeWeight: 2,
                    rotation : data.last_report.heading
                };

                //Marker
                var marker = new google.maps.Marker({

                    position: position,
                    icon:icon,
                    map: gmap.map
                });
                marker.setMap(gmap.map);
                console.log(marker);




                    var infowindow = new google.maps.InfoWindow({
                        content: '<b>Status: '+data.last_report.status+'</b><br/><b>' +
                                    'Velocidad: '+data.last_report.speed+' kph</b>'+
                                    '<br><b>Tiempo: '+ data.last_report.eventDate+'</b></br>'
                    });
                    infowindow.open(gmap.map, marker);

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(gmap.map,marker);
                    });


            }
        });

    }
}

gmap.loadScript= function(){
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://maps.googleapis.com/maps/api/js?libraries=drawing&geometry;key=AIzaSyDsb6GMZ18_AcCSCF17LmbMMzHzl_qJmtc&sensor=true&callback=gmap.init'
    document.body.appendChild(script);
}

$(window).load(function(){
    gmap.loadScript();
});
</script>

@stop

  @section('seccion')
   <li class="mt">
                        <ahref="../../dashboard">
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

