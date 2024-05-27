<?php
include_once("conexion.php");

$conexion = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin']) && $_POST['btnLogin'] === 'Iniciar Sesion')
 {
    $usuario = $_POST['NombreUsuario'];
    $contrasenia = $_POST['Contrasenia'];

    $sql = "SELECT * FROM tusuario WHERE nombre = :usuario";
    $stmt = $conexion->conexion->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0)
    {       
        $datos = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($contrasenia == $datos['clave']) 
        {
            session_start();
            echo "Hola " . $usuario;
            exit;
        } 
        else
        {
            echo "Credenciales incorrectos.";
        }
    } 
    else 
    {
        echo "Usuario no registrado.";
    }
}

