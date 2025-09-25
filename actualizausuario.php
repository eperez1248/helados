<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$id = intval($_POST['id_usuarios']);
$login = mysqli_real_escape_string($link, $_POST['login']);
$pass = mysqli_real_escape_string($link, $_POST['pass']);
$perfil = mysqli_real_escape_string($link, $_POST['perfil']);

$sql = "UPDATE usuarios SET login='$login', pass='$pass', perfil='$perfil' WHERE id_usuarios=$id";
mysqli_query($link, $sql);

echo "<p>Usuario actualizado correctamente.</p>";
echo "<p><a href='administrador.php'>Volver</a></p>";
?>
