var marker=new google.maps.Marker(null);
function initializeMap() {
//posicion inicial en maps
var myCenter=getMyPosition();
//opciones del mapa
var mapOptions = {
  center: myCenter,
  zoom: 15,
  mapTypeId: google.maps.MapTypeId.ROADMAP
};
//creando mapa y asignandole div en donde visualizarse
var map = new google.maps.Map($("#map_canvas")[0],mapOptions);
//dibujando posicion inicial
placeMarker(myCenter,map);
//programando evento clic en el mapa
google.maps.event.addListener(map, 'click', function(e) {
  placeMarker(e.latLng, map);
  //actualizar campos en formulario
  setXYForm(e.latLng);
});

}
function placeMarker(position, map) {
	//limpiando marker
	marker.setMap(null);
	//opciones de markar
	var mapMaker = {
	  position:position
	  //animation:google.maps.Animation.BOUNCE
	  //icon:'pinkball.png'
	};
	marker=new google.maps.Marker(mapMaker);
	marker.setMap(map);
	//moviendo el mapa a nueva posicion
	map.panTo(position);
}
function setXYForm(position){
	alert(position.lat());
	alert(position.lng());
}
function getMyPosition() {
	//despues implementar para que encontrar la posicion con html5
	return new google.maps.LatLng(-12.072049,-76.94216);
}