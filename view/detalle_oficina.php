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
        <h1 class="text-center" id="titulo" name="titulo"></h1>
        <br>
        <div class="card-body">

                                <h4 class="mt-0 header-title">Solicitudes al almacen X</h4>
                               
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Solicitud</button>
                                <br>   

                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="thead-default">
                                        <tr>
                                            <th>#</th>
                                            <th>Articulo</th>
                                            <th>Cantidad</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Marcadores</td>
                                            <td>23</td>
                                            <td><span class="badge badge-boxed  badge-success">Completado</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Paquetes de hojas</td>
                                            <td>2</td>
                                            <td><span class="badge badge-boxed  badge-warning">En proceso</span></td>                                                    
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Pizarra</td>
                                            <td>1</td>
                                            <td><span class="badge badge-boxed  badge-danger">Denegada</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
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
