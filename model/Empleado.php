<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";

Class Empleado{

    public function __construct()
    {
        
    }

    public function listar()
    {
      $sql="SELECT * FROM empleado;";
      return ejecutarConsulta($sql);
    }

    public function insertar($nombre, $apellidop,$apellidom,$correo)
    {
    
		$sql="INSERT INTO empleado(
            nombre, apellido_paterno, apellido_materno, correo_empleado)
           VALUES ('$nombre','$apellidop','$apellidom','$correo');";
		return ejecutarConsulta($sql);
		
    }

    public function editar($id_empleado,$nombre, $apellidop,$apellidom,$correo)
    {
    
		  $sql="UPDATE empleado
          SET  nombre='$nombre', apellido_paterno='$apellidop', apellido_materno='$apellidom', correo_empleado='$correo'
          WHERE id_empleado='$id_empleado';";
        return ejecutarConsulta($sql);
		
    }

    public function desactivar($id_empleado)
	{
      $sql="UPDATE empleado SET estado_empleado='0' WHERE id_empleado='$id_empleado'";
      return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($id_empleado)
	{
      $sql="UPDATE empleado SET estado_empleado='1' WHERE id_empleado='$id_empleado'";
      return ejecutarConsulta($sql);
	}

  public function mostrar($id_empleado)
  {
    $sql="SELECT * FROM empleado WHERE id_empleado = '$id_empleado'";
    return ejecutarConsultaSimpleFila($sql);
  }

  public function comprobar($correo,$password)
  {
    $sql="SELECT correo_empleado,password from empleado where correo_empleado='$correo' AND password='$password';";
    $rspta= ejecutarConsultaSimpleFila($sql);
    if ($rspta==false) {
      return 0;
    } else {
      return 1;
    }
    
  }
}