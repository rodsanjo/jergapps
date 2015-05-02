<?php
namespace controladores;

class apps extends \core\Controlador {
	
    public function index(array $datos = array()) {
        
        $directorio = PATH_ROOT;
        $datos['apps'] = \modelos\apps::getCarpetas($directorio);
        
        //var_dump($datos);

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal',$datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }
    
    public function mostrarImagenWeb(array $datos = array(), $is_ajax = false){
        
        $get = \core\http_requerimiento::get();
        //var_dump($get);
        
        $post = \core\http_requerimiento::post();
        //var_dump($post);
        
        if(isset($get['p3']) && $get['p3'] == 'ajax'){
            $is_ajax = true;
        }
        if(isset($get['p4']) && !is_null($get['p4']) ){
            $datos['imagenWeb'] = $get['p4'];
        }
        
        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        
        if($is_ajax){
            echo $datos['view_content'];
        }else{
            return $datos['view_content'];
        }
        
        //$datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos);
        //$http_body = \core\Vista_Plantilla::generar('DEFAULT', $datos);
        //\core\HTTP_Respuesta::enviar($http_body);
    }    
	
	
} // Fin de la clase