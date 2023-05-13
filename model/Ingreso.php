<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Ingreso{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT i.id_ingreso,i.fecha_ingreso,p.nombre_proveedor 
       FROM ingreso i,proveedor p WHERE (i.id_proveedor=p.id_proveedor);";
      return ejecutarConsulta($sql);
    }

    public function insertar($id_proveedor)
    {
    
		$sql="INSERT INTO ingreso(id_proveedor)
        VALUES ('$id_proveedor');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_ingreso,$id_proveedor)
    {
    
		  $sql="UPDATE ingreso
          SET id_proveedor='$id_proveedor'
          WHERE id_ingreso='$id_ingreso';";
      return ejecutarConsulta($sql);
		
    }

    public function mostrar($id_ingreso)
  {
    $sql="SELECT i.id_ingreso,i.fecha_ingreso,p.nombre_proveedor 
    FROM ingreso i,proveedor p WHERE (i.id_proveedor=p.id_proveedor) AND (i.id_ingreso='$id_ingreso');";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function detalle($id_ingreso)
  {
    $sql="SELECT i.id_ingreso,a.id_articulo,a.nombre_articulo,d.cantidad FROM detalle_ingreso d,ingreso i,articulo a
    WHERE (d.id_ingreso='$id_ingreso') AND (i.id_ingreso=d.id_ingreso) AND (a.id_articulo=d.id_articulo);";
    return ejecutarConsulta($sql);
  }
}