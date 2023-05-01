<?php require_once'../view/header.php';?>

<div class="wrapper">


    <div class="container-fluid"> <h4 class="mt-0 header-title">Registro de Surtidores</h4> </div>

    <div class="container-fluid">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="rubberBand" data-target=".bs-example-modal-sm">Agregar Surtidor Nuevo</button>
    </div>
    <br>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Nuevo Surtidor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <div class="modal-body">
                    <form name="formulario" method="POST" id="formulario">
                        <input type="hidden" name="id_surtidor" id="id_surtidor">
                        <label for="ubicacion">Ingrese la ubicacion</label>
                        <input class="form-control" type="text" placeholder="Nuevo Surtidor" name="ubicacion" id="ubicacion" required>
                        <label for="telefono">Ingrese el numero de telefono</label>
                        <input class="form-control" type="tel" name="telefono" placeholder="Telefono" required>
                            <br>
                        <div>
                            <button type="submit" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2" id="btnGuardar"></i>Guardar</button>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <br>

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
</div>


<?php require_once'../view/footer.php';?>
<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./script/surtidor.js"></script>