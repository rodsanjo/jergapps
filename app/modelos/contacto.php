<?php
namespace modelos;

class contacto {
    /* Rescritura de propiedades de validación */
    public static $validaciones_insert = array(
        'nombre' => 'errores_requerido',
        'email' => 'errores_email',
        'phone' => 'errores_phone',
        'asunto' => 'errores_requerido && errores_texto',
        'mensaje' => 'errores_requerido',
    );
}
