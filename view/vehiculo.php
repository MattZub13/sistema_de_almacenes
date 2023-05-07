<?php require_once'../view/header.php';?>

<div class="wrapper">

    <div class="container-fluid"> <h4 class="mt-0 header-title">Registro de Vehiculos</h4> </div>

    <div class="container-fluid">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="rubberBand" data-target=".bs-example-modal-sm">Registro de los Vehiculos</button>
    </div>

    <br>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro Vehiculos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <div class="modal-body">
                    <form name="formulario" method="POST" id="formulario">
                        <input type="hidden" name="id_vehiculo" id="id_vehiculo">
                        <label for="tipo">Ingrese el tipo del Vehiculo</label>
                        <select class="form-control" name="tipo" id="tipo">
                            <option value="vagoneta">Vagoneta</option>
                            <option value="automovil">Automovil</option>
                        </select>
                        <br>

                        <label for="placa">Placa Vehiculo</label>
                        <input class="form-control" type="text" placeholder="Placa Vehiculo" name="placa" id="placa">
                        <br>
                        
                        <label for="example-date-input">Periodo Limite Surtidor</label>
                        <input class="form-control" type="date" value="2011-08-19" id="fecha" name="fecha">
                        <br>

                        <label for="ubicacion">Ingrese la ubicacion</label>
                        <select class="form-control" id="ubicacion" name="ubicacion">
                            
                        </select>

                        <br>

                        <div>
                            <button type="submit" class="btn btn-outline-primary waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>



    <div class="row">
        <div class="col-12">
            <div class="card" id="listadoregistros">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Default Datatable</h4>

                    <table class="table mb-0" id="tableLista">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Tipo Vehiculo</th>
                                <th>Placa Vehiculo</th>
                                <th>Periodo Surtidor Designado</th>
                                <th>Ubicacion Surtidor Designado</th>
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




<?php require_once'../view/footer.php';?>
<script src="../public/assets/pages/form-advanced.js"></script>

<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./script/vehiculo.js"></script>