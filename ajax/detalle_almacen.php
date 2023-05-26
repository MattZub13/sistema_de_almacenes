<?php 

//llamada al modelo
require_once "../model/Detalle_almacen.php";
$detalle=new Detalle_Almacen();


//seteo de variable
$id_detalle=isset($_POST["id_detalle"])?$_POST["id_detalle"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

$articulo=isset($_POST["articulo"])? $_POST["articulo"]:"";


$id_proveedor=isset($_POST["proveedor_solicitud"])? $_POST["proveedor_solicitud"]:"";
$id_articulo=isset($_POST["articulo_solicitud"])? $_POST["articulo_solicitud"]:"";
$id_solicitud=isset($_POST["id_solicitud"])? $_POST["id_solicitud"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$detalle->listar();
 		//Vamos a declarar un array
 		$data= Array();

		//se genera la tabla principal con los distintos campos
 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_detalle'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_detalle'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_detalle'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_detalle'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_detalle'].')">Activar</i></button>',
				"1"=>$reg['nombre_articulo'],
                "2"=>$reg['cantidad'],
				"3"=>($reg['estado_detalle'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
					'<span class="badge badge-pill badge-outline-danger">Desactivado</span>'
				);
		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
		break;
	case '1'://insertacion o edicion del registro

		if (empty($id_detalle)){
			$rspta=$detalle->insertar($articulo, $cantidad);
			echo $rspta ? "1:El Artículo fué agregado" : "0:El Artículo no fué agregado";
		}else {
			$rspta=$detalle->editar($id_detalle,$articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del articulo
		
		$rspta=$detalle->listar_solicitud_almacen();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="detalle_solicitud('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Editar</button>',
                "1"=>$reg['fecha_solicitud'],
				"2"=>($reg['estado_solicitud'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
					'<span class="badge badge-pill badge-outline-danger">Desactivado</span>'
				);
		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);
	break;

	case '3'://activacion del articulo
		$rspta=$detalle->insertar_solicitud();
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$detalle->mostrar($id_detalle);
 		echo json_encode($rspta);
	break;
	case '5':
		$rspta=$detalle->insertar_detalle_almacen($id_solicitud,$id_proveedor,$id_articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";
	break;
	case '6':
		//Recibimos el idingreso
		$id=$_GET['id_solicitud'];

		$rspta = $detalle->listar_detalle_solicitud($id);
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                
                                </thead>';
		echo '<tr>';
        while ($reg = pg_fetch_assoc($rspta)){	
					echo '<td>'.$reg['nombre_articulo'].'</td>
					<td>'.$reg['cantidad_solicitud'].'</td></tr>';
					
				}
		echo '</tr>';
	break;

}
?>