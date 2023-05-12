
<?php require_once'../view/header.php';?>

<html>
<div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Proveedor</button>
                                        </div>
                        </div>
                    </div>
                </div>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 col-form-label">Nombre del Articulo: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_proveedor" id="id_proveedor">
                                            <input class="form-control" type="text"  name="nombre" id="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-sm-3 col-form-label">direccion del Articulo: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="direccion" id="direccion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="email" name="correo" id="correo">
                                            </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
    <br><table class="table table-bordered dt-responsive nowrap" id="tbllistado" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>nombre</th>
                                            <th>direccion</th>
                                            <th>correo</th>
                                            <th>almacen</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                                <div>
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                    </div>

                               </html>

<?php require_once'../view/footer.php';?>
<script type="text/javascript" src="../view/script/proveedor.js"></script>


