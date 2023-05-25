<?php 

//llamada al modelo
require_once "../model/Detalle_oficina.php";
$solicitud=new Solicitud();

//seteo de variable
$id_solicitud=isset($_POST["id_solicitud"])?$_POST["id_solicitud"]:"";

$id_empleado=isset($_POST["id_empleado"])? $_POST["id_empleado"]:"";
$id_oficina=isset($_POST["id_oficina"])? $_POST["id_oficina"]:"";

$id_sub_almacen=isset($_POST["id_sub_almacen"])? $_POST["id_sub_almacen"]:"";
$id_articulo=isset($_POST["id_articulo"])? $_POST["id_articulo"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";


//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$id=$_GET['id_oficina'];
		$rspta=$solicitud->listar_solicitud_oficina($id);
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_solicitud'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_solicitud'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_solicitud'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_solicitud'].')">Activar</i></button>',
				"1"=>$reg['nombre'].' '.$reg['apellido_paterno'].' '.$reg['apellido_materno'],
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
			$rspta=$solicitud->insertar($id_empleado, $id_oficina);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$solicitud->editar($id_solicitud,$id_empleado,$id_oficina);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del detalle_oficina
		
			$rspta=$solicitud->insertar_detalle_oficina($id_solicitud,$id_sub_almacen,$id_articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

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

	case '5':
		$rspta=$solicitud->obtenerUltimoId();
 		//Codificar el resultado utilizando json
 		echo ($rspta);
	break;

}
?>