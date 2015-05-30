var marker2 = new google.maps.Marker(null);
var map2;
document.on('ready',initializeMap2());
function initializeMap2() {
//posicion inicial en maps
    var myCenter = new google.maps.LatLng(latitud,longitud);
//opciones del mapa
    var mapOptions = {
        center: myCenter,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
//creando mapa y asignandole div en donde visualizarse
     map2 = new google.maps.Map($("#map_canvas2")[0], mapOptions);

//dibujando posicion inicial
    placeMarker2(myCenter);
    setInterval("actualizarMapaMoto()", 3000);
    console.log("Se acabo de inicializar el mapita");
}
function placeMarker2(position) {
    //limpiando marker
    marker2.setMap(null);
    //opciones de markar
    var mapMaker = {
        position: position,
        animation:google.maps.Animation.BOUNCE
        //icon:'pinkball.png'
    };
    marker2 = new google.maps.Marker(mapMaker);
    marker2.setMap(map2);
    //moviendo el mapa a nueva posicion
    map2.panTo(position);
}
function actualizarMapaMoto(){
    var url = "/ws/motopos";
    $.ajax({
        type: "POST",
        async: true,
        url: url,
        data: {
            id_delivery: id_delivery
        },
        success: function (resultado) {
           if(resultado.respuesta){
               placeMarker2(new google.maps.LatLng(resultado.pos.latitud,resultado.pos.longitud));
           }
            console.log(resultado);
        },
        error: function () {
            console.log("No se pudo actualizar!");
        }
    });
}
