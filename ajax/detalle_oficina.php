<?php 

//llamada al modelo
require_once "../model/Detalle_oficina.php";
$solicitud=new Solicitud();

//seteo de variable
$id_solicitud=isset($_POST["id_solicitud"])?$_POST["id_solicitud"]:"";

$id_empleado=isset($_POST["id_empleado"])? $_POST["id_empleado"]:"";
$id_oficina=isset($_POST["id_oficina"])? $_POST["id_oficina"]:"";

$id_sub_almacen=isset($_POST["id_sub_almacen"])? $_POST["id_sub_almacen"]:"";
$id_articulo=isset($_POST["id_articulo"])? $_POST["id_articulo"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";


//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$id=$_GET['id_oficina'];
		$rspta=$solicitud->listar_solicitud_oficina($id);
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="detalle_solicitud('.$reg['id_solicitud'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Detalle</button>',
				"1"=>$reg['nombre'].' '.$reg['apellido_paterno'].' '.$reg['apellido_materno'],
                "2"=>$reg['fecha_solicitud'],
				"3"=>($reg['estado_solicitud'])?'<span class="badge badge-pill badge-outline-primary">Completado</span>':
					'<span class="badge badge-pill badge-outline-danger">En proceso</span>'
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

			$rspta=$solicitud->insertar($id_empleado, $id_oficina);
			echo $rspta ? "1:Empieza a añadir articulos a la solicitud" : "0:El Artículo no fué registrado";
		
	break;
	case '2'://desactivacion del detalle_oficina
		
			$rspta=$solicitud->insertar_detalle_oficina($id_solicitud,$id_sub_almacen,$id_articulo,$cantidad);
			echo $rspta ? "1:El Artículo fué insertado" : "0:El Artículo no fué insertado";

	break;

	case '3':
		//Recibimos el idingreso
		$id=$_GET['id_solicitud'];

		$rspta = $solicitud->listar_detalle_solicitud($id);
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

	case '4':
		$rspta=$solicitud->mostrar($id_solicitud);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case '5':
		$rspta=$solicitud->obtenerUltimoId();
 		//Codificar el resultado utilizando json
 		echo ($rspta);
	break;

	case '6':
		$id=$_GET['id_oficina'];
		$rspta = $solicitud->detalle_articulo($id);
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

}
?>