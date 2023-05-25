<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Sub_almacen{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT s.id_sub_almacen, s.direccion_sub_almacen, s.capacidad_sub_almacen, o.nombre_oficina, s.estado_sub_almacen
      FROM sub_almacen s, oficina o
      WHERE(s.id_oficina=o.id_oficina)";
      return ejecutarConsulta($sql);
    }

    public function insertar($direccion, $capacidad, $id_oficina)
    {
    
		$sql="INSERT INTO sub_almacen(direccion_sub_almacen,capacidad_sub_almacen,id_oficina) VALUES ('$direccion','$capacidad','$id_oficina');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_sub_almacen,$direccion,$capacidad,$id_oficina)
    {
    
		  $sql="UPDATE sub_almacen SET direccion_sub_almacen='$direccion',capacidad_sub_almacen='$capacidad',id_oficina='$id_oficina' WHERE id_sub_almacen='$id_sub_almacen';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_sub_almacen)
	{
		$sql="UPDATE sub_almacen SET estado_sub_almacen='0' WHERE id_sub_almacen='$id_sub_almacen';";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_sub_almacen)
	{
		$sql="UPDATE sub_almacen SET estado_sub_almacen='1' WHERE id_sub_almacen='$id_sub_almacen'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_sub_almacen)
  {
    $sql="SELECT s.id_sub_almacen, s.direccion_sub_almacen, s.capacidad_sub_almacen, o.nombre_oficina,s.estado_sub_almacen
    FROM sub_almacen s, oficina o
    WHERE(s.id_oficina=o.id_oficina) AND (s.id_sub_almacen='$id_sub_almacen')";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function select_grafica($id_sub_almacen)
  {
    $sql="SELECT d.id_sub_almacen,d.id_articulo,a.nombre_articulo,d.cantidad 
    FROM detalle_subalmacen d,articulo a
    WHERE (d.id_articulo=a.id_articulo) AND (d.id_sub_almacen='$id_sub_almacen');";
		return ejecutarConsulta($sql);		
  }

  public function select()
  {
    $sql="SELECT * FROM sub_almacen;";
		return ejecutarConsulta($sql);	
  }	
}
