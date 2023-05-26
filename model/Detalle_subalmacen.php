<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Detalle_SubAlmacen{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT d.id_detalle, d.cantidad, d.estado_detalle, a.nombre_articulo,d.id_articulo
      FROM articulo a, detalle_subalmacen d
      WHERE(d.id_articulo=a.id_articulo)";
      return ejecutarConsulta($sql);
    }

    public function listar_solicitud_sub_almacen($id_sub_almacen)
    {
      $sql="SELECT s.id_solicitud,s.fecha_solicitud,s.estado_solicitud
      FROM solicitud s
      WHERE (s.id_sub_almacen='$id_sub_almacen') ;";
      return ejecutarConsulta($sql);
    }

    public function listar_detalle_solicitud($id_solicitud)
    {
      $sql="SELECT d.id_solicitud,d.id_articulo,d.cantidad_solicitud,a.nombre_articulo
      FROM detalle_solicitud d,articulo a WHERE (d.id_articulo=a.id_articulo) AND (d.id_solicitud='$id_solicitud');";
      return ejecutarConsulta($sql);
    }

    public function insertar($id,$id_articulo, $cantidad)
    {
    
		$sql="INSERT INTO detalle_subalmacen(id_sub_almacen,id_articulo,cantidad) VALUES ('$id','$id_articulo','$cantidad');";
		return ejecutarConsulta($sql);
		
    }

    public function insertar_solicitud($id_sub_almacen)
    {
    
		$sql="INSERT INTO solicitud(id_sub_almacen) VALUES ('$id_sub_almacen');";
		return ejecutarConsulta($sql);
		
    }


    public function insertar_detalle_sub_almacen($id_solicitud,$id_articulo,$cantidad)
    {
      $sql="INSERT INTO detalle_solicitud(
        id_solicitud, id_almacen,id_articulo, cantidad_solicitud)
        VALUES ('$id_solicitud',1,'$id_articulo','$cantidad');";
      return ejecutarConsulta($sql);
    }

    public function editar($id_detalle,$id,$id_articulo,$cantidad)
    {
    
		  $sql="UPDATE detalle_subalmacen SET id_sub_almacen='$id', id_articulo='$id_articulo',cantidad='$cantidad' WHERE id_detalle='$id_detalle';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_detalle)
	{
		$sql="UPDATE detalle_subalmacen SET estado_detalle='0' WHERE id_detalle='$id_detalle'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_detalle)
	{
		$sql="UPDATE detalle_subalmacen SET estado_detalle='1' WHERE id_detalle='$id_detalle'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_detalle)
  {
    $sql="SELECT d.id_detalle, d.cantidad, d.estado_detalle, a.nombre_articulo
    FROM articulo a, detalle_subalmacen d
    WHERE(d.id_articulo=a.id_articulo) AND (d.id_detalle='$id_detalle')";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function detalle_articulo($id_sub_almacen)
  {
    
    $sql="SELECT d.cantidad,  a.nombre_articulo
    FROM articulo a, detalle_subalmacen d
    WHERE(d.id_articulo=a.id_articulo) AND (id_sub_almacen='$id_sub_almacen');";
    return ejecutarConsulta($sql);
  }

  public function obtenerUltimoId(){
    $sql = "SELECT id_solicitud FROM solicitud ORDER BY id_solicitud DESC LIMIT 1;";
    $resultado = ejecutarConsulta($sql);

    if ($resultado) {
        $ultimo_id = pg_fetch_result($resultado, 0, 0);

        // Hacer algo con $ultimo_id
        // ...

        // Devolver el último id_solicitud insertado
        return $ultimo_id;
    } else {
        // Manejar el error en caso de que no se obtenga el último id_solicitud
        return false;
    }
  }

}

