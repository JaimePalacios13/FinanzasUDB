<?php $fecha_actual = date("Y-m")?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Reportes
            </div>
            <div class="card-body">

                <div class="row mb-4">
                    <div class="col-sm-8 mx-auto">
                        <div class="row">
                        <form method="POST" action="<?= base_url() ?>/print-reporte" name="form" id="form">
                                    <input type="hidden" name="base64" id="base64" />

                            <div class="col-sm-6"> <input type="month" value="<?=$fecha_actual?>" name="" id="fecha_inicio" class="form-control"></div>
                            <div class="col-sm-6">

                                    <button type="submit" class="btn btn-primary float-right">
                                        Reporte PDF
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-sm-6">
                        <table class="table table-hover table-striped" id="table-entradas">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody id="data-entradas">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div class="col-sm-6">
                        <table class="table table-hover table-striped" id="table-salidas">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody id="data-salidas">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12 p-5" id="contiene_chart">
                        <canvas id="chart1" width="400" height="100"></canvas>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<script src="<?= base_url() ?>/assets/js/reporte.js"></script>
<script>
    // on the submit event, generate a image from the canvas and save the data in the textarea
    document.getElementById('form').addEventListener("submit", function() {
        var ctx = document.getElementById("chart1");

/*         var dataURL = ctx.toDataURL('image/jpg');
 */        var image = ctx.toDataURL('image/png'); // data:image/png....
        console.log(image);
        document.getElementById('base64').value = image;
    }, false);
</script>