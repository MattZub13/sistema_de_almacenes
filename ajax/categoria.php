<?php 

//llamada al modelo
require_once "../model/Categoria.php";
$categoria=new Categoria();

//seteo de variable
$id_categoria=isset($_POST["id_categoria"])? $_POST["id_categoria"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";


//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$categoria->listar();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){			
			$data[]=array(
				"0"=>($reg['estado_categoria'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_categoria'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
				'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_categoria'].')">Desactivar</i></button>':
				'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_categoria'].')">Editar</button>'.
				'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_categoria'].')">Activar</i></button>',
				"1"=>$reg['nombre_categoria'],
				"2"=>($reg['estado_categoria'])?'<span class="badge badge-pill badge-outline-info">Activado</span>':
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
	case '1'://insertacion o edicion del registro
		if(empty($id_categoria)){
				$rspta=$categoria->insertar($nombre);
				echo $rspta ? "1:La Categoria fué registrado" : "0:La Categoria no fué registrado";
			}else{
				$rspta=$categoria->editar($id_categoria,$nombre);
				echo $rspta ? "1:Categoria Actualizada" : "0:Categoria no Actualizada";
			}
	break;
	case '2'://desactivacion del articulo
		$rspta=$categoria->desactivar($id_categoria);
		echo $rspta ? "1:La Categoria fué Desactivada" : "0:La Categoria no fué Desactivado";
	break;
	case '3'://activacion del articulo
		$rspta=$categoria->activar($id_categoria);
		echo $rspta ? "1:La Categoria fué Activada" : "0:La Categoria no fué Activada";
	break;
	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$categoria->mostrar($id_categoria);
		echo json_encode($rspta);
	break;
	
	case '5'://generacion de opcion para un select donde se lo requiera
		$rspta = $categoria->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_categoria'] . '>' . $reg['nombre_categoria'] . '</option>';
		}
	break;
}
?>