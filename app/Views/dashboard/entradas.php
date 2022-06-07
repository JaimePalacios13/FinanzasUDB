<div class="row mt-5">
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">
                        <h4>Registros de entradas</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">Lista de registro de
                                    entrada</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">Nuevo registro</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="row mt-3">
                                    <div class="col-sm">
                                        <table id="table_id" class="display">
                                            <thead>
                                                <tr>
                                                    <th>Tipo</th>
                                                    <th>Monto</th>
                                                    <th>Fecha de registro</th>
                                                    <th>Imagen</th>
                                                    <th>Opcion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=0; foreach ($registrosEntradas as $value) {                                                
                                                    echo '
                                                    <tr>
                                                        <td>'.$value['tipoEntrada'].'</td>
                                                        <td>$'.$value['monto'].'</td>
                                                        <td>'.$value['fechaEntrada'].'</td>
                                                        <td><img src="'.$value['facturaImg'].'" width="100"></td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl'.$i.'"> Ver imagen </button>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade bd-example-modal-xl'.$i.'" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
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
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="row mt-3 d-flex justify-content-center">
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="tipoEntrada">Tipo de entrada</label>
                                                    <input type="text" class="input_txt form-control" id="tipoEntrada">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="monto">Monto</label>
                                                    <input type="text" class="form-control dollarInputMask" id="monto">
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
                                                    <label for="imagemEntrada">Seleccione factura</label>
                                                    <input type="file" class="form-control-file"
                                                        id="imagemEntrada">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <img src="" id="previeEntrada" alt="" width="200">
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <button type="button" hidden class="btn btn-primary btn-block save_data"> Guardar datos </button>
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