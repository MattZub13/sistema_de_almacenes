<?php require_once'../view/header.php';?>

<div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <a href="../view/detalle_almacen.php" class="btn btn-primary waves-effect waves-light">Lista Almacen</a>
                </div>
                <div class="row">
                <div id="donut-example"></div>
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Almacen</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Almacen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 col-form-label">Nombre del Almacen: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_almacen" id="id_almacen">
                                            <input class="form-control" type="text"  name="nombre" id="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-sm-3 col-form-label">Direccion del Almacen: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="direccion" id="direccion">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-3 col-form-label">Telefono</label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="telefono" id="telefono">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="responsable" class="col-sm-3 col-form-label">Responsable</label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="responsable" id="responsable">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="capacidad" class="col-sm-3 col-form-label">Capacidad</label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="capacidad" id="capacidad">
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit" id="btnGuardar"> Guardar</button>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="row">
                        <div class="col-12">
                            <div class="card" id="listadoregistros">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Almacenes en lista</h4>

                                    <table class="table mb-0" id="tbllistado">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Responsable</th>
                                            <th>Capacidad</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
                     </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<?php require_once'../view/footer.php';?>
<script type="text/javascript" src="../view/script/almacen.js"></script>