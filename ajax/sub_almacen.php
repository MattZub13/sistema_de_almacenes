<?php 

//llamada al modelos
require_once "../model/Sub_almacen.php";
$sub_almacen=new Sub_almacen();

//seteo de las variables
$id_sub_almacen=isset($_POST["id_sub_almacen"])?$_POST["id_sub_almacen"]:"";
$direccion=isset($_POST["direccion"])? $_POST["direccion"]:"";
$capacidad=isset($_POST["capacidad"])? $_POST["capacidad"]:"";
$oficina=isset($_POST["oficina"])? $_POST["oficina"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$sub_almacen->listar();
 		$data= Array();

		//se genera la tabla principal con los distintos campos
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
	case '1'://insertacion o edicion del registro

		if (empty($id_sub_almacen)){
			$rspta=$sub_almacen->insertar($direccion, $capacidad, $oficina);
			echo $rspta ? "1:El Sub-Almacen fué registrado" : "0:El Sub-Almacen no fué registrado";
		}else {
			$rspta=$sub_almacen->editar($id_sub_almacen,$direccion,$capacidad,$oficina);
			echo $rspta ? "1:El Sub-Almacen fué actualizado" : "0:El Sub-Almacen no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del subalmacen
		$rspta=$sub_almacen->desactivar($id_sub_almacen);
 		echo $rspta ? "1:El Sub-Almacen fué Desactivado" : "0:El Sub-Almacen no fué Desactivado";
	break;

	case '3'://activacion del subalmacen
		$rspta=$sub_almacen->activar($id_sub_almacen);
 		echo $rspta ? "1:El Sub-Almacen fué Activado" : "0:El Sub-Almacen no fué Activado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$sub_almacen->mostrar($id_sub_almacen);
 		echo json_encode($rspta);
	break;
	case '5':
		$rspta = $sub_almacen->listar();

		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta))
		{
							echo '<div class="col-lg-4">
						<div class="card card-body text-center">
							<h4 class="card-title font-20 mt-0">'.$reg['direccion_sub_almacen'].'</h4>
							<div id="chart-'.$reg['id_sub_almacen'].'" class="pr-3" style="height: 250px;"></div>
							<a href="#" value="'.$reg['id_sub_almacen'].'" id="oficina_detalle" class="btn btn-primary waves-effect waves-light">Detalle</a>
						</div>
						</div>';

				// Crear el gráfico de dona
				//primero llamaos a gra como respuesta para los datos de la grafica
				$gra = $sub_almacen->select_grafica($reg['id_sub_almacen']);

				//procedemos a crear un array aumentando los datos al array con un while
				$data = array();
				while ($reg1 = pg_fetch_assoc($gra)) {
					$data[] = array('label' => $reg1['nombre_articulo'], 'value' => $reg1['cantidad']);
				}
				$json_data = json_encode($data);

				//se genera un script el cual llama a crear el grafico mediante la libreria
				echo '<script>
						new Morris.Donut({
							element: "chart-'.$reg['id_sub_almacen'].'",
							data: '.$json_data.'
						});
						</script>';
				//por ultimo vaciamos el array para la proxima iteracion
				unset($data);
		}
	break;
	case '6'://generacion de opcion para un select donde se lo requiera
		$rspta = $sub_almacen->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_sub_almacen'] . '>' . $reg['direccion_sub_almacen'] . '</option>';
		}
	break;

}
?>