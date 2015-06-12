<?php
namespace controladores;

class inicio extends \core\Controlador {
	
    public function index(array $datos = array()) {
        
        $directorio = PATH_ROOT;
        $datos['apps'] = \modelos\apps::getCarpetas($directorio);
        
        //var_dump($datos);

        $datos['view_content'] = \core\Vista::generar(__FUNCTION__, $datos, true);
        $http_body = \core\Vista_Plantilla::generar('plantilla_principal',$datos);
        \core\HTTP_Respuesta::enviar($http_body);
    }
    
    public function mostrar_imagen_web(array $datos = array(), $is_ajax = false){
        
        $post = \core\http_requerimiento::post();
        //var_dump($post);
        
        if(isset($post['is_ajax'])){
            $is_ajax = $post['is_ajax'];
        }
        if(isset($post['imagenWeb']) && !is_null($post['imagenWeb']) ){
            $datos['imagenWeb'] = $post['imagenWeb'];
        }else{
            $datos['imagenWeb'] = 'Imagen no disponible';
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