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
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Solicitud</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                <input type="hidden" name="id_articulo" id="id_articulo">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Placa de Vehiculo:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="placa_vehiculo" name="nombre">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-3 col-form-label">Fecha: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="date"  name="date" id="fecha_solicitud">
                                        </div>
                                    </div>

                                    <div>
                                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                                    </div>

                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                                <thead style="background-color:##605daf">
                                                        <th>Opciones</th>
                                                        <th>Tipo Vehiculo</th>
                                                        <th>Placa vehiculo</th>

                                                    </thead>
                                                    <tr>
                                                        <th>x</th>
                                                        <th>Camioneta</th>
                                                        <th>3124ED</th>
                                                    </tr>
                                                    <tr>
                                                        <th>x</th>
                                                        <th>Camioneta</th>
                                                        <th>3124ED</th>
                                                    </tr>
                                                    <tr>
                                                        <th>x</th>
                                                        <th>Camioneta</th>
                                                        <th>3124ED</th>
                                                    </tr>
         
                                                    <!-- <tfoot>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><h4 id="total">0</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                                                    </tfoot> -->
                                                    <tbody>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>  
                                </form>
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
