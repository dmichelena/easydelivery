$(document).on("ready", documentoListo);
//VALORES GLOBALES
//var urlG="http://localhost/ws/";
var urlG = "http://easydelivery.koding.io/ws/"
var id_transporte = null;
//FIN VALORES GLOBALES
function documentoListo() {
    if (navigator.geolocation) {
        setInterval("actualizarMisCoordenadas()", 3000);
    } else {
        console.log("no hay para coordenadas");
    }
    $(".cerrar").click(function () {
        cerrarSesion();
    });
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        validar();
        return false;
    });
    initializeMap();
}
function cerrarSesion() {
    $("#user").val("");
    $("#pass").val("");
    id_transporte = null;
    location.href = "#login";
}

function coordenadas(geo) {
    var longitud = geo.coords.longitude;
    var latitud = geo.coords.latitude;
    var url = urlG + "posicion";
    $.ajax({
        type: "POST",
        async: true,
        url: url,
        data: {
            longitud: longitud,
            latitud: latitud,
            id_transporte: id_transporte
        },
        success: function (resultado) {
            console.log("Se actualizo!");
            console.log(resultado);

        },
        error: function () {
            showError("No se pudo actualizar!");
        }
    });
    return false;

}
function actualizarMisCoordenadas() {
    if (id_transporte) {
        navigator.geolocation.getCurrentPosition(coordenadas);
    } else {
        console.log("No estas logueado");
    }
}
function validar() {
    var user = $("#user").val();
    var pass = $("#pass").val();
    if (user.length == 0) {
        showError("Ingrese usuario");
        return false;
    }
    if (pass.length == 0) {
        showError("Ingrese contraseña");
        return false;
    }
    var url = urlG + "autenticar";
    $.ajax({
        type: "POST",
        async: true,
        url: url,
        data: {
            user: user,
            pass: pass
        },
        success: function (resultado) {
            if (resultado.id_transporte != "-1") {
                id_transporte = resultado.id_transporte;
                $("#loginMsg").html();
                cargarPedidos();
            } else {
                showError("Error al intentar iniciar sesion...");
                $("#loginMsg").html("Usuario y/o Contraseña incorrecta...");
            }

        },
        error: function () {
            showError("Error al intentar iniciar sesion...");
            $("#loginMsg").html("ERROR!");
        }
    });
    return false;
}
function showError(error) {
    console.log(error);
    /*
     $.mobile.pageLoadErrorMessage =error;
     // show error message
     $.mobile.showPageLoadingMsg( $.mobile.pageLoadErrorMessageTheme, $.mobile.pageLoadErrorMessage, true );
     // hide after delay
     setTimeout( $.mobile.hidePageLoadingMsg, 1500 );
     */
}
function cargarPedidos() {
    var url = urlG + "pedidos";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id_transporte: id_transporte
        },
        success: function (resultado) {
            cargarPedidosHTML(resultado);
            console.log(resultado);
            location.href = "#pedidos";
        },
        error: function () {
            showError("Error al intentar iniciar sesion...");
        }
    });
    return false;
}
function cargarPedidosHTML(pedidos) {
    var html = "";
    for (var i = 0; i < pedidos.length; i++) {
        var p = pedidos[i];
        html += "<div data-role='collapsible'><h3>";
        html += "<strong>N Perdido:</strong> <span>" + p.id_delivery + "</span> <br>";
        html += "<strong>Cliente:</strong> <span>" + p.nombre_receptor + "</span> <br>";
        html += "<strong>Monto: S/.</strong> <span>" + p.monto + "</span></h3>";
        html += "<button class='verDetalle' data-pedido='" + p.id_delivery + "' data-mini='true' data-icon='bullets' data-iconpos='left'>Ver detalle</button>";
        html += "<button class='verMapa' data-pedido='" + p.id_delivery + "' data-cliente='" + p.nombre_receptor + "' data-longitud='" + p.destino_longitud + "' data-latitud='" + p.destino_latitud + "' data-mini='true' data-icon='bullets'>Ver en MAPA</a><br>";
        html += "<button class='cambiarEstado' data-pedido='" + p.id_delivery + "' data-icon='check' data-iconpos='left' data-estado='1'>ENTREGADO</button>";
        html += "<button class='cambiarEstado' data-pedido='" + p.id_delivery + "' data-icon='delete' data-iconpos='left' data-estado='2'>NO ENTREGADO</button>";
        html += "</div>";
    }
    ;
    $("#listaPedidos").html(html);
    $(".verDetalle").click(function () {
        cargarDetalle($(this).data("pedido"));
    });
    $(".cambiarEstado").click(function () {
        cambiarEstado($(this).parent().parent(), $(this).data("pedido"), $(this).data("estado"));
    });
    $(".verMapa").click(function () {
        $("#pedido_mapa").html( $(this).data("pedido"));
        $("#cliente_mapa").html( $(this).data("cliente"));
        location.href = "#mapa";
        verEnMapa($(this).data("longitud"), $(this).data("latitud"));
    });
}
function verEnMapa(longitud, latitud) {
    placeMarker(new google.maps.LatLng(latitud, longitud));
}
function cambiarEstado(elemento, pedido, estado) {
    if (!confirm("¿Seguro de cambiar el estado del pedido : " + pedido + "?")) {
        return false;
    }
    var url = urlG + "actualizar";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id_delivery: pedido,
            estado: estado
        },
        success: function (resultado) {
            showError("Listo");
            elemento.remove();
        },
        error: function () {
            showError("Error al intentar enviar estado...");
        }
    });
    return false;
}

function cargarDetalle(codigoPedido) {
    console.log("Debe ir a estado");
    var url = urlG + "detalle";
    $.ajax({
        type: "POST",
        url: url,
        data: {
            id_transporte: id_transporte,
            id_delivery: codigoPedido
        },
        success: function (resultado) {
            cargarDetalleHTML(resultado);
            location.href = "#detalle";
        },
        error: function () {
            showError("Error al intentar iniciar sesion...");
        }
    });
    return false;
}
function cargarDetalleHTML(resultado) {
    $("#cod_pedido").html(resultado.id_delivery);
    $("#usuario").html(resultado.nombre_receptor);
    $("#costo_envio").html(resultado.costo_envio);
    $("#total").html(resultado.total);
    var html = "";
    for (var i = 0; i < resultado.productos.length; i++) {
        var p = resultado.productos[i];

        html += "<tr>";
        html += "<td>" + p.producto + "</td>";
        html += "<td>" + p.precio_unitario + "</td>";
        html += "<td>" + p.cantidad + "</td>";
        html += "<td>" + p.cantidad * p.precio_unitario + "</td>";
        html += "</tr>";
    }
    ;
    $("#detalleProductos").html(html);
}
