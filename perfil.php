<?php
session_start();
if (!isset($_SESSION['id_usuarios'])) {
    header("Location: index.php");
    exit();
}

$id_usuario = $_SESSION['id_usuarios'];
$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");
$sql = "select * from usuarios where id_usuarios='" . $id_usuario . "'";
$array = mysqli_query($link, $sql);

foreach ($array as $value) {
    $perfil = $value['perfil'];

    echo $perfil;

    if ($perfil == '1') {
        header("Location: usuario.php");
    }
    if ($perfil == '2') {
        header("Location: administrador.php");
    }
    if ($perfil == '3') {
        header("Location: registrar_compra.php");
    }
}
?>