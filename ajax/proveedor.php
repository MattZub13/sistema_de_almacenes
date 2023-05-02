<?php 
require_once "../model/Proveedor.php";

$proveedor=new Proveedor();

$id_proveedor=isset($_POST["id_proveedor"])? $_POST["id_proveedor"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";



switch ($_GET["op"]){
	case '0':
		$rspta=$proveedor->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_proveedor'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_proveedor'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
				'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_proveedor'].')">Desactivar</i></button>':
				'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_proveedor'].')">Editar</button>'.
				'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_proveedor'].')">Activar</i></button>',
				"1"=>$reg['nombre_proveedor'],
                "2"=>$reg['direccion_proveedor'],
                "3"=>$reg['correo_proveedor'],
				"4"=>($reg['estado_proveedor'])?'<span class="badge badge-pill badge-outline-info">Activado</span>':
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
			if(empty($id_proveedor)){
				$rspta=$proveedor->insertar($nombre);
				echo $rspta ? "1:El proveedor fué registrado" : "0:El proveedor no fué registrado";
			}else{
				$rspta=$proveedor->editar($id_proveedor,$nombre);
				echo $rspta ? "1:proveedor Actualizada" : "0:proveedor no Actualizada";
			}
	break;
	case '2':
		$rspta=$proveedor->desactivar($id_proveedor);
		echo $rspta ? "1:el proveedor fué Desactivado" : "0:el proveedor no fué Desactivado";
	break;
	case '3':
		$rspta=$proveedor->activar($id_proveedor);
		echo $rspta ? "1:el proveedor fué Activada" : "0:el proveedor no fué Activada";
	break;
	case '4':
		$rspta=$proveedor->mostrar($id_proveedor);
		echo json_encode($rspta);
	break;
	
	case '5':
		$rspta = $proveedor->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_proveedor'] . '>' . $reg['nombre_proveedor'] . '</option>';
		}
	break;
}
?>