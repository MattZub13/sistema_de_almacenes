<?php require_once'../view/header.php';?>

<div class="wrapper">
    
    <div class="container-fluid"> <h4 class="mt-0 header-title">Registro de Datos</h4> </div>

    <div class="container-fluid"> 
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Crear Categoria</button>
    </div>
    <br>
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="formulario" method="POST" id="formulario">
                            <input type="hidden" name="id_categoria" id="id_categoria">
                            <label for="nombre">Ingrese la Categoria Nueva</label>
                            <input class="form-control" type="text" placeholder="Nueva Categoria" name="nombre" id="nombre">
                                <br>
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light" id="btnGuardar">Guardar</button>
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
                                    <th>Nombre</th>
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
</div><!-- end wrapper -->

        

<div class="wrapper">
    
</div>
<?php require_once'../view/footer.php';?>
<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./script/categoria.js"></script>