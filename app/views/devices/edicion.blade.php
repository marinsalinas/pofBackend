@extends('layouts.edit')

@section('ocho')

    <div class="col-lg-8">
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


                /*for(i=0; i< data.restaurants.length; i++){
                    console.log(data.restaurants[i]);
                    var postition =  new google.maps.LatLng(data.restaurants[i].location.latitude,data.restaurants[i].location.longitude);

                    var infowindow = new google.maps.InfoWindow({
                        content: "<b>"+data.restaurants[i].name+'</b>'
                    });

                    var marker = new google.maps.Marker({
                        icon: "mapicons/"+data.restaurants[i].icon_type+".png",
                        position: postition,
                        map: gmap.map,
                        title: data.restaurants[i].name
                    });
                    infowindow.open(gmap.map, marker);

                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.open(map,marker);
                    });

                }*/
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
