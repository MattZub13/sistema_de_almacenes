<?php 
require_once "../model/Surtidor.php";

$surtidor=new Surtidor();

$id_surtidor=isset($_POST["id_surtidor"])? $_POST["id_surtidor"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";
$ubicacion=isset($_POST["ubicacion"])? $_POST["ubicacion"]:"";



switch ($_GET["op"]){
	case '0':
		$rspta=$surtidor->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_surtidor'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_surtidor'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
				'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_surtidor'].')">Desactivar</i></button>':
				'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_surtidor'].')">Editar</button>'.
				'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_surtidor'].')">Activar</i></button>',
				"1"=>$reg['ubicacion_surtidor'],
				"2"=>$reg['telefono_surtidor'],
				"3"=>($reg['estado_surtidor'])?'<span class="badge badge-pill badge-outline-info">Activado</span>':
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
	case '1':
			if(empty($id_surtidor)){
				$rspta=$surtidor->insertar($telefono,$ubicacion);
				echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
			}else{
				$rspta=$surtidor->editar($id_surtidor,$telefono,$ubicacion);
				echo $rspta ? "1:surtidor Actualizada" : "0:surtidor no Actualizada";
			}
	break;
	case '2':
		$rspta=$surtidor->desactivar($id_surtidor);
		echo $rspta ? "1:La surtidor fué Desactivado" : "0:La surtidor no fué Desactivado";
	break;
	case '3':
		$rspta=$surtidor->activar($id_surtidor);
		echo $rspta ? "1:La surtidor fué Activada" : "0:La surtidor no fué Activada";
	break;
	case '4':
		$rspta=$surtidor->mostrar($id_surtidor);
		echo json_encode($rspta);
	break;
	
	case '5':
		$rspta = $surtidor->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_surtidor'] . '>' . $reg['ubicacion_surtidor'] . '</option>';
		}
	break;
}
?>