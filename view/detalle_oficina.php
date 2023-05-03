<?php require_once'../view/header.php';?>

<div class="row">
    <div class="col-lg-4">
    <div class="card">
            <div class="card-header">
                Informacion
            </div>
            <div class="card-body">
                <blockquote class=" quote">
                    <p class="font-13 text-muted">Descripcion de la oficina donde esta a que telefono llamar etc.</p>
                </blockquote>
            </div>
        </div>
        <br>
        <div class="table-responsive ">
            <table class="table mb-0 table-centered">
                <thead>
                    <tr>
                        <th>Empleado</th>                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Nombre del empleado
                        </td>
                                                
                    </tr>
                    <tr>
                        <td>
                            Se buscara concatenar los distintos campos de nombres y apellido
                        </td>
                                                
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-lg-8">
        <h1 class="text-center">Titulo de la oficina</h1>
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

<script src="../view/script/oficina.js"></script>
