<?php require_once'../view/header.php';?>

<div class="row" id="oficina_row">
    

</div>
<!-- end row -->
<div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nueva Oficina</button>
                                        </div>
                        </div>
                    </div>
<div class="row">
                        <div class="col-12">
                            <div class="card" id="listadoregistros">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Default Datatable</h4>

                                    <table class="table mb-0" id="tbllistado">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Nombre</th>
                                            <th>ubicacion</th>
                                            <th>telefono</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
                     </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"Oficina</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 col-form-label">Nombre de la oficina: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_oficina" id="id_oficina">
                                            <input class="form-control" type="text"  name="nombre" id="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-3 col-form-label">Descripcion de la oficina: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="descripcion" id="descripcion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ubicacion" class="col-sm-3 col-form-label">Ubicacion de la oficina: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="ubicacion" id="ubicacion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-3 col-form-label">Telefono de la oficina: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="number" min="0"  name="telefono" id="telefono">
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


<?php require_once'../view/footer.php';?>
<script src="../view/script/oficina.js"></script>