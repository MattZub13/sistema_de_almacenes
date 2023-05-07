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
        $sql = "SELECT a.id_almacen, a.direccion_almacen, a.telefono, a.responsable, a.capacidad
        FROM almacen a";
        return ejecutarConsulta($sql);
    }

}

?>