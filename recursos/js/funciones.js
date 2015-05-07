/**
* Función que gestiona la visualización dinámica de las secciones
de la página.
* @param string id Contendrá el id de la sección a visualizar
*/
function visualizarSeccion(id) {
	if (id == undefined || $(id).attr("id") != id.substring(1)) {
		//alert("Sección a visualizar: "+id.substring(0)+""+$(id).attr(id));
		id = "#home";
	}
	$("#secciones>*").css('display', 'none'); // Oculta todas las secciones
	$(id).css('display', 'block'); // Visualiza una sección concreta
}

function deslizarSeccion(id) {
    $("div#secciones > div").fadeOut(1000);
    $(id).slideToggle(5000);
}

/**
 * Función jquery que gestiona el menú izquierdo mostrando y ocultando las distintas opciones
 */
$(document).ready(function() {
    $("div#menu_izq li span").click (function () {
        if ($("div#menu_izq li ul").is(":hidden") ) {
            $("div#menu_izq li ul").show();
        }else{
            $("div#menu_izq li ul").hide ();
        }
    });
    $("a").click (function () {
        $(this).css('color','blueviolet');
    });
});

/**
 * Función para mostrar la fecha con el mes en letras.
 */
function fecha(){
	var fecha=new Date();
	switch(fecha.getMonth()){
		case(0):mes="enero";break;
		case(1):mes="febrero";break;
		case(2):mes="marzo";break;
		case(3):mes="abril";break;
		case(4):mes="mayo";break;
		case(5):mes="junio";break;
		case(6):mes="julio";break;
		case(7):mes="agosto";break;
		case(8):mes="septiembre";break;
		case(9):mes="octubre";break;
		case(10):mes="noviembre";break;
		case(11):mes="diciembre";break;
	}
	document.write(fecha.getDate()+" de "+mes+" de "+fecha.getFullYear());
}
function fechaInt(){
	var fecha=new Date();
	document.write(fecha.getDate()+" - "+(fecha.getMonth()+1)+" - "+fecha.getFullYear());
}

/**
 * Menú de opción de Idioma
 */
$(document).ready(function(){
    $("#idioma").mouseenter(function(){
        $("#idioma a").fadeIn(1000);
    });
    $("#idioma").mouseleave(function(){
        $("#idioma a").fadeOut(500);
    });
    
    $("#menu").click(function () { 			 	
            $("span#opcion_loc").slideToggle();
        }
    );

    $("li.item").click(
        function () { 			 	
            $("span.desplegable").slideToggle();
        }               
    );
        //Desplegar el carrito lateral
    $("#btn_desplegar_carrito").click(
        function(){
            $("#carrito_oculto").slideToggle();  
        }
    );
});
