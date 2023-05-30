<?php 

//llamada al modelo
require_once "../model/Detalle_almacen.php";
$detalle=new Detalle_Almacen();


//seteo de variable
$id_detalle=isset($_POST["id_detalle"])?$_POST["id_detalle"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

$articulo=isset($_POST["articulo"])? $_POST["articulo"]:"";


$id_proveedor=isset($_POST["proveedor_solicitud"])? $_POST["proveedor_solicitud"]:"";
$id_articulo=isset($_POST["articulo_solicitud"])? $_POST["articulo_solicitud"]:"";
$id_solicitud=isset($_POST["id_solicitud"])? $_POST["id_solicitud"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$detalle->listar_detalle_almacen();
 		//Vamos a declarar un array
 		$data= Array();

		//se genera la tabla principal con los distintos campos
 		while ($reg = pg_fetch_assoc($rspta)){	
				$data[] = array('y' => $reg['nombre_articulo'], 'a' => $reg['cantidad']);
		}
		$json_data = json_encode($data);
		echo '<script>
		new Morris.Bar({
			element:"donut-example",
			data: '.$json_data.',
			xkey: "y",
			ykeys:"a",
			labels: "Series A"
		  });
						</script>';
		break;
	case '2'://desactivacion del articulo
		
		$rspta=$detalle->listar_solicitud_almacen();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="detalle_solicitud('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Detalle</button>',
                "1"=>$reg['fecha_solicitud'],
				"2"=>($reg['estado_solicitud'])?'<span class="badge badge-pill badge-outline-primary">Activado</span>':
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

	case '3'://activacion del articulo
		$rspta=$detalle->insertar_solicitud();
			echo $rspta ? "1:Empieza a añadir articulos a la solicitud" : "0:El Artículo no fué registrado";
	break;

	case '5':
		$rspta=$detalle->insertar_detalle_almacen($id_solicitud,$id_proveedor,$id_articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
	break;
	case '6':
		//Recibimos el idingreso
		$id=$_GET['id_solicitud'];

		$rspta = $detalle->listar_detalle_solicitud($id);
		echo '<thead style="background-color:#A9D0F5">
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                
                                </thead>';
		echo '<tr>';
        while ($reg = pg_fetch_assoc($rspta)){	
					echo '<td>'.$reg['nombre_articulo'].'</td>
					<td>'.$reg['cantidad_solicitud'].'</td></tr>';
					
				}
		echo '</tr>';
	break;

}
?>