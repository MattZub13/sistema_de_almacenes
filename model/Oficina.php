<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Oficina{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT *
      FROM oficina
      WHERE estado_oficina = '1';";
      return ejecutarConsulta($sql);
    }

    public function insertar($nombre, $descripcion,$ubicacion, $telefono)
    {
    
		$sql="INSERT INTO oficina(
            nombre_oficina, descripcion_oficina, 
            ubicacion_oficina, telefono_oficina)
            VALUES ('$nombre','$descripcion','$ubicacion','$telefono');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_oficina,$nombre, $descripcion,$ubicacion, $telefono)
    {
    
		  $sql="UPDATE oficina SET  nombre_oficina='$nombre', 
          descripcion_oficina='$descripcion', 
          ubicacion_oficina='$ubicacion', 
          telefono_oficina='$telefono'  WHERE id_oficina='$id_oficina';";
      return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_oficina)
	{
		$sql="UPDATE oficina SET estado_oficina='0' WHERE id_oficina='$id_oficina'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_oficina)
	{
		$sql="UPDATE oficina SET estado_oficina='1' WHERE id_oficina='$id_oficina'";
		return ejecutarConsulta($sql);
	}

  public function detalle_oficina($id_oficina)
  {
    $sql="SELECT o.id_oficina,o.nombre_oficina,o.descripcion_oficina,
    e.nombre,e.apellido_paterno,e.apellido_materno
    FROM oficina o,empleado e
    WHERE (o.id_oficina=e.id_oficina) AND (o.id_oficina='$id_oficina');";
    return ejecutarConsulta($sql);
  }

  
	public function select()
	{
		$sql="SELECT id_oficina, nombre_oficina FROM oficina 
		WHERE (estado_oficina=1) ORDER BY nombre_oficina ASC";
		return ejecutarConsulta($sql);		
	}
}

$oficina=new Oficina();

print_r($oficina->detalle_oficina(1));