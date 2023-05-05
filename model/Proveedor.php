<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Proveedor{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen,estado_proveedor
      FROM proveedor;";
      return ejecutarConsulta($sql);
    }

    public function insertar($nombre, $direccion,$correo_proveedor)
    {
    
		$sql="INSERT INTO proveedor(nombre_proveedor,direccion_proveedor,correo_proveedor,id_almacen) VALUES ('$nombre','$direccion','$correo_proveedor','1');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_proveedor,$nombre,$direccion,$correo_proveedor)
    {
    
		  $sql="UPDATE proveedor SET nombre_proveedor='$nombre',direccion_proveedor='$direccion',correo_proveedor='$correo_proveedor' WHERE id_proveedor='$id_proveedor';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_proveedor)
	{
		$sql="UPDATE proveedor SET estado_proveedor='0' WHERE id_proveedor='$id_proveedor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_proveedor)
	{
		$sql="UPDATE proveedor SET estado_proveedor='1' WHERE id_proveedor='$id_proveedor'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_proveedor)
  {
    $sql="SELECT id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen
      FROM proveedor WHERE id_proveedor='$id_proveedor';";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function select()
	{
		$sql="SELECT id_proveedor,nombre_proveedor FROM proveedor";
		return ejecutarConsulta($sql);		
	}
}
