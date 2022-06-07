<div class="row mt-5">
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <h4>Registros de salidas</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="listaSalidas-tab" data-toggle="tab"
                                    href="#listaSalidas" role="tab" aria-controls="listaSalidas"
                                    aria-selected="true">Lista de registro de
                                    salidas</a>
                                <a class="nav-item nav-link" id="nuevoRegistro-tab" data-toggle="tab"
                                    href="#nuevoRegistro" role="tab" aria-controls="nuevoRegistro"
                                    aria-selected="false"> Nuevo registro </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="listaSalidas" role="tabpanel"
                                aria-labelledby="listaSalidas-tab">
                                <div class="row mt-3">
                                    <div class="col-sm">
                                        <table id="table_salidas" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Monto</th>
                                                    <th>Fecha Salida</th>
                                                    <th>Imagen</th>
                                                    <th>Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0; foreach ($registrosSalidas as $value) {                                                
                                                    echo '
                                                    <tr>
                                                        <td>'.$value['tipoSalida'].'</td>
                                                        <td>$'.$value['monto'].'</td>
                                                        <td>'.$value['fechaSalida'].'</td>
                                                        <td><img src="'.$value['facturaImg'].'" width="100"></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xlSalida'.$i.'"> Ver imagen </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade bd-example-modal-xlSalida'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <img src="'.$value['facturaImg'].'">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    ';
                                                    $i++;
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nuevoRegistro" role="tabpanel"
                                aria-labelledby="nuevoRegistro-tab">
                                <div class="row mt-3 d-flex justify-content-center">
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="tipoEntrada">Tipo de Salida</label>
                                                    <input type="text" class="input_txt form-control" id="tipoSalida">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="monto">Monto</label>
                                                    <input type="text" class="form-control dollarInputMask" id="montoSalida">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="fechaRegistro">Registro</label>
                                                    <input type="date" class="form-control" id="fechaRegistro">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="imagenSalida">Seleccione factura</label>
                                                    <input type="file" class="form-control-file" id="imagenSalida">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <img src="" id="previeSalida" alt="" width="200">
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <button type="button" hidden
                                                    class="btn btn-primary btn-block save_data_salida"> Guardar datos </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>