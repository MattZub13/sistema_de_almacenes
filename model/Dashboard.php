<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Dashboard{

    public function __construct()
    {
        
    }

    public function grafica_solicitud(){
        $sql="SELECT
        CASE WHEN estado_solicitud = 1 THEN 'Completado' ELSE 'En proceso' END AS estado,
        COUNT(*) AS count
      FROM
        solicitud
      GROUP BY
        estado_solicitud;
      ";
        return ejecutarConsulta($sql);
    }

    public function contar_empleado(){
        $sql="SELECT COUNT(*) AS total
        FROM empleado;";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function contar_solicitud(){
        $sql="SELECT COUNT(*) AS total
        FROM solicitud WHERE estado_solicitud=0;";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function contar_articulo(){
        $sql="SELECT COUNT(*) AS total
        FROM articulo WHERE estado_articulo=1;";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function proveedores()
    {
        $sql="SELECT * FROM proveedor WHERE estado_proveedor=1";
        return ejecutarConsulta($sql);
    }

    public function solicitud_oficina($id_oficina)
    {
        $sql="SELECT s.fecha_solicitud,s.id_oficina,s.estado_solicitud,e.nombre,e.apellido_paterno,e.apellido_materno,e.id_oficina
        FROM solicitud s,empleado e WHERE (s.id_oficina=e.id_oficina) AND (s.id_oficina='$id_oficina')
        ORDER BY s.estado_solicitud DESC
        LIMIT 3;";
        return ejecutarConsulta($sql);
    }

}
