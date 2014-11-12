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
            zoom: 11,
            center: new google.maps.LatLng(25.6488126, -100.3030789),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: true
        };

        gmap.map = new google.maps.Map(mapDiv, mapOptions);


        $.get('/restaurant', function(data){
            if(!data.error){
                for(i=0; i< data.restaurants.length; i++){
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

                }
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