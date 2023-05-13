<?php 
require_once "../model/Almacen.php";

$almacen=new Almacen();

$id_almacen=isset($_POST["id_almacen"])?$_POST["id_almacen"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$direccion=isset($_POST["direccion"])? $_POST["direccion"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";
$responsable=isset($_POST["responsable"])? $_POST["responsable"]:"";
$capacidad=isset($_POST["capacidad"])? $_POST["capacidad"]:"";


switch ($_GET["op"]){
	case '0':
		$rspta=$almacen->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_almacen'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_almacen'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_almacen'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_almacen'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_almacen'].')">Activar</i></button>',
				"1"=>$reg['nombre_almacen'],
                "2"=>$reg['direccion_almacen'],
                "3"=>$reg['telefono'],
				"4"=>$reg['responsable'],
				"5"=>$reg['capacidad'],
				"6"=>($reg['estado_almacen'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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

		if (empty($id_almacen)){
			$rspta=$almacen->insertar($nombre, $direccion, $telefono,$responsable, $capacidad);
			echo $rspta ? "1:El Almacen fue registrado" : "0:El Almacen no fue registrado";
		}else {
			$rspta=$almacen->editar($id_almacen,$nombre, $direccion, $telefono,$responsable, $capacidad);
			echo $rspta ? "1:El Almacen fue actualizado" : "0:El Almacen no fue actualizado";
		}
			
	break;
	case '2':
		$rspta=$almacen->desactivar($id_almacen);
 		echo $rspta ? "1:El Almacen fue desactivado" : "0:El Almacen no fue desactivado";
	break;

	case '3':
		$rspta=$almacen->activar($id_almacen);
 		echo $rspta ? "1:El almacen fue activado" : "0:El almacen no fue activado";
	break;

	case '4':
		$rspta=$almacen->mostrar($id_almacen);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
?>