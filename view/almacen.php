<?php require_once'../view/header.php';?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="page-title-box">
                        <div class="col-sm-6 col-md-3  mt-4">
                                        <div class="text-center">
                                            <!-- Small modal -->
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Nuevo Almacen</button>
                                        </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Example</h4>
                                <p class="text-muted mb-4 font-13">This is an experimental awesome solution for responsive tables with complex data.</p>

                                <div class="table-rep-plugin">
                                    <div class="table-responsive b-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th>Nombre de Almacen</th>
                                                <th data-priority="1">Direccion</th>
                                                <th data-priority="3">Responsable</th>
                                                <th data-priority="1">Capacidad</th>
                                                <th data-priority="3">Telefono</th>
                                                <th data-priority="3">Opcionnes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>ALM-GRAL <span class="co-name">Almacen General</span></th>
                                                <td>Central UCB</td>
                                                <td>Lic. Pedro Perez</td>
                                                <td>762/1000</td>
                                                <td>6649792</td>
                                                <td><button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Ver Almacen</button></td>
                                            </tr>
                                            <tr>
                                                <th>SUB-CTRL <span class="co-name">Sub Almacen - Central</span></th>
                                                <td>Central UCB</td>
                                                <td>Lic. Carolina Sanchez</td>
                                                <td>430/500</td>
                                                <td>6649798</td>
                                                <td><button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Ver Almacen</button></td>
                                            </tr>
                                            <tr>
                                                <th>SUB-PSGRD <span class="co-name">Sub Almacen - Postgrado</span></th>
                                                <td>Postgrado UCB</td>
                                                <td>Lic. Mauricio Rosas</td>
                                                <td>200/600</td>
                                                <td>6658796</td>
                                                <td><button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Ver Almacen</button></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row --> 
<?php require_once'../view/footer.php';?>
<script type="text/javascript" src="../view/script/articulo.js"></script>

