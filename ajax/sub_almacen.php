<?php 
require_once "../model/Sub_almacen.php";

$sub_almacen=new Sub_almacen();

$id_sub_almacen=isset($_POST["id_sub_almacen"])?$_POST["id_sub_almacen"]:"";
$direccion=isset($_POST["direccion"])? $_POST["direccion"]:"";
$capacidad=isset($_POST["capacidad"])? $_POST["capacidad"]:"";
$oficina=isset($_POST["oficina"])? $_POST["oficina"]:"";


switch ($_GET["op"]){
	case '0':
		$rspta=$sub_almacen->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_sub_almacen'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_sub_almacen'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center"><i class="mdi mdi-send mr-2"></i>Editar</button>    '.
					'    <button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_sub_almacen'].')"><i class="mdi mdi-power mr-2"></i>Desactivar</button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_sub_almacen'].')"><i class="mdi mdi-send mr-2"></i>Editar</button>'.
					'     <button class="btn btn-success wave	s-effect waves-light" onclick="activar('.$reg['id_sub_almacen'].')"><i class="mdi mdi-check-all mr-2"></i>Activar</button>',
				"1"=>$reg['direccion_sub_almacen'],
                "2"=>$reg['capacidad_sub_almacen'],
                "3"=>$reg['nombre_oficina'],
				"4"=>($reg['estado_sub_almacen'])?'<span class="badge badge-pill badge-primary">Activado</span>':
					'<span class="badge badge-pill badge-danger">Desactivado</span>'
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

		if (empty($id_sub_almacen)){
			$rspta=$sub_almacen->insertar($direccion, $capacidad, $oficina);
			echo $rspta ? "1:El Sub-Almacen fué registrado" : "0:El Sub-Almacen no fué registrado";
		}else {
			$rspta=$sub_almacen->editar($id_sub_almacen,$direccion,$capacidad,$oficina);
			echo $rspta ? "1:El Sub-Almacen fué actualizado" : "0:El Sub-Almacen no fué actualizado";

		}
			
	break;
	case '2':
		$rspta=$sub_almacen->desactivar($id_sub_almacen);
 		echo $rspta ? "1:El Sub-Almacen fué Desactivado" : "0:El Sub-Almacen no fué Desactivado";
	break;

	case '3':
		$rspta=$sub_almacen->activar($id_sub_almacen);
 		echo $rspta ? "1:El Sub-Almacen fué Activado" : "0:El Sub-Almacen no fué Activado";
	break;

	case '4':
		$rspta=$sub_almacen->mostrar($id_sub_almacen);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
?>