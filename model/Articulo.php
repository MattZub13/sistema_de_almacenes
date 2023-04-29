<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Articulo{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT a.id_articulo, a.nombre_articulo,a.descripcion_articulo,a.precio_unitario,a.estado_articulo, c.nombre_categoria
      FROM articulo a, categoria c
      WHERE(a.id_categoria=c.id_categoria)";
      return ejecutarConsulta($sql);
    }

    public function insertar($nombre, $descripcion,$precio_unitario, $id_categoria)
    {
    
		$sql="INSERT INTO articulo(nombre_articulo,descripcion_articulo,precio_unitario,id_categoria,id_almacen) VALUES ('$nombre','$descripcion','$precio_unitario',$id_categoria,'1');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_articulo,$nombre,$descripcion,$precio_unitario,$id_categoria)
    {
    
		  $sql="UPDATE articulo SET nombre='$nombre',',descripcion='$descripcion',
      precio_unitario='$precio_unitario','id_categoria'='$id_categoria' WHERE id_articulo='$id_articulo';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_articulo)
	{
		$sql="UPDATE articulo SET estado_articulo='0' WHERE id_articulo='$id_articulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_articulo)
	{
		$sql="UPDATE articulo SET estado_articulo='1' WHERE id_articulo='$id_articulo'";
		return ejecutarConsulta($sql);
	}

  public function mostrar($id_articulo)
  {
    $sql="SELECT a.id_articulo, a.nombre_articulo,a.descripcion_articulo,a.precio_unitario,a.estado_articulo, c.nombre_categoria
    FROM articulo a, categoria c
    WHERE(a.id_categoria=c.id_categoria) AND (a.id_articulo='$id_articulo')";
    return ejecutarConsulta($sql);
  }
}