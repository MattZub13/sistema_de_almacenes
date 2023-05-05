<?php 
require_once "../model/Proveedor.php";

$proveedor=new Proveedor();

$id_proveedor=isset($_POST["id_proveedor"])? $_POST["id_proveedor"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$direccion=isset($_POST["direccion"])? $_POST["direccion"]:"";
$correo=isset($_POST["correo"])? $_POST["correo"]:"";


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

		if (empty($id_proveedor)){
			$rspta=$proveedor->insertar($nombre, $direccion, $correo);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$proveedor->editar($id_proveedor,$nombre,$direccion,$correo);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2':
		$rspta=$proveedor->desactivar($id_proveedor);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3':
		$rspta=$proveedor->activar($id_proveedor);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4':
		$rspta=$proveedor->mostrar($id_proveedor);
 		//Codificar el resultado utilizando json
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