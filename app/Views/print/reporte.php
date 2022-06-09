
<?php
echo $nombreImagen = base_url()."/assets/upload/finanzas1654619074.jpg";

function convertBase64($urlImage)
{
    $path =  $urlImage;

    $type = pathinfo($path, PATHINFO_EXTENSION);

    $data = file_get_contents($path);

    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    echo  $base64;
}

?>

<h1>Hola soy un reporte :v </h1>

<img src="<?=convertBase64($nombreImagen)?>" alt="">