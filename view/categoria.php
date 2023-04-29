<?php require_once'../view/header.php';?>

<div class="wrapper">
    <div class="container-fluid">

                <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right hide-phone">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-3">
                                <input class="knob" data-width="48" data-height="48" data-linecap=round data-fgColor="#605daf" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1"/>
                            </li>
                            <li class="list-inline-item">
                                        <span class="text-muted">Storage used</span>
                                        <h6>400GB/524.84GB</h6>
                            </li>
                        </ul>                                
                    </div>
                        <h4 class="page-title">Starter</h4>
                    <div class="btn-group mt-2">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="#">Zoogler</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active">Starter</li>
                        </ol>
                    </div>
                            
                </div>
            </div>
              
    </div> <!-- end container -->
    <div> <h4 class="mt-0 header-title">Registro de Datos</h4> </div>

    <div> 
    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Crear Categoria</button>
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
                            <label for="nombre">Ingrese la Categoria Nueva</label>
                            <input type="hidden" name="id_categoria" id="id_categoria">
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
                <div class="card-body">

                    <h4>Tabla de Datos</h4>

                    <table class="table mb-0" id="tableLista">
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th class="tabledit-toobar-column"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                        <td>asd</td>
                                      </tr>
                                    </tbody>
                        </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
        <!-- end wrapper -->

<?php require_once'../view/footer.php';?>
<script src="../public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="./script/categoria.js"></script>