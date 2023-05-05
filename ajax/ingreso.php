<?php 
require_once "../model/Ingreso.php";

$ingreso=new Ingreso();

$id_ingreso=isset($_POST["id_ingreso"])?$_POST["id_ingreso"]:"";
$id_proveedor=isset($_POST["id_proveedor"])?$_POST["id_proveedor"]:"";



switch ($_GET["op"]){
	case '0':
		$rspta=$ingreso->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_ingreso'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>',
				"1"=>$reg['nombre_proveedor'],
                "2"=>$reg['fecha_ingreso'],
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

		if (empty($id_ingreso)){
			$rspta=$ingreso->insertar($id_proveedor);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$ingreso->editar($id_ingreso,$id_proveedor);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '4':
		$rspta=$ingreso->mostrar($id_ingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

}
?>