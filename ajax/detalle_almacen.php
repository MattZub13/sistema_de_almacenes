<?php 

//llamada al modelo
require_once "../model/Detalle_almacen.php";
$detalle=new Detalle_Almacen();


//seteo de variable
$id_detalle=isset($_POST["id_detalle"])?$_POST["id_detalle"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

$articulo=isset($_POST["articulo"])? $_POST["articulo"]:"";

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
		$rspta=$detalle->desactivar($id_detalle);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3'://activacion del articulo
		$rspta=$detalle->activar($id_detalle);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$detalle->mostrar($id_detalle);
 		echo json_encode($rspta);
	break;

}
?>