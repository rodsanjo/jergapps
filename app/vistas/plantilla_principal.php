<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
 	Proyecto: Aplicaciones web desarrolladas
	Fecha: 15 de febrero de 2015
	Autor: Jorge Rodriguez
	Contenido: Prototipos
	Url: daweb.vv.si/apps
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <?php 
        include PATH_APPLICATION_APP."vistas/zonas/head.php";
    ?>   
</head>
<body onload="visualizarSeccion(window.location.hash);">
    <div class="teuuuu">
        <div id='fondoCentral'></div>
        <div id="encabezado">
            <?php 
                include PATH_APPLICATION_APP."vistas/zonas/encabezado.php";
            ?>        
        </div>
        <div id="menu_up">
            <?php 
                //include PATH_APPLICATION_APP."vistas/zonas/menu_up.php";
            ?>		
        </div>
        <div id="view_content">
            <?php
                echo $datos['view_content'];
            ?>       
        </div>

        <div id="rightColumn">
            <?php 
                //include PATH_APPLICATION_APP."vistas/zonas/rightColumn.php";
            ?> 
        </div>	

        <div id="pie">
            <?php 
                //include PATH_APPLICATION_APP."vistas/zonas/pie.php";
            ?>        
        </div>
    </div>
    <div id="piej">
            <hr/>
            <div>
                Copyright © jergapps<br/>
                <?php echo \core\Idioma::text("Diseñada por", "dicc"); ?> <a href="mailto:jergo23@gmail.com" style="color:brown">Jergo</a>
            </div>
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
//        var_dump($datos);
  //      print "<pre>"; 
  //        print_r($GLOBALS);
//          print("\$_GET "); print_r($_GET);
//          print("\$_POST ");print_r($_POST);
//          print("\$_COOKIE ");print_r($_COOKIE);
//          print("\$_REQUEST ");print_r($_REQUEST);
//          print("\$_SESSION ");print_r($_SESSION);
//          print("\$_SERVER ");print_r($_SERVER);
  //      print "</pre>";
//            print("xdebug_get_code_coverage() ");
//            var_dump(xdebug_get_code_coverage());
    ?>
</div>

    <div id="ctes">
        <?php
//            echo 'DS: '.DS.'<br/>';
//            echo 'PATH_ROOT: '.PATH_ROOT.'<br/>'.PHP_EOL;
//            echo 'PATH_APPLICATION: '.PATH_APPLICATION.'<br/>'.PHP_EOL;
//            echo 'PATH_APP: '.PATH_APP.'<br/>'.PHP_EOL;
//            echo 'PATH_APPLICATION_APP: '.PATH_APPLICATION_APP.'<br/>'.PHP_EOL;
//            echo 'APPLICATION_FOLDER: '.APPLICATION_FOLDER.'<br/>'.PHP_EOL;
//            echo 'URL_ROOT: '.URL_ROOT.'<br/>'.PHP_EOL;
//            echo 'URL_ACTUAL: '.URL_ACTUAL.'<br/>'.PHP_EOL;
//            echo 'URL_APPLICATION_ROOT: '.URL_APPLICATION_ROOT.'<br/>'.PHP_EOL;
//            echo 'PATH_HOME: '.PATH_HOME.'<br/>'.PHP_EOL;
//            echo 'URL_HOME_ROOT: '.URL_HOME_ROOT.'<br/>';
//            echo 'URL_HOST: '.URL_HOST.'<br/>';
        ?>
    </div>
    
</body>
</html>