<?php 

//llamada al modelo
require_once "../model/Dashboard.php";
require_once "../model/Oficina.php";
require_once "../model/Detalle_oficina.php";
$dashboard=new Dashboard();
$oficina=new Oficina();
$detalle=new Solicitud();

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta = $dashboard->grafica_solicitud();

				$data = array();
				while ($reg = pg_fetch_assoc($rspta)) {
					$data[] = array('label' => $reg['estado'], 'value' => $reg['count']);
				}
				$json_data = json_encode($data);

				//se genera un script el cual llama a crear el grafico mediante la libreria
				echo '<script>
						new Morris.Donut({
							element: "solicitud_donut",
							data: '.$json_data.'
						});
						</script>';
		
	break;
    case '1':
       $rspta=$dashboard->contar_empleado();
       echo json_encode($rspta);
    break;
    case '2':
        $rspta=$dashboard->contar_solicitud();
        echo json_encode($rspta);
    break;
	case '3':
        $rspta = $dashboard->proveedores();
        while ($reg = pg_fetch_assoc($rspta)){	
					echo '<tr>
                    <td class="border-top-0">
                        <div class="media">
                            <img src="../public/assets/images/users/avatar-2.jpg" alt="" class="thumb-md rounded-circle"> 
                            <div class="media-body ml-2">
                                <p class="mb-0">'.$reg['nombre_proveedor'].'</p>
                                <span class="font-12 text-muted">Proveedor de la universidad</span>
                            </div>
                        </div>                                                                            
                    </td> 
                    <td class="border-top-0 text-right">
                        <a href="../view/proveedor.php" class="btn btn-light btn-sm"><i class="far fa-comments mr-2 text-success"></i>Chat</a>
                    </td>                                                                        
                </tr>';
					
				}
    break;

    case '4':
       $rspta=$oficina->listar();
       
       while ($reg = pg_fetch_assoc($rspta)){	
        echo '<div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                                
                        <h5 class="header-title mb-4 mt-0">'.$reg['nombre_oficina'].'</h5>
                        <p class="mb-0">'.$reg['descripcion_oficina'].'</p><br>
                        <h6>Ultimas Solicitudes</h6>';
                        $tabla=$dashboard->solicitud_oficina($reg['id_oficina']);
                        while ($reg1 = pg_fetch_assoc($tabla)){
                            echo '<p class="mb-0">'.$reg1['nombre'].' '.$reg1['apellido_paterno'].' solicito
                            el <span>'.$reg1['fecha_solicitud'].'</span></p>';
                        }                
                                                
            echo    '
            <a href="../view/detalle_oficina.php?id_oficina='.$reg['id_oficina'].'" value="'.$reg['id_oficina'].'" id="oficina_detalle" class="btn btn-primary waves-effect waves-light mt-3">Detalle</a>
            </div>
                        </div>
                </div>';
        
    }
    break;

    case '5':
        $rspta=$dashboard->contar_articulo();
        echo json_encode($rspta);
    break;
}
?>