<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];

//Conexion
$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

//Insertar en usuarios
$sql = "INSERT INTO usuarios (id_usuarios, login, pass, perfil) VALUES (NULL,'" . $login . "','" . $pass . "','1');";
$array = mysqli_query($link, $sql);

//Obtener el ID del usuario recien insertado
$sql2 = "SELECT id_usuarios FROM usuarios where login='" . $login . "' and pass='" . $pass . "'";
$resultado = mysqli_query($link, $sql2);
$fila = mysqli_fetch_assoc($resultado);
$id_usuario = $fila['id_usuarios'];

//Insertar en clientes
$sql = "INSERT INTO clientes (id_cliente, nombre, apellidos, telefono, id_usuarios) VALUES (NULL,'" . $nombre . "','" . $apellidos . "','666','" . $id_usuario. "')";
mysqli_query($link, $sql);

// Redirigir
header("Location: administrador.php");
?>
