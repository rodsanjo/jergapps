<div class="imagenWeb">
<?php
    $app = $datos['imagenWeb'];
    $src = 'recursos/imagenes/apps/web/'.$app.'.jpg';
    if( !file_exists($src) ){
        $src = URL_HOST."$app/recursos/imagenes/imagenWeb.jpg";
    }
?>
    <img title='<?php echo $app; ?>' src='<?php echo $src; ?>' alt='<?php echo $app; ?>'></img>
</div>
