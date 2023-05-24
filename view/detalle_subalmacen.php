<?php require_once'../view/header.php';?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="page-title-box">
                <div class="col-sm-6 col-md-3  mt-4">
                    <div class="text-center">
                        <!-- Small modal -->
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Añadir Articulo al Almacen</button>
                    </div>
                </div>
            </div>
        </div>


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
            <div class="col-12">
                <div class="card" id="listadoregistros">
                    <div class="card-body">

                    <h4 class="mt-0 header-title">Default Datatable</h4>

                    <table class="table mb-0" id="tbllistado">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>Articulos</th>
                                <th>Cantidad</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once'../view/footer.php';?>
<script type ="text/javascript" src="../view/script/detalle_subalmacen.js"></script>