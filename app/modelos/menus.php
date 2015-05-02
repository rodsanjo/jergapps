<?php

namespace modelos;

class Menus{    //la clase se tiene que llamar igual que el archivo
    private static $menuUp = array(
        /*
            item => "controlador,metodo/clausula,title"
            item => array( subitem, subitem, ...)
                subitem => "controlador,metodo,title"

        */
        "Inicio" => "inicio,index,Inicio"
        ,"Contacto" => "contacto,index,Contacto"
        
        //Si no uso Bootstrap
        /*Colocamos el menú en sentido inverso dado que hemos usado en el CSS float: right*/
        //"Contacto" => "contacto,index,Contacto"
        //,"Inicio" => "inicio,index,Inicio"
    );
    
    public static function get_menuUp(){
        return self::$menuUp;
    }
}
?>
