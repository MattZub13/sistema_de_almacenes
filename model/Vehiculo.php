<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Vehiculo{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT v.id_vehiculo, v.tipo_vehiculo,v.placa_vehiculo,vs.fecha_limite,s.ubicacion_surtidor,v.estado_vehiculo
      FROM vehiculo v, surtidor s, vehiculo_surtidor vs
      WHERE(v.id_vehiculo=vs.id_vehiculo) AND (vs.id_surtidor=s.id_surtidor)";
      return ejecutarConsulta($sql);
    }
    public function insertar($tipo, $placa,$fecha, $ubicacion)
    {
        $sql = "SELECT id_surtidor FROM surtidor WHERE ubicacion_surtidor='$ubicacion';";
        $id_surtidor=ejecutarConsulta($sql);
        
        $sql ="INSERT INTO vehiculo(tipo_vehiculo,placa_vehiculo) VALUES('$tipo','$placa');
        SELECT id_vehiculo FROM vehiculo WHERE placa_vehiculo='$placa';";
        $id_vehiculo=ejecutarConsulta($sql);

        $sql ="INSERT INTO vehiculo_surtidor(id_vehiculo,id_surtidor,fecha_limite) VALUES ('$id_vehiculo','$id_surtidor','$fecha');";
        return ejecutarConsulta($sql);
        
		
    }

    
}
