<?php
namespace modelos;

/**
 * @author Jorge Rodríguez <jergo23@gmail.com>
 */
class apps{
    
    public static $carpetas_no_apps = array( '.' , '..', 'home', 'apps');
    
    public static function getCarpetas($directorio){
        $carpetas_apps = array();

        //Añadimos carpetas especiales al array de no apps
        array_unshift( self::$carpetas_no_apps , 'pruebas', 'nbproject');

        if (is_dir($directorio)) {

            if ($dh = opendir($directorio)){
                while (($file = readdir($dh)) !== false){
        //          echo "filename:" . $file . "<br>";
                    if (is_dir($directorio."/$file")) {
                        array_push($carpetas_apps, $file);
                    }
                }

                closedir($dh);

            }
        }
        
        //Extraemos las carpetas que no son apps
        self::deleteFromArray($carpetas_apps, self::$carpetas_no_apps);
        
        //var_dump($carpetas_apps);
        return $carpetas_apps;
    }
    
    /**
    * Esta funcion elimina un elemento dado en un array de una dimension
    * Parametros:
    *	$array: El array pasado por referencia. Los cambios realizados dentro de la funcion tendran efectos fuera de la misma
    *	$arrayDeleteIt: array que contine los elementos a eliminar.
    *	$useOldKeys:
    *		Si es falso, la funcion reindexara el array
    *		Si es true, la funcion guardara el inice
    *
    * Devuelve true si encontró el valor en el array.
    */
   private static function deleteFromArray(&$array, $arrayDeleteIt, $useOldKeys = false){
            foreach ($arrayDeleteIt as $key => $value) {
                    $posicion = array_search($value,$array,true);
                    if($posicion !== false)
                            unset($array[$posicion]);
            }

            //Reindexamos los indices del array
            if(!$useOldKeys)
                    $array = array_values($array);
            return true;
    }
}


