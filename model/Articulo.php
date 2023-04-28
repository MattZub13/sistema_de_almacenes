<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Articulo{

    public function __construct()
    {
        
    }

    public function listar()
    {
        $sql="SELECT articulo.id_articulo,
        articulo.nombre,
        articulo.stock,
        articulo.descripcion,
        articulo.estado,
        articulo.precio_compra,
        articulo.id_almacen,
        categoria.nombre
        FROM Articulo articulo, Categoria categoria
        WHERE(articulo.id_categoria=categoria.id_categoria)";
        return ejecutarConsulta($sql);
    }

    public function insertar($id_articulo,$nombre,$stock,$descripcion,$estado,$precio_compra,$id_almacen,$id_categoria)
    {
    
		$sql="insert INTO Articulo VALUES ('$id_articulo','$nombre','$stock','$descripcion','$estado','$precio_compra','$id_almacen','$id_categoria');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_articulo,$nombre,$stock,$descripcion,$estado,$precio_compra,$id_almacen,$id_categoria)
    {
    
		$sql="UPDATE articulo SET nombre='$nombre', idcategoria='$id_categoria', stock='$stock', descripcion='$descripcion'
        , precio_compra='$precio_compra' WHERE id_articulo='$id_articulo';";
        return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_articulo)
	{
		$sql="UPDATE Articulo SET estado='0' WHERE id_articulo='$id_articulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_articulo)
	{
		$sql="UPDATE Articulo SET estado='1' WHERE id_articulo='$id_articulo'";
		return ejecutarConsulta($sql);
	}
}