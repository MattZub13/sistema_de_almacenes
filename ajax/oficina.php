<?php 
require_once "../model/Oficina.php";

$oficina=new Oficina();

$id_oficina=isset($_POST["id_oficina"])?$_POST["id_oficina"]:"";
$nombre=isset($_POST["nombre"])? $_POST["nombre"]:"";
$descripcion=isset($_POST["descripcion"])? $_POST["descripcion"]:"";
$ubicacion=isset($_POST["ubicacion"])? $_POST["ubicacion"]:"";
$telefono=isset($_POST["telefono"])? $_POST["telefono"]:"";


switch ($_GET["op"]){
	case '0':
		$rspta = $oficina->listar();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<div class="col-lg-4 ">
            <div class="card card-body text-center">
                <h4 class="card-title font-20 mt-0">'.$reg['nombre_oficina'].'</h4>
                <p class="font-13 text-muted">'.$reg['descripcion_oficina'].' </p>
                <a href="../view/detalle_oficina.php?id_oficina='.$reg['id_oficina'].'" value="'.$reg['id_oficina'].'" id="oficina_detalle" class="btn btn-primary waves-effect waves-light">Detalle</a>
            </div>
        </div>';
		}
		break;
	case '1':

		if (empty($id_oficina)){
			$rspta=$oficina->insertar($nombre, $descripcion, $ubicacion,$telefono);
			echo $rspta ? "1:El Artículo fué registrado" : "0:El Artículo no fué registrado";
		}else {
			$rspta=$oficina->editar($id_oficina,$nombre,$descripcion,$ubicacion,$telefono);
			echo $rspta ? "1:El Artículo fué actualizado" : "0:El Artículo no fué actualizado";

		}
			
	break;
	case '2':
		$rspta=$oficina->desactivar($id_oficina);
 		echo $rspta ? "1:El Artículo fué Desactivado" : "0:El Artículo no fué Desactivado";
	break;

	case '3':
		$rspta=$oficina->activar($id_oficina);
 		echo $rspta ? "1:El Artículo fué Activado" : "0:El Artículo no fué Activado";
	break;

	case '4':
		$rspta=$oficina->detalle_oficina(1);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;
	case '5':
		$rspta = $oficina->select();
		while ($reg = pg_fetch_assoc($rspta))
		{
			echo '<option value=' . $reg['id_oficina'] . '>' . $reg['nombre_oficina'] . '</option>';
		}
	break;
	

}
?>