<?php require_once'../view/header.php';?>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
                <div class="card-header">
                    Informacion
                    <div id="prueba">
                    </div>
                </div>
                <div class="card-body">
                    <blockquote class=" quote">
                        <p class="font-13 text-muted" id="descripcion"></p>
                    </blockquote>
                </div>
            </div>
            <br>
            
                            <div class="card">
                                <div class="card-header">
                                    Empleado
                                </div>
                                <div class="card-body" id="empleados">
                                </div>
                            </div>
                   

        
    </div>

    <div class="col-lg-8">
        <div id="titulo">
        <h1 class="text-center"></h1>
        </div>
        
        <br>
            <div class="card-body">

            <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nueva Solicitud</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
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
                                    <form name="formulario" id="formulario" method="POST">
                                    <input type="hidden" name="id_oficina" id="id_oficina">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Placa de Vehiculo:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="id_empleado" name="id_empleado">
                                                </select>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="form_detalle">
                                    <form name="detalle_form" id="detalle_form" method="POST">
                                    <input type="hidden" name="id_solicitud" id="id_solicitud">
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Placa de Vehiculo:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="id_sub_almacen" name="id_sub_almacen">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Placa de Vehiculo:</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="id_articulo" name="id_articulo">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="precio" class="col-sm-3 col-form-label">Precio Unitario: </label>
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
                                            <th>Vehiculo</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
                     </div> <!-- end col -->
                </div> <!-- end row -->
                                    
            </div>
                            
    </div>
</div>

<div class="row">
<div class="card-body">

<h4 class="mt-0 header-title">Inventario al almacen X</h4>

<br>   

<div class="table-responsive">
    <table class="table table-hover mb-0">
        <thead class="thead-default">
        <tr>
            
            <th>Articulo</th>
            <th>Cantidad</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            
            <td>Marcadores</td>
            <td>23</td>
            
        </tr>
        <tr>
           
            <td>Paquetes de hojas</td>
            <td>2</td>
                                                             
        </tr>
        <tr>
            
            <td>Pizarra</td>
            <td>1</td>
            
        </tr>
        </tbody>
    </table>
</div>

</div>
</div>


<?php require_once'../view/footer.php';?>

<script src="../view/script/detalle_oficina.js"></script>
