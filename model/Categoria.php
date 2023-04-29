<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Categoria{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT id_categoria, nombre_categoria, estado_categoria FROM categoria";
      return ejecutarConsulta($sql);
    }

    public function insertar($nombre)
	{
		$sql="INSERT INTO categoria(nombre_categoria)VALUES('$nombre');";
		return ejecutarConsulta($sql);
	}
	

    public function editar($id_categoria,$nombre,$estado)
    {
    
		$sql="UPDATE categoria SET nombre_categoria='$nombre', estado_categoria='$estado' WHERE id_categoria='$id_categoria';";
        return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_categoria)
	{
		$sql="UPDATE categoria SET estado='0' WHERE id_categoria='$id_categoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_categoria)
	{
		$sql="UPDATE categoria SET estado_categoria='1' WHERE id_categoria='$id_categoria'";
		return ejecutarConsulta($sql);
	}

	public function select()
	{
		$sql="SELECT id_categoria, nombre_categoria FROM categoria 
		WHERE (estado_categoria=1) ORDER BY nombre_categoria ASC";
		return ejecutarConsulta($sql);		
	}
}