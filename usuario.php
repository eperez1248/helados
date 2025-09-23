<?php
session_start();
$id_usuario = $_SESSION['id_usuarios'];

$sqlu = "SELECT clientes.nombre, clientes.apellidos, helados.sabor, helados.tamanio FROM clientes, compran, helados, usuarios WHERE clientes.id_cliente=compran.id_cliente AND compran.id_helado=helados.id_helado AND usuarios.id_usuarios=clientes.id_cliente AND usuarios.id_usuarios = '" . $id_usuario . "'";

$linku = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$arrayu = mysqli_query($linku, $sqlu);
echo 'Hola Usuario.';

 echo '<table border="1" cellpadding="5" cellspacing="0">';
  echo '<tr><th>Nombre</th><th>Apellidos</th><th>Sabor</th><th>Tamaño</th></tr>';
foreach ($arrayu as $valueu) {
    
    echo '<tr>';
    foreach ($valueu as $datou) {
        echo "<td>".$datou."</td>";        
    }
    echo '</tr>';
}
echo "</table>";

?>
