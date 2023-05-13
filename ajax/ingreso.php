<?php 

//llamada al modelo
require_once "../model/Ingreso.php";
$ingreso=new Ingreso();

//seteo de variable
$id_ingreso=isset($_POST["id_ingreso"])?$_POST["id_ingreso"]:"";
$id_proveedor=isset($_POST["id_proveedor"])?$_POST["id_proveedor"]:"";



//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$ingreso->listar();
 		//Vamos a declarar un array
 		$data= Array();

		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_ingreso'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Editar</button>'.'<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" onclick="detalle('.$reg['id_ingreso'].')" data-target=".bs-example-modal-sm">detalle</button>',
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
	case '1'://insertacion o edicion del registro

		if (empty($id_ingreso)){
			$rspta=$ingreso->insertar($id_proveedor);
			echo $rspta ? "1:El Ingreso fué registrado" : "0:El Ingreso no fué registrado";
		}else {
			$rspta=$ingreso->editar($id_ingreso,$id_proveedor);
			echo $rspta ? "1:El Ingreso fué actualizado" : "0:El Ingreso no fué actualizado";

		}
			
	break;
	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$ingreso->mostrar($id_ingreso);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case '5':// se genera una tabla especifica por cada registro que se obtiene mediante el id
	//Recibimos el idingreso
		$id=$_GET['id_ingreso'];

		$rspta = $ingreso->detalle($id);
		$total=0;
		echo '<thead>
									<th>Artículo</th>
									<th>Cantidad</th>
								</thead>';

		while ($reg = pg_fetch_assoc($rspta)){	
					echo '<tr class="filas">
					<td>'.$reg['nombre_articulo'].'</td>
					<td>'.$reg['cantidad'].'</td></tr>';
				}
		break;

}
?>