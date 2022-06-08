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
                            <div class="col-sm-6"> <input type="month" name="" id="fecha_inicio" class="form-control"></div>
                            <!--                             <div class="col-sm-6"> <input type="month" name="" id="fecha_fin" class="form-control"></div>
 -->
                            <div class="col-sm-6">
                                <a href="<?= base_url() ?>/print-reporte" class="btn btn-primary float-right">Imprimir reporte</a>
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

            </div>
        </div>

    </div>
</div>


<script src="<?= base_url() ?>/assets/js/reporte.js"></script>