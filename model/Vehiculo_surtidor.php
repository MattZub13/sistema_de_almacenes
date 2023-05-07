<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class VehiculoSurtidor{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT v.id_vehiculo,v.tipo_vehiculo,v.placa_vehiculo,v.estado_vehiculo,s.id_surtidor,s.ubicacion_surtidor,vs.fecha_limite,vs.id_vs
      FROM vehiculo v,surtidor s,vehiculo_surtidor vs
      WHERE (v.id_vehiculo=vs.id_vehiculo) AND (s.id_surtidor=vs.id_surtidor);";
      return ejecutarConsulta($sql);
    }

    public function insertar($id_vehiculo,$id_surtidor,$fecha)
	{
		
			$sql="INSERT INTO vehiculo_surtidor(
				id_vehiculo, id_surtidor, fecha_limite)
				VALUES ('$id_vehiculo','$id_surtidor','$fecha');";
			return ejecutarConsulta($sql);
		
	}
	

    public function editar($id_vehiculo,$id_surtidor,$fecha,$id_vs)
    {
			$sql="UPDATE vehiculo_surtidor
			SET id_vehiculo='$id_vehiculo', id_surtidor='$id_surtidor', fecha_limite='$fecha'
			WHERE id_vs='$id_vs';";
			return ejecutarConsulta($sql);	
    }


	public function mostrar($id_vs)
	{
		$sql="SELECT * FROM vehiculo_surtidor WHERE (id_vs='$id_vs');";
		return ejecutarConsultaSimpleFila($sql);
	}

}