<?php require_once'../view/header.php';?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Articulo</button>
                                        </div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Articulo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiar()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-3 col-form-label">Nombre del Articulo: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input type="hidden" name="id_articulo" id="id_articulo">
                                            <input class="form-control" type="text"  name="nombre" id="nombre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="descripcion" class="col-sm-3 col-form-label">Descripcion del Articulo: </label>
                                        <div class="col-sm-9 mt-2">
                                            <input class="form-control" type="text"  name="descripcion" id="descripcion">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                                                <label for="precio" class="col-sm-3 col-form-label">Precio Unitario: </label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number"  name="precio" id="precio">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Categoria</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="categoria" name="categoria">
                                            </select>
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
                            <div class="card" id="listadoregistros">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">Articulos</h4>

                                    <table class="table mb-0" id="tbllistado">
                                        <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Nombre</th>
                                            <th>Categoria</th>
                                            <th>Precio Unitario</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>

                                        <tbody></tbody>
                                    </table>

                                </div>
                            </div>
                     </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="col-sm-6 col-md-3 mt-4">
    <div class="text-center">
        <a href="../view/report/Report_articulo.pdf" target="_blank" class="btn btn-primary waves-effect waves-light">Generar Reporte</a>
    </div>
</div>


            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

<?php require_once'../view/footer.php';?>
<script type="text/javascript" src="../view/script/articulo.js"></script>

