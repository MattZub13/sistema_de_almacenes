<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Solicitud{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT a.id_solicitud, a.fecha_solicitud,a.estado_solicitud, c.placa_vehiculo
      FROM solicitud a, vehiculo c
      WHERE(a.id_vehiculo=c.id_vehiculo)";
      return ejecutarConsulta($sql);
    }

    public function detalle_articulo($id_oficina)
  {
    
    $sql="SELECT d.cantidad,  a.nombre_articulo
    FROM articulo a, detalle_oficina d
    WHERE(d.id_articulo=a.id_articulo) AND (id_oficina='$id_oficina');";
    return ejecutarConsulta($sql);
  }

    public function listar_solicitud_oficina($id_oficina)
    {
      $sql="SELECT s.id_solicitud,s.fecha_solicitud,s.id_empleado,s.estado_solicitud,e.id_empleado,e.nombre,e.apellido_paterno,e.apellido_materno
      FROM solicitud s,empleado e
      WHERE  (s.id_empleado=e.id_empleado)
      AND (s.id_oficina='$id_oficina') ;";
      return ejecutarConsulta($sql);
    }

    public function insertar($id_empleado, $id_oficina)
    {
    
		$sql="INSERT INTO solicitud(id_empleado,id_oficina) VALUES ('$id_empleado', '$id_oficina');";
		return ejecutarConsulta($sql);
		
    }

    public function insertar_detalle_oficina($id_solicitud,$id_sub_almacen,$id_articulo,$cantidad)
    {
      $sql="INSERT INTO detalle_solicitud(
        id_solicitud, id_sub_almacen,id_articulo, cantidad_solicitud)
        VALUES ('$id_solicitud','$id_sub_almacen','$id_articulo','$cantidad');";
      return ejecutarConsulta($sql);
    }

    public function listar_detalle_solicitud($id_solicitud)
    {
      $sql="SELECT d.id_solicitud,d.id_articulo,d.cantidad_solicitud,a.nombre_articulo
      FROM detalle_solicitud d,articulo a WHERE (d.id_articulo=a.id_articulo) AND (d.id_solicitud='$id_solicitud');";
      return ejecutarConsulta($sql);
    }

    public function editar($id_solicitud,$fecha_solicitud,$id_vehiculo)
    {
    
		  $sql="UPDATE solicitud SET fecha_solicitud='$fecha_solicitud',id_vehiculo='$id_vehiculo' WHERE id_solicitud='$id_solicitud';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_solicitud)
	{
		$sql="UPDATE solicitud SET estado_solicitud='0' WHERE id_solicitud='$id_solicitud'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_solicitud)
	{
		$sql="UPDATE solicitud SET estado_solicitud='1' WHERE id_solicitud='$id_solicitud'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_solicitud)
  {
    $sql="SELECT a.id_solicitud, a.fecha_solicitud, c.placa_vehiculo
    FROM solicitud a, vehiculo c
    WHERE(a.id_vehiculo=c.id_vehiculo) AND (a.id_solicitud='$id_solicitud')";
    return ejecutarConsultaSimpleFila($sql);
  }


  public function obtenerUltimoId()
{
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

public function completar($id_solicitud)
{
  $sql="UPDATE solicitud SET estado_solicitud='1' WHERE id_solicitud='$id_solicitud'";
  return ejecutarConsulta($sql);
}
}