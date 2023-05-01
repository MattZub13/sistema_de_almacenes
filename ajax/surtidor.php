<?php 
require_once "../model/Surtidor.php";

$surtidor=new Surtidor();

$id_surtidor=isset($_POST["id_surtidor"])? $_POST["id_surtidor"]:"";
$ubicacion=isset($_POST["ubicacion"])? $_POST["ubicacion"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";



switch ($_GET["op"]){
	case '0':
		$rspta=$surtidor->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_surtidor'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_surtidor'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Editar</button>'.
				'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_surtidor'].')"><i class="mdi mdi-power mr-2"></i>Desactivar</button>':
				'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_surtidor'].')">Editar</button>'.
				'<button class="btn btn-success waves-effect waves-light" onclick="activar('.$reg['id_surtidor'].')"><i class="mdi mdi-check-all mr-2"></i>Activar</button>',
				"1"=>$reg['ubicacion_surtidor'],
                "2"=>$reg['telefono_surtidor'],
				"3"=>($reg['estado_surtidor'])?'<span class="badge badge-primary">Activado</span>':
					'<span class="badge badge-danger">Desactivado</span>'
                    
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
				$rspta=$surtidor->insertar($ubicacion,$telefono);
				echo $rspta ? "1:El Surtidor fué registrado" : "0:El Surtidor no fué registrado";
			}else{
				$rspta=$surtidor->editar($id_surtidor,$ubicacion,$telefono);
				echo $rspta ? "1:Surtidor Actualizado" : "0:Surtidor no Actualizado";
			}
	break;
	case '2':
		$rspta=$surtidor->desactivar($id_surtidor);
		echo $rspta ? "1:El Surtidor fué Desactivado" : "0:El Surtidor no fué Desactivado";
	break;
	case '3':
		$rspta=$surtidor->activar($id_surtidor);
		echo $rspta ? "1:El Surtidor fué Activado" : "0:El Surtidor no fué Activado";
	break;
	case '4':
		$rspta=$surtidor->mostrar($id_surtidor);
		echo json_encode($rspta);
	break;
	
}
?>