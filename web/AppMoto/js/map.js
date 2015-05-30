var marker = new google.maps.Marker(null);
var map;
function initializeMap() {
//posicion inicial en maps
    var myCenter = getMyPosition();
//opciones del mapa
    var mapOptions = {
        center: myCenter,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
//creando mapa y asignandole div en donde visualizarse
    map = new google.maps.Map($("#map_canvas")[0], mapOptions);
    placeMarker(myCenter);
}
function placeMarker(position) {
    //limpiando marker
    marker.setMap(null);
    //opciones de markar
    var mapMaker = {
        position: position
        //animation:google.maps.Animation.BOUNCE
        //icon:'pinkball.png'
    };
    marker = new google.maps.Marker(mapMaker);
    marker.setMap(map);
//moviendo el mapa a nueva posicion
    map.setCenter(position);
}

function getMyPosition() {
    //despues implementar para que encontrar la posicion con html5
    return new google.maps.LatLng(-12.072049, -76.990216);
}