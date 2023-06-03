<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Detalle_Almacen{

    public function __construct()
    {
        
    }

    public function listar_detalle_almacen()
    {
      $sql="SELECT d.cantidad,  a.nombre_articulo
      FROM articulo a, detalle_almacen d
      WHERE(d.id_articulo=a.id_articulo)";
      return ejecutarConsulta($sql);
    }

    public function listar_solicitud_almacen()
    {
      $sql="SELECT s.id_solicitud,s.fecha_solicitud,s.estado_solicitud
      FROM solicitud s
      WHERE (s.id_almacen=1) ;";
      return ejecutarConsulta($sql);
    }

    public function listar_detalle_solicitud($id_solicitud)
    {
      $sql="SELECT d.id_solicitud,d.id_articulo,d.cantidad_solicitud,a.nombre_articulo
      FROM detalle_solicitud d,articulo a WHERE (d.id_articulo=a.id_articulo) AND (d.id_solicitud='$id_solicitud');";
      return ejecutarConsulta($sql);
    }


    public function insertar_solicitud()
    {
    
		$sql="INSERT INTO solicitud(id_almacen) VALUES (1);";
		return ejecutarConsulta($sql);
		
    }

    public function insertar_detalle_almacen($id_solicitud,$id_proveedor,$id_articulo,$cantidad)
    {
      $sql="INSERT INTO detalle_solicitud(
        id_solicitud, id_proveedor,id_articulo, cantidad_solicitud)
        VALUES ('$id_solicitud','$id_proveedor','$id_articulo','$cantidad');";
      return ejecutarConsulta($sql);
    }


  public function obtenerUltimoId(){
    $sql = "SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1;";
    $resultado = ejecutarConsulta($sql);

    if ($resultado) {
        $ultimo_id = pg_fetch_result($resultado, 0, 0);     
        return $ultimo_id;
    } else {
        return false;
    }
  }

  public function completar($id_solicitud)
	{
		$sql="UPDATE solicitud SET estado_solicitud='1' WHERE id_solicitud='$id_solicitud'";
		return ejecutarConsulta($sql);
	}

}
