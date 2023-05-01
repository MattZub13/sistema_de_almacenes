<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Surtidor{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT id_surtidor, ubicacion_surtidor, telefono_surtidor,estado_surtidor FROM surtidor";
      return ejecutarConsulta($sql);
    }

    public function insertar($ubicacion,$telefono)
	{
		$validacion=$this->comprueba_duplicados($ubicacion,0);
		if($validacion==0){
			$sql="INSERT INTO surtidor(ubicacion_surtidor,telefono_surtidor)VALUES('$ubicacion','$telefono');";
			return ejecutarConsulta($sql);
		}else{
			return 0;
		}
		
	}
	

    public function editar($id_surtidor,$ubicacion,$telefono)
    {
    
		$validacion=$this->comprueba_duplicados($ubicacion,$id_surtidor);
		if($validacion==0){
			$sql="UPDATE surtidor SET ubicacion_surtidor='$ubicacion',telefono_surtidor='$telefono' 
			WHERE id_surtidor='$id_surtidor';";
			return ejecutarConsulta($sql);
		}
		else{return 0;}
		
    }

    public function desactivar($id_surtidor)
	{
		$sql="UPDATE surtidor SET estado_surtidor='0' WHERE id_surtidor='$id_surtidor'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_surtidor)
	{
		$sql="UPDATE surtidor SET estado_surtidor='1' WHERE id_surtidor='$id_surtidor'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($id_surtidor)
	{
		$sql="SELECT * FROM surtidor WHERE id_surtidor='$id_surtidor';";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function select()
	{
		$sql="SELECT id_surtidor, ubicacion_surtidor, telefono_surtidor FROM surtidor 
		WHERE (estado_surtidor=1) ORDER BY ubicacion_surtidor ASC";
		return ejecutarConsulta($sql);		
	}

	public function comprueba_duplicados($codigo,$id)
	{
		$resultado=0;
		$sql="SELECT COUNT(id_surtidor) AS id_surtidor FROM surtidor WHERE (ubicacion_surtidor='$codigo') AND (id_surtidor<>$id)";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['id_surtidor'];		
	}
}