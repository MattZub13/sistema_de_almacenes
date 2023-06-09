<?php 

//llamada al modelo
require_once "../model/Empleado.php";
$empleado=new Empleado();

//seteo de variable
$id_empleado=isset($_POST["id_empleado"])?$_POST["id_empleado"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$apellidop=isset($_POST["apellidop"])? $_POST["apellidop"]:"";
$apellidom=isset($_POST["apellidom"])? $_POST["apellidom"]:"";
$correo=isset($_POST["correo"])? $_POST["correo"]:"";
$password=isset($_POST["password"])? $_POST["password"]:"";
$oficina=isset($_POST["oficina"])? $_POST["oficina"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$empleado->listar();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_empleado'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_empleado'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_empleado'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_empleado'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_empleado'].')">Activar</i></button>',
				"1"=>$reg['nombre'],
                "2"=>$reg['apellido_paterno'],
                "3"=>$reg['apellido_materno'],
                "4"=>$reg['correo_empleado'],
				"5"=>$reg['nombre_oficina'],
				"6"=>($reg['estado_empleado'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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
	case '1'://insertacion o edicion del registro

		if (empty($id_empleado)){
			$rspta=$empleado->insertar($nombre, $apellidop, $apellidom,$correo,$oficina,$password);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$empleado->editar($id_empleado,$nombre,$apellidop,$apellidom,$correo,$oficina,$password);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del articulo
		$rspta=$empleado->desactivar($id_empleado);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3'://activacion del articulo
		$rspta=$empleado->activar($id_empleado);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$empleado->mostrar($id_empleado);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case '5':// comprueba si el correo y password son correctos
		$rspta=$empleado->comprobar($correo,$password);
 		//Codificar el resultado utilizando json
 		echo $rspta;
	break;
	case '6'://generacion de opcion para un select donde se lo requiera
		$rspta = $empleado->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<p>'.$reg['nombre'].' '.$reg['apellido_paterno'].' '.$reg['apellido_materno'].'</p><br>';
		}
		break;
	break;
	

}