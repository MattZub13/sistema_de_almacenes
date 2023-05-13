<?php
//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Almacen
{
    public function __construct()
    {

    }

    public function listar()
    {
        $sql = "SELECT a.id_almacen, a.nombre_almacen,a.direccion_almacen, a.telefono, a.responsable, a.capacidad, a.estado_almacen
        FROM almacen a";
        return ejecutarConsulta($sql);
    }

    public function insertar($nombre, $direccion, $telefono,$responsable, $capacidad)
    {
    
		$sql="INSERT INTO almacen(direccion_almacen,telefono,responsable,capacidad,nombre_almacen) VALUES ('$direccion','$telefono','$responsable',$capacidad,'$nombre');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_almacen,$nombre, $direccion, $telefono,$responsable, $capacidad)
    {
    
		  $sql="UPDATE almacen SET nombre_almacen='$nombre',direccion='$direccion',telefono='$telefono',responsable='$responsable', capacidad = '$capacidad' WHERE id_almacen='$id_almacen';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_almacen)
	{
		$sql="UPDATE almacen SET estado_almacen='0' WHERE id_almacen='$id_almacen'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_almacen)
	{
		$sql="UPDATE almacen SET estado_almacen ='1' WHERE id_almacen ='$id_almacen'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_almacen)
  {
    $sql="SELECT * FROM almacen WHERE id_almacen = '$id_almacen'";
    return ejecutarConsultaSimpleFila($sql);
  }
}

?>