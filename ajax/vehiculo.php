<?php 

//llamada al modelo
require_once "../model/Vehiculo.php";
$vehiculo=new Vehiculo();

//seteo de variable
$id_vehiculo=isset($_POST["id_vehiculo"])? $_POST["id_vehiculo"]:"";
$tipo=isset($_POST["tipo"])? $_POST["tipo"]:"";
$placa=isset($_POST["placa"])? $_POST["placa"]:"";


//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$vehiculo->listar();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_vehiculo'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_vehiculo'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
				'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_vehiculo'].')">Desactivar</i></button>':
				'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_vehiculo'].')">Editar</button>'.
				'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_vehiculo'].')">Activar</i></button>',
				"1"=>$reg['placa_vehiculo'],
				"2"=>$reg['tipo_vehiculo'],
				"3"=>($reg['estado_vehiculo'])?'<span class="badge badge-pill badge-outline-info">Activado</span>':
					'<span class="badge bg-danger">Desactivado</span>'
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
		if(empty($id_vehiculo)){
				$rspta=$vehiculo->insertar($tipo,$placa);
				echo $rspta ? "1:El vehiculo fué registrado" : "0:El vehiculo no fué registrado";
			}else{
				$rspta=$vehiculo->editar($id_vehiculo,$tipo,$placa);
				echo $rspta ? "1:vehiculo Actualizado" : "0:vehiculo no Actualizada";
			}
	break;
	case '2'://desactivacion del vehiculo
		$rspta=$vehiculo->desactivar($id_vehiculo);
		echo $rspta ? "1:El vehiculo fué Desactivado" : "0:El vehiculo no fué Desactivado";
	break;
	case '3'://activacion del vehiculo
		$rspta=$vehiculo->activar($id_vehiculo);
		echo $rspta ? "1:El vehiculo fué Activado" : "0:El vehiculo no fué Activado";
	break;
	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$vehiculo->mostrar($id_vehiculo);
		echo json_encode($rspta);
	break;
	
	case '5'://generacion de opcion para un select donde se lo requiera
		$rspta = $vehiculo->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_vehiculo'] . '>' . $reg['placa_vehiculo'] . '</option>';
		}
	break;
}
?>