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

    public function insertar($placa_vehiculo, $fecha_solicitud, $id_vehiculo)
    {
    
		$sql="INSERT INTO solicitud(fecha_solicitud,id_vehiculo) VALUES ('$fecha_solicitud',$id_vehiculo);";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_solicitud,$placa_vehiculo,$fecha_solicitud,$id_vehiculo)
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
}
