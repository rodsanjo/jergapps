
host = ''; //Host
host = '/web/jergapps'; //'http://localhost/web/jergapps';
name_app = '/apps'

function cargar(div, url) {
    //alert('div = '+div+'\nurl = '+url);
    $(div).load( url );
}

function ajax(id,controlador,metodo_parametros){
    peticion = '/'+controlador+'/'+metodo_parametros;
    uri = host+name_app+peticion;
    //alert('div = '+id+'\nurl = '+uri);
    $(id).html('<p style="text-align: center;margin-top: 5%;"><img src="../home/recursos/imagenes/ajax-loader.gif" /></p>');
    cargar(id,uri);
}

$(document).ready(function(){        
    //Mostrar por ajax la imagen previa
    $(".boton_app").mouseenter(function(event){
        var x = $(event.target);
        imagenWeb = x.data('url');
        //var imagenWeb = event.target.getAttribute('data-url');
        //alert(imagenWeb);
        
        //$(id).html('<p style="text-align: center;margin-top: 5%;"><img src="../home/recursos/imagenes/ajax-loader.gif" /></p>');

        //mostrarImagenWeb: 2 formas:
        //conJQueryPost(imagenWeb); //it works
        //conAjax1(imagenWeb); //it works
        conAjax2(imagenWeb); //it works
    });
});

//2 formas:
function conJQueryPost(imagenWeb){
    //alert(imagenWeb);
    jQuery.post(
        host+name_app+'/apps/mostrar_imagen_web'
        ,{is_ajax: "true", imagenWeb: imagenWeb}
        ,function(data, textStatus, jqXHR) {
            $("#rightColumn").html(data);
        }
        
    );
}
function conAjax1(imagenWeb){
    //alert(imagenWeb)
    $.ajax({
        method:'POST'
        ,url: host+name_app+'/apps/mostrar_imagen_web'
        ,data: { is_ajax: true, imagenWeb: imagenWeb }
        ,success: function(msg) {
            $('#rightColumn').html( msg );
        }
    })
}
function conAjax2(imagenWeb){
    //alert(imagenWeb)
    $.ajax({
        method:'POST'
        ,url: host+name_app+'/apps/mostrar_imagen_web'
        ,data: { is_ajax: true, imagenWeb: imagenWeb }
    })
        .done(function( data ){
            $('#rightColumn').html( data );
        })
        .failed(function(){
            $('#rightColumn').html( 'imagen no disponible' );
        })
}
