<?php require_once'../view/header.php';?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Surtidor</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Surtidor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_surtidor" id="id_surtidor">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ubicacion" class="col-sm-3 col-form-label">ubicacion del Surtidor: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="ubicacion" id="ubicacion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-3 col-form-label">telefono del Surtidor: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="telefono" id="telefono">
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" id="listadoregistros">

                                <h4>Tabla de Datos</h4>

                                    <table class="table mb-0" id="tableLista">
                                        <thead>
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Ubicacion</th>
                                                <th>Telefono</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                    
                                            </tr>
                                        </tbody>
                                    </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<?php require_once'../view/footer.php';?>
<script type="text/javascript" src="../view/script/surtidor.js"></script>

