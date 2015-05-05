
host = '';
host = '/daweb'; //'http://localhost/daweb';
name_app = '/apps'

function cargar(div, url) {
    //alert('div = '+div+'\nurl = '+url);
    $(div).load( url );
}

function ajax(id,controlador,metodo_parametros){
    peticion = '/'+controlador+'/'+metodo_parametros;
    uri = host+name_app+peticion;
    //alert('div = '+id+'\nurl = '+uri);
    //$(id).html('<p style="text-align: center;margin-top: 5%;"><img src="../home/recursos/imagenes/ajax-loader.gif" /></p>');
    $.ajax({
        //type: "POST",
        //is_ajax: true,
        success: function() {
            cargar(id,uri);
        }
    })
/*
    jQuery.post(
        {is_ajax: "true"},
        function(data, textStatus, jqXHR) {
            cargar(id,uri);
        }
        
    );
*/
}

function mostrarImagen(app){
    //alert(app);
    jQuery.post(
        "/daweb/apps/apps/mostrarImagenWeb/ajax/"+app //"http://localhost/daweb/apps/apps/mostrarImagenWeb/ajax/"+app
        //"http://daweb.vv.si/apps/apps/mostrarImagenWeb/ajax/"+app
        //,{is_ajax: "true"}
        ,function(data, textStatus, jqXHR) {
            $("#rightColumn").html(data);
        }
        
    );
}



