<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Vehiculo{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT * FROM vehiculo";
      return ejecutarConsulta($sql);
    }

    public function insertar($tipo,$placa)
	{
			$sql="INSERT INTO vehiculo(
                tipo_vehiculo, placa_vehiculo)
                VALUES ('$tipo','$placa');";
			return ejecutarConsulta($sql);
	
	}
	

    public function editar($id_vehiculo,$tipo,$placa)
    {
    
		
			$sql="UPDATE vehiculo SET tipo_vehiculo='$tipo', placa_vehiculo='$placa'
			WHERE id_vehiculo='$id_vehiculo';";
			return ejecutarConsulta($sql);		
    }

    public function desactivar($id_vehiculo)
	{
		$sql="UPDATE vehiculo SET estado_vehiculo='0' WHERE id_vehiculo='$id_vehiculo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_vehiculo)
	{
		$sql="UPDATE vehiculo SET estado_vehiculo='1' WHERE id_vehiculo='$id_vehiculo'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($id_vehiculo)
	{
		$sql="SELECT * FROM vehiculo WHERE id_vehiculo='$id_vehiculo';";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT id_vehiculo, placa_vehiculo FROM vehiculo 
		WHERE (estado_vehiculo=1) ORDER BY placa_vehiculo ASC";
		return ejecutarConsulta($sql);		
	}

}