<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Detalle_Almacen{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT d.id_detalle, d.cantidad, d.estado_detalle, a.nombre_articulo
      FROM articulo a, detalle_almacen d
      WHERE(d.id_articulo=a.id_articulo)";
      return ejecutarConsulta($sql);
    }

    public function insertar($id_articulo, $cantidad)
    {
    
		$sql="INSERT INTO detalle_almacen(id_articulo,cantidad) VALUES ('$id_articulo','$cantidad');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_detalle,$id_articulo,$cantidad)
    {
    
		  $sql="UPDATE detalle_almacen SET id_articulo='$id_articulo',cantidad='$cantidad' WHERE id_detalle='$id_detalle';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_detalle)
	{
		$sql="UPDATE detalle_almacen SET estado_detalle='0' WHERE id_detalle='$id_detalle'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_detalle)
	{
		$sql="UPDATE detalle_almacen SET estado_detalle='1' WHERE id_detalle='$id_detalle'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_detalle)
  {
    $sql="SELECT d.id_detalle, d.cantidad, d.estado_detalle, a.nombre_articulo
    FROM articulo a, detalle_almacen d
    WHERE(d.id_articulo=a.id_articulo) AND (d.id_detalle='$id_detalle')";
    return ejecutarConsultaSimpleFila($sql);
  }

}
