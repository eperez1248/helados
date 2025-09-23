<?php
session_start();
$id_usuario = $_SESSION['id_usuarios'];

$sqla = "SELECT usuarios.login, usuarios.pass, usuarios.perfil, clientes.nombre, clientes.apellidos FROM clientes, usuarios WHERE clientes.id_usuarios=usuarios.id_usuarios";

$linka = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$arraya = mysqli_query($linka, $sqla);
echo 'Hola Administrador.';

 echo '<table border="1" cellpadding="5" cellspacing="0">';
  echo '<tr><th>Login</th><th>Pass</th><th>Perfil</th><th>Nombre</th><th>Apellidos</th></tr>';
foreach ($arraya as $valuea) {
    
    echo '<tr>';
    foreach ($valuea as $datoa) {
        echo "<td>".$datoa."</td>";        
    }
    echo '</tr>';
}
echo "</table>";

?>
