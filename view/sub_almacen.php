<?php require_once'../view/header.php';?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Gestionar Sub-Almacen</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" id="modal-body" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Gestionando Sub-Almacen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body" >
                                <form name="formulario" id="formulario" method="POST">
                                <input type="hidden" name="id_sub_almacen" id="id_sub_almacen">
                                    <label for="direccion">Ingrese la direccion del sub-almacen</label>
                                    <input class="form-control" type="text" placeholder="Ingrese la direccion" name="direccion" id="direccion" required>

                                    <label for="capacidad">Ingrese la capacidad del sub-almacen</label>
                                    <input class="form-control" type="number" name="capacidad" id="capacidad" placeholder="Capacidad del sub-alamcen" required>

                                    <label for="oficina">Oficina Designada</label>
                                    <select class="form-control" id="oficina" name="oficina">
                                    </select>
                                    
                                    <br>

                                    <div>
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

                <div class="row" id="subalmacen_row" >

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
                                            <th>Direccion</th>
                                            <th>Capacidad Sub-Almacen</th>
                                            <th>Oficina Designada</th>
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
<script type="text/javascript" src="../view/script/sub_almacen.js"></script>


