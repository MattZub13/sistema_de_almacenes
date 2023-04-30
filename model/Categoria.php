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
		$validacion=$this->comprueba_duplicados($nombre,0);
		if($validacion==0){
			$sql="INSERT INTO categoria(nombre_categoria)VALUES('$nombre');";
			return ejecutarConsulta($sql);
		}else{
			return 0;
		}
		
	}
	

    public function editar($id_categoria,$nombre)
    {
    
		$validacion=$this->comprueba_duplicados($nombre,$id_categoria);
		if($validacion==0){
			$sql="UPDATE categoria SET nombre_categoria='$nombre' 
			WHERE id_categoria='$id_categoria';";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
		
    }

    public function desactivar($id_categoria)
	{
		$sql="UPDATE categoria SET estado_categoria='0' WHERE id_categoria='$id_categoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_categoria)
	{
		$sql="UPDATE categoria SET estado_categoria='1' WHERE id_categoria='$id_categoria'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($id_categoria)
	{
		$sql="SELECT * FROM categoria WHERE id_categoria='$id_categoria';";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT id_categoria, nombre_categoria FROM categoria 
		WHERE (estado_categoria=1) ORDER BY nombre_categoria ASC";
		return ejecutarConsulta($sql);		
	}

	public function comprueba_duplicados($codigo,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(id_categoria) AS id_categoria FROM categoria WHERE (nombre_categoria='$codigo') AND (id_categoria<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['id_categoria'];		
	}
}