<?php

session_start();

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta directa
$sql = "SELECT id_usuarios FROM usuarios WHERE login = '$login' AND pass = '$pass'";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_usuarios'] = $row['id_usuarios'];
    header("Location: perfil.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
