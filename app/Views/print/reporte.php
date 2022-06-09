<?php
function convertBase64($urlImage)
{
    $path =  $urlImage;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    echo  $base64;
}
?>

<link rel="stylesheet" href="<?= $url ?>/assets/vendors/bootstrap/dist/css/bootstrap.css" media="print">
<h1>Reporte Mensual </h1>

<div class="row">
    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entradas as $value) { ?>

                    <tr>
                        <td><?= $value["tipoEntrada"] ?></td>
                        <td><?= $value["monto"] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-6">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salidas as $value) { ?>

                    <tr>
                        <td><?= $value["tipoSalida"] ?></td>
                        <td><?= $value["monto"] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-sm-9 mx-auto">
        <img class="img-fluid" src="<?= convertBase64($path) ?>" alt="">
    </div>
</div>


