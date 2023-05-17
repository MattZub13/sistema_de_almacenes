<?php 

//llamada al modelo
require_once "../model/Detalle_oficina.php";
$solicitud=new Solicitud();

//seteo de variable
$id_solicitud=isset($_POST["id_solicitud"])?$_POST["id_solicitud"]:"";

$placa_vehiculo=isset($_POST["placa_vehiculo"])? $_POST["placa_vehiculo"]:"";
$fecha_solicitud=isset($_POST["fecha_solicitud"])? $_POST["fecha_solicitud"]:"";


//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$solicitud->listar();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_solicitud'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_solicitud'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_solicitud'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_solicitud'].')">Activar</i></button>',
				"1"=>$reg['placa_vehiculo'],
                "2"=>$reg['fecha_solicitud'],
				"3"=>($reg['estado_solicitud'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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

		if (empty($id_solicitud)){
			$rspta=$solicitud->insertar($placa_vehiculo, $fecha_solicitud);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$solicitud->editar($id_solicitud,$placa_vehiculo,$fecha_solicitud);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del detalle_oficina
		$rspta=$solicitud->desactivar($id_solicitud);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3'://activacion del detalle_oficina
		$rspta=$solicitud->activar($id_solicitud);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4':
		$rspta=$solicitud->mostrar($id_solicitud);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
?>