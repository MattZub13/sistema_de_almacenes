<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Proveedor{

    public function __construct()
    {
        
    }

    public function listar()
    {
        $sql="SELECT p.id_proveedor,
        p.nombre_proveedor, p.correo_proveedor,
        p.direccion_proveedor,A.id_almacen
        FROM Proveedor p, Almacen A
        WHERE(Proveedor.id_almacen=Almacen.id_almacen)";
        return ejecutarConsulta($sql);
	}
}