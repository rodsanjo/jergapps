<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
 	Proyecto: Aplicaciones web desarrolladas
	Fecha: 15 de febrero de 2015
	Autor: Jorge Rodriguez
	Contenido: Prototipos
	Url: daweb.vv.si/apps
-->
<?php
    define("URL_ROOT", (isset($_SERVER['REQUEST_SCHEME'])?$_SERVER['REQUEST_SCHEME']:($_SERVER['SERVER_PORT']==80?"http":"https"))."://".$_SERVER['SERVER_NAME'].str_replace("index.php", '', $_SERVER['SCRIPT_NAME'])); // Finaliza en DS
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
<head>
    <?php 
        include "zonas/head.php";
    ?> 
</head>
<body onload="visualizarSeccion(window.location.hash);">
	<!-- poner amarillo detrás del encabezado justo encima del ascensor -->
    <div id='fondoCentral'></div>
    <div id="encabezado">
        <?php 
            include "zonas/encabezado.php";
        ?>        
    </div>
    <div id="view_content">
        <?php 
            include "zonas/view_content.php";
        ?>        
    </div>
        
    <div id="rightColumn">
        <?php 
            //include "zonas/rightColumn.php";
        ?> 
    </div>	
	
    <div id="pie">
        <?php 
            include "zonas/pie.php";
        ?>        
    </div>

<?php
if (isset($_SESSION["alerta"])) {
    echo <<<heredoc
<script type="text/javascript" />
    alert("{$_SESSION["alerta"]}");
    var alerta = '{$_SESSION["alerta"]}';
</script>
heredoc;
    unset($_SESSION["alerta"]);
}
elseif (isset($datos["alerta"])) {
    echo <<<heredoc
<script type="text/javascript" />
    // alert("{$datos["alerta"]}");
    var alerta = '{$datos["alerta"]}';
</script>
heredoc;
}
?>	
	
    <div id='globals'>
        <?php
      //      var_dump($datos);
            print "<pre>"; 
        //      print_r($GLOBALS);
    //          print("\$_GET "); print_r($_GET);
    //          print("\$_POST ");print_r($_POST);
    //          print("\$_COOKIE ");print_r($_COOKIE);
    //          print("\$_REQUEST ");print_r($_REQUEST);
    //          print("\$_SESSION ");print_r($_SESSION);
    //          print("\$_SERVER ");print_r($_SERVER);
            print "</pre>";
    //            print("xdebug_get_code_coverage() ");
    //            var_dump(xdebug_get_code_coverage());
        ?>
    </div>
    
</body>
</html>
