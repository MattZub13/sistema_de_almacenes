<?php 
require_once "../model/Articulo.php";

$articulo=new Articulo();

$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$descripcion=isset($_POST["descripcion"])? $_POST["descripcion"]:"";
$precio=isset($_POST["precio"])? $_POST["precio"]:"";
$categoria=isset($_POST["categoria"])? $_POST["categoria"]:"";


switch ($_GET["op"]){
	case '0':
		$rspta=$articulo->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_articulo'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_articulo'].')">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_articulo'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_articulo'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_articulo'].')">Activar</i></button>',
				"1"=>$reg['nombre_articulo'],
                "2"=>$reg['nombre_categoria'],
                "3"=>$reg['precio_unitario'],
				"4"=>($reg['estado_articulo'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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
			$rspta=$articulo->insertar($nombre, $descripcion, $precio,$categoria);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
	break;

}
?>