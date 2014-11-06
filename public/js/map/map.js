/**
 * Created by co_mmsalinas on 31/10/2014.
 */

var gmap = gmap || {};


gmap.init = function(){
    var mapDiv = document.getElementById("map-canvas");
    //Si existe este elemento
    if(mapDiv) {
        var mapOptions = {
            zoom: 11,
            center: new google.maps.LatLng(25.6488126, -100.3030789),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true
        };

        gmap.map = new google.maps.Map(mapDiv, mapOptions);

        var marker = new google.maps.Marker({

            position: gmap.map.getCenter(),
            map: gmap.map,
            draggable:true
        });

        var restLat = document.getElementById('rest-lat');
        var restLng = document.getElementById('rest-lng');

        if(restLat.value == "" || restLng.value == ""){
            restLat.value = gmap.map.getCenter().lat();
            restLng.value = gmap.map.getCenter().lng();
        }else{
            var postition =  new google.maps.LatLng(restLat.value,restLng.value);
            var infowindow = new google.maps.InfoWindow({
                content: "<b>"+document.getElementById('restName').value+'</b>'
            });

            marker.setPosition(postition);
            marker.setTitle("Restaurante");
            infowindow.open(gmap.map, marker);
            gmap.map.panTo(postition);
            gmap.map.setZoom(15);

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

        }



        google.maps.event.addListener(marker, 'dragend', function(event){
            var restLat = document.getElementById('rest-lat');
            var restLng = document.getElementById('rest-lng');

            restLat.value = event.latLng.lat();
            restLng.value = event.latLng.lng();

        });

    }
}


gmap.loadScript= function(){
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://maps.googleapis.com/maps/api/js?libraries=drawing&geometry;key=AIzaSyDsb6GMZ18_AcCSCF17LmbMMzHzl_qJmtc&sensor=true&callback=gmap.init'
    document.body.appendChild(script);
}



window.onload = gmap.loadScript;