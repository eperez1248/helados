<?php

include_once 'clases.php';

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

$miacceso = new conecta("localhost", "elena", "P@ssw0rd", "helados");
$miacceso->conecta();

if ($miacceso->autenticar($login, $pass)) {

    session_start();
    $_SESSION['id_usuario'] = $miacceso->id_usuario($login, $pass);

    header("Location: perfil.php");
} else {
    header("Location: index.php");
} 

