<?php 

//llamada al modelo
require_once "../model/Oficina.php";
$oficina=new Oficina();

//seteo de variable
$id_oficina=isset($_POST["id_oficina"])?$_POST["id_oficina"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$descripcion=isset($_POST["descripcion"])? $_POST["descripcion"]:"";
$ubicacion=isset($_POST["ubicacion"])? $_POST["ubicacion"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta = $oficina->listar();

		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta))
		{
							echo '<div class="col-lg-4">
						<div class="card card-body text-center">
							<h4 class="card-title font-20 mt-0">'.$reg['nombre_oficina'].'</h4>
							<p class="font-13 text-muted">'.$reg['descripcion_oficina'].'</p>
							<div id="chart-'.$reg['id_oficina'].'" class="pr-3" style="height: 250px;"></div>
							<a href="../view/detalle_oficina.php?id_oficina='.$reg['id_oficina'].'" value="'.$reg['id_oficina'].'" id="oficina_detalle" class="btn btn-primary waves-effect waves-light">Detalle</a>
						</div>
						</div>';

				// Crear el gráfico de dona
				//primero llamaos a gra como respuesta para los datos de la grafica
				$gra = $oficina->select_grafica($reg['id_oficina']);

				//procedemos a crear un array aumentando los datos al array con un while
				$data = array();
				while ($reg1 = pg_fetch_assoc($gra)) {
					$data[] = array('label' => $reg1['nombre_articulo'], 'value' => $reg1['cantidad']);
				}
				$json_data = json_encode($data);

				//se genera un script el cual llama a crear el grafico mediante la libreria
				echo '<script>
						new Morris.Donut({
							element: "chart-'.$reg['id_oficina'].'",
							data: '.$json_data.'
						});
						</script>';
				//por ultimo vaciamos el array para la proxima iteracion
				unset($data);
		}
		break;
	case '1'://insertacion o edicion del registro

		if (empty($id_oficina)){
			$rspta=$oficina->insertar($nombre, $descripcion, $ubicacion,$telefono);
			echo $rspta ? "1:La Oficina fué registrado" : "0:La Oficina no fué registrado";
		}else {
			$rspta=$oficina->editar($id_oficina,$nombre,$descripcion,$ubicacion,$telefono);
			echo $rspta ? "1:La Oficina fué actualizado" : "0:La Oficina no fué actualizado";

		}
			
	break;
	case '2'://desactivacion de la oficina
		$rspta=$oficina->desactivar($id_oficina);
 		echo $rspta ? "1:La Oficina fué Desactivado" : "0:La Oficina no fué Desactivado";
	break;

	case '3'://activacion de la oficina
		$rspta=$oficina->activar($id_oficina);
 		echo $rspta ? "1:Oficina Oficina fué Activado" : "0:Oficina Oficina no fué Activado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$id=$_GET['id_oficina'];
		$rspta=$oficina->detalle_oficina($id);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case '5'://generacion de opcion para un select donde se lo requiera
		$rspta = $oficina->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_oficina'] . '>' . $reg['nombre_oficina'] . '</option>';
		}
	break;
	case '6'://generacion de opcion para un select donde se lo requiera
		$id=$_GET['id_oficina'];
		$rspta = $oficina->detalle_empleado($id);
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<p>'.$reg['nombre'].' '.$reg['apellido_paterno'].' '.$reg['apellido_materno'].'</p>'.'<br>';
		}
	break;
	case '7'://generacion de opcion para un select donde se lo requiera
		$id=$_GET['id_oficina'];
		$rspta = $oficina->detalle_empleado($id);
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_empleado'] . '>' .$reg['nombre'].' '.$reg['apellido_paterno'].' '.$reg['apellido_materno']. '</option>';
		}
	break;
	case '8':
		$rspta=$oficina->listar_oficinas();
 		//Vamos a declarar un array
 		$data= Array();

		//se genera la tabla principal con los distintos campos
 		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>($reg['estado_oficina'])?'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_oficina'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.
					'<button class="btn btn-danger waves-effect waves-light" onclick="desactivar('.$reg['id_oficina'].')">Desactivar</i></button>':
					'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_oficina'].')">Editar</button>'.
					'<button class="btn btn-purple waves-effect waves-light" onclick="activar('.$reg['id_oficina'].')">Activar</i></button>',
				"1"=>$reg['nombre_oficina'],
                "2"=>$reg['ubicacion_oficina'],
                "3"=>$reg['telefono_oficina'],
				"4"=>($reg['estado_oficina'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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

	case '9'://obtencion del registro x para la edicion del mismo
		$rspta=$oficina->detalle_oficina($id_oficina);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	

}
?>