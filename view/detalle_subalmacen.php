<?php require_once'../view/header.php';?>

    
       


        <div class="modal fade bs-example-modal-center" id="modal-body" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Gestionando Lista Sub-   Almacen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <form name="formulario" id="formulario" method="POST">
                                <input type="hidden" name="id_detalle" id="id_detalle">
                            <label for="articulo">Lista de Articulos</label>
                                <select class="form-control" id="articulo" name="articulo">
                                </select>

                            <label for="cantidad">Ingrese la Cantidad</label>
                                <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Cantidad del articulo" required>

                                    
                            <br>

                            <div>
                                <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card" id="listadoregistros">
                    <div class="card-body">

                    <h4 class="mt-0 header-title">Articulos</h4>

                    <table class="table mb-0" id="tbllistado">
                        <thead>
                            <tr>    
                                <th>Articulos</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
            <div class="col-lg-6">
            <div class="page-tittle-box mb-4">
        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".solicitud">Nueva Solicitud</button>
                                        </div>
        </div>
    </div>
                            <div class="card" id="listadoregistros">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Solicitudes</h4>

                                    <table class="table mb-0" id="tbsolicitud">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
            </div> <!-- end col -->
        </div>

        
                <div class="modal fade bs-example-modal-center solicitud" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Solicitud</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="form_solicitud">
                                    <form name="formulario_solicitud" id="formulario_solicitud" method="POST">
                                    <input type="hidden" name="id_sub_almacen" id="id_sub_almacen">

                                        <div>
                                            <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardarSolicitud"></i>Empezar Solicitud</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="form_detalle">
                                    <form name="detalle_form" id="detalle_form" method="POST">
                                    <input type="hidden" name="id_solicitud" id="id_solicitud">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Articulo:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="articulo_solicitud" name="articulo_solicitud">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="precio" class="col-sm-3 col-form-label">Cantidad: </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" min="0" name="cantidad" id="cantidad">
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardarDetalle"></i>Guardar</button>
                                        </div>
                                    </form>
                                </div>
                               
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
                                <table class="table mb-0" id="detalles"></table>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

        
                


<?php require_once'../view/footer.php';?>
<script type ="text/javascript" src="../view/script/detalle_subalmacen.js"></script>