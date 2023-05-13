<?php 

//llamada al modelo
require_once "../model/Vehiculo_surtidor.php";
$vehiculo=new VehiculoSurtidor();

//seteo de variable
$tipo=isset($_POST["tipo"])?$_POST["tipo"]:"";
$ubicacion=isset($_POST["ubicacion"])?$_POST["ubicacion"]:"";
$fecha=isset($_POST["fecha"])? $_POST["fecha"]:"";
$id_vs=isset($_POST["id_vs"])? $_POST["id_vs"]:"";

//obtencion de la operacion del .js
switch ($_GET["op"]){
	case '0'://obtencion de los datos para la tabla principal
		$rspta=$vehiculo->listar();
 		//Vamos a declarar un array
 		$data= Array();
		//se genera la tabla principal con los distintos campos
		while ($reg = pg_fetch_assoc($rspta)){
			$data[]=array(
				"0"=>'<button class="btn btn-warning waves-effect waves-light" onclick="mostrar('.$reg['id_vs'].')" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-sm">Editar</button>',
				"1"=>$reg['tipo_vehiculo'],
                "2"=>$reg['placa_vehiculo'],
                "3"=>$reg['fecha_limite'],
                "4"=>$reg['ubicacion_surtidor']
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

            if (empty($id_vs)){
                $rspta=$vehiculo->insertar($tipo,$ubicacion,$fecha);
                echo $rspta ? "1:El Vehiculo fué registrado" : "0:El Vehiculo no fué registrado";
            }else {
                $rspta=$vehiculo->editar($tipo,$ubicacion,$fecha,$id_vs);
                echo $rspta ? "1:El Vehiculo fué actualizado" : "0:El Vehiculo no fué actualizado";
    
            }
                
    break;
	case '2'://obtencion del registro x para la edicion del mismo
		$rspta=$vehiculo->mostrar($id_vs);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
}
?>