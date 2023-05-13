<?php require_once'../view/header.php';?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Ingreso</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Ingreso</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_ingreso" id="id_ingreso">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Proveedor</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_proveedor" name="id_proveedor">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Articulo</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="id_articulo" name="id_articulo">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cantidad" class="col-sm-3 col-form-label">Cantidad: </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" min="0" name="cantidad" id="cantidad">
                                        </div>
                                    </div>
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <td>Articulo</td>
                                                <td>Cantidad</td>
                                            </tr>
                                        </thead>
                                    </table>
                                    
                                    <div>
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0" id="mySmallModalLabel">Small modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <table class="table mb-0" id="detalles">
                                                    </table>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                <div class="row">
                        <div class="col-12">
                            <div class="card" id="listadoregistros">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Default Datatable</h4>

                                    <table class="table mb-0" id="tbllistado">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Nombre Proveedor</th>
                                            <th>Fecha del Ingreso</th>
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

<script src="../public/assets/pages/form-advanced.js"></script>

<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../view/script/ingreso.js"></script>

