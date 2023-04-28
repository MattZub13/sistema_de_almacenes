<?php 
require_once "../model/Categoria.php";

$categoria=new Categoria();

$id_categoria=isset($_POST["id_categoria"])? $_POST["id_categoria"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";



switch ($_GET["op"]){
	case '0':
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_categoria'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['id_categoria'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-info" onclick="reporte_detalle('.$reg['id_categoria'].')"><i class="fa fa-print"></i></button>'.
					'<button class="btn btn-danger" onclick="desactivar('.$reg['id_categoria'].')"><i class="bx bx-trash"></i></button>':
					'<button class="btn btn-warning" onclick="mostrar('.$reg['id_categoria'].')"><i class="bx bx-pencil"></i></button>'.
					'<button class="btn btn-info" onclick="reporte_detalle('.$reg['id_categoria'].')"><i class="fa fa-print"></i></button>'.
					'<button class="btn btn-primary" onclick="activar('.$reg['id_categoria'].')"><i class="bx bxs-check-square"></i></button>',
				"1"=>$reg['nombre_categoria'],
				"2"=>($reg['estado_categoria'])?'<span class="badge bg-primary">Activado</span>':
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
			$rspta=$categoria->insertar($nombre);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
	break;

}
?>