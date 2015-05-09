<?php
namespace modelos;

/**
 * @author Jorge Rodríguez <jergo23@gmail.com>
 */
class apps{
    
    public static $carpetas_no_apps = array( '.' , '..', 'home', 'apps');
    
    private static $file_name = 'texto_apps.txt';   //fichero donde está el texto
    private static $texto_apps = array();
    
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
    
    /**
     * Devuelve una texto concreto o todos
     * @param type $id
     * @return type
     */
    public static function get_texo_app($id = null) {
        self::leer_fichero();
        if($id!=null){
            return self::$texto_apps[$id];
        }else{
            return self::$texto_apps;
        }
    }
    
    /**
     * Lee las líneas del fichero, descarta la primera línea, y cada una
     * de ellas las guarda como un array dentro del array self::$texto_apps.
     */
    private static function leer_fichero(){
        $file_path = self::getRutaFichero();    //ruta del fichero
        self::$texto_apps = array();    //// Vaciamos el array por si tuviera datos de una lectura anterior.
        $lines = file($file_path, FILE_IGNORE_NEW_LINES); // Lee las líneas y genera un array de índice entero con una cadena de caracteres en cada entrada del array. FILE_IGNORE_NEW_LINES es una constante entera de valor 2 que hace que no se incluya en la líneas los caracteres de fin de línea y nueva línea.
        foreach($lines as $numero => $line){  //$numero++ en cada vuelta y lo guarda en $line
            $enlace = explode(";", $line);
            if($numero!=0){
                self::$texto_apps[$numero][self::$campo1] = $enlace[0];
                self::$texto_apps[$numero][self::$campo3] = $enlace[1];   //Se lee tb el "intro" (\n) del final de linea
            }
        }
    }
    
    /**
     * Para obtener la ruta del fichero
     * @return type
     */
    private static function getRutaFichero(){
        return PATH_APP."modelos/".self::$file_name;    //ruta del fichero
    }    
}


