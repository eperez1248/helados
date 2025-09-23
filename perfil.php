<?php

session_start();
$id_usuario=$_SESSION['id_usuario'];

$link = mysqli_connect("localhost", "elena", "P@ssw0rd","helados");
$sql = "select * from usuarios where id_usuarios='".$id_usuario."'";
$array= mysqli_query($link,$sql);
foreach ($array as $value){
    $perfil=$value['perfil'];
}

if ($perfil=='1'){
    header("Location: usuario.php");
    
}
if ($perfil=='2'){
    header("Location: administrador.php");
    
}
?>