<?php


//Nos conectamos a la base de datos
require_once "../config/Conexion.php";


Class Proveedor{

    public function __construct()
    {
        
    }

    public function listar(){

        $sql="SELECT *
      FROM proveedor";
        return ejecutarConsulta($sql);
      }

      
	public function mostrar($id_proveedor)
	{
		$sql="SELECT * FROM proveedor WHERE id_proveedor='$id_proveedor';";
		return ejecutarConsultaSimpleFila($sql);
	}



    } 
