var marker3 = new google.maps.Marker(null);
var map3;
document.on('ready',initializeMap3());
function initializeMap3() {
//posicion inicial en maps
    var myCenter = new google.maps.LatLng(latitud,longitud);
//opciones del mapa
    var mapOptions = {
        center: myCenter,
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
//creando mapa y asignandole div en donde visualizarse
     map3 = new google.maps.Map($("#map_canvas3")[0], mapOptions);

//dibujando posicion inicial
    placeMarker3(myCenter);
    setInterval("actualizarMapaMotoLocal()", 3000);
    console.log("Se acabo de inicializar el mapita");
}
function placeMarker3(position) {
    //limpiando marker
    marker3.setMap(null);
    //opciones de markar
    var mapMaker = {
        position: position,
        animation:google.maps.Animation.BOUNCE
        //icon:'pinkball.png'
    };
    marker3 = new google.maps.Marker(mapMaker);
    marker3.setMap(map3);
    //moviendo el mapa a nueva posicion
    map3.panTo(position);
}
function actualizarMapaMotoLocal(){
    var url = "/ws/motoposlocal";
    $.ajax({
        type: "POST",
        async: true,
        url: url,
        data: {
            id_transporte: id_transporte
        },
        success: function (resultado) {
           if(resultado.respuesta){
               placeMarker3(new google.maps.LatLng(resultado.pos.latitud,resultado.pos.longitud));
           }
            console.log(resultado);
        },
        error: function () {
            console.log("No se pudo actualizar!");
        }
    });
}
