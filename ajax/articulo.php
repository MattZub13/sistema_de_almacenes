<?php 
require_once "../model/Articulo.php";

$articulo=new Articulo();

$id_articulo=isset($_POST["id_articulo"])?$_POST["id_articulo"]:"";
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
				"0"=>($reg['estado_articulo'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_articulo'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
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

		if (empty($id_articulo)){
			$rspta=$articulo->insertar($nombre, $descripcion, $precio,$categoria);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$articulo->editar($id_articulo,$nombre,$descripcion,$precio,$categoria);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2':
		$rspta=$articulo->desactivar($id_articulo);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3':
		$rspta=$articulo->activar($id_articulo);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4':
		$rspta=$articulo->mostrar($id_articulo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case '5':
		$rspta = $articulo->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_articulo'] . '>' . $reg['nombre_articulo'] . '</option>';
		}
	break;

}
?>