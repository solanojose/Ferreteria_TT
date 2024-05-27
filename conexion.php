<?php
class Conexion{

    public $url = "mysql:host=localhost;dbname=db_ferreteria";
    public $usuario = "root";
    public $contrasenia = "";

    public function __construct(){
        try
        {
           $this->conexion = new PDO ($this->url, $this->usuario, $this->contrasenia);
        }
        catch (PDOException $ex)
        {
            echo "Error de conexion: " . $ex->getMessage();
        }
    } 
}

