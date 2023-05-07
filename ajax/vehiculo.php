<?php 
require_once "../model/Vehiculo.php";
require_once "../model/Vehiculo_Surtidor.php";

$vehiculo=new Vehiculo();

$id_vehiculo=isset($_POST["id_vehiculo"])?$_POST["id_vehiculo"]:"";
$tipo=isset($_POST["tipo"])? $_POST["tipo"]:"";
$placa=isset($_POST["placa"])? $_POST["placa"]:"";
$fecha=isset($_POST["fecha"])? $_POST["fecha"]:"";
$ubicacion=isset($_POST["ubicacion"])? $_POST["ubicacion"]:"";


switch ($_GET["op"]){
	case '0':
		$rspta=$vehiculo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_vehiculo'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_vehiculo'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_vehiculo'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_vehiculo'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_vehiculo'].')">Activar</i></button>',
				"1"=>$reg['tipo_vehiculo'],
                "2"=>$reg['placa_vehiculo'],
                "3"=>$reg['fecha_limite'],
                "4"=>$reg['ubicacion_surtidor'],
				"5"=>($reg['estado_vehiculo'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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
	case '1':

		if (empty($id_vehiculo)){
			$rspta=$vehiculo->insertar($tipo, $placa, $fecha,$ubicacion);
			echo $rspta ? "1:El Vehiculo fué registrado" : "0:El Vehiculo no fué registrado";
		}else {
			$rspta=$vehiculo->editar($id_vehiculo,$tipo,$placa,$fecha,$ubicacion);
			echo $rspta ? "1:El Vehiculo fué actualizado" : "0:El Vehiculo no fué actualizado";

		}
			
	break;
	case '2':
		$rspta=$vehiculo->desactivar($id_vehiculo);
 		echo $rspta ? "1:El Vehiculo fué Desactivado" : "0:El Vehiculo no fué Desactivado";
	break;

	case '3':
		$rspta=$vehiculo->activar($id_vehiculo);
 		echo $rspta ? "1:El Vehiculo fué Activado" : "0:El Vehiculo no fué Activado";
	break;

	case '4':
		$rspta=$vehiculo->mostrar($id_vehiculo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
?>