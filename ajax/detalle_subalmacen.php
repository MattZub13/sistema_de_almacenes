<?php 

//llamada al modelo
require_once "../model/Detalle_subalmacen.php";
$detalle=new Detalle_SubAlmacen();


//seteo de variable
$id_detalle=isset($_POST["id_detalle"])?$_POST["id_detalle"]:"";
$id_sub_almacen=isset($_POST["id_sub_almacen"])?$_POST["id_sub_almacen"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

$articulo=isset($_POST["articulo"])? $_POST["articulo"]:"";

$id_articulo=isset($_POST["articulo_solicitud"])? $_POST["articulo_solicitud"]:"";
$id_solicitud=isset($_POST["id_solicitud"])? $_POST["id_solicitud"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$id=$_GET['id_sub_almacen'];
		$rspta=$detalle->listar_solicitud_sub_almacen($id);
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="detalle_solicitud('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Editar</button>',
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
	case '1'://insertacion o edicion del registro
		
		if (empty($id_detalle)){
			$id=$_GET['id_sub_almacen'];	
			$rspta=$detalle->insertar($id,$articulo, $cantidad);
			echo $rspta ? "1:El Artículo fué agregado" : "0:El Artículo no fué agregado";
		}else {
			$rspta=$detalle->editar($id,$articulo,$cantidad,$id_detalle);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2'://desactivacion del articulo
		$rspta=$detalle->insertar_solicitud($id_sub_almacen);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
	break;

	case '3'://activacion del articulo
		$rspta=$detalle->insertar_detalle_sub_almacen($id_solicitud,$id_articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";
	break;

	case '4'://obtencion del registro x para la edicion del mismo
		$rspta=$detalle->mostrar($id_detalle);
 		echo json_encode($rspta);
	break;
    case '5'://generacion de opcion para un select donde se lo requiera
		$id=$_GET['id_sub_almacen'];
		$rspta = $detalle->detalle_articulo($id);
       //Vamos a declarar un array
 		$data= Array();

         //se genera la tabla principal con los distintos campos
          while ($reg = pg_fetch_assoc($rspta)){
             $data[]=array(
                 "0"=>$reg['nombre_articulo'],
                 "1"=>$reg['cantidad'],
                 );
         }
          $results = array(
              "sEcho"=>1, //Información para el datatables
              "iTotalRecords"=>count($data), //enviamos el total registros al datatable
              "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
              "aaData"=>$data);
          echo json_encode($results);
	
	break;


	case '6'://insertacion o edicion del registro
		
		if (empty($id_detalle)){
			$id=$_GET['id_sub_almacen'];	
			$rspta=$detalle->insertar($id,$articulo, $cantidad);
			echo $rspta ? "1:El Artículo fué agregado" : "0:El Artículo no fué agregado";
		}else {
			$rspta=$detalle->editar($id,$articulo,$cantidad,$id_detalle);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;

	case '7':
		$rspta=$detalle->obtenerUltimoId();
 		//Codificar el resultado utilizando json
 		echo ($rspta);
	break;
	case '8':
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