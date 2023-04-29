<?php

//Nos conectamos a la base de datos
require_once "../config/Conexion.php";


Class Proveedor{

    public function __construct()
    {
        
    }

    public function listar(){

        
          $sql="SELECT a.id_proveedor, a.nombre_articulo,a.descripcion_articulo,a.precio_unitario,a.estado_articulo, c.nombre_categoria
          FROM articulo a, categoria c
          WHERE(a.id_categoria=c.id_categoria)";
          return ejecutarConsulta($sql);


    }
    
