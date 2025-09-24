<?php

session_start();

$sqla = "SELECT usuarios.login, usuarios.pass, usuarios.perfil, clientes.nombre, clientes.apellidos FROM clientes, usuarios WHERE clientes.id_usuarios=usuarios.id_usuarios";

$linka = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$arraya = mysqli_query($linka, $sqla);
echo '<p>Hola Administrador.</p>';

echo '<p>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr><th>Login</th><th>Pass</th><th>Perfil</th><th>Nombre</th><th>Apellidos</th></tr>';
foreach ($arraya as $valuea) {

    echo '<tr>';
    foreach ($valuea as $datoa) {
        echo "<td>" . $datoa . "</td>";
    }
    echo '</tr>';
}
echo "</table>";
echo '<p></p>';

echo '<p>';
echo "<form action='graba.php'><table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><td>login <input type='text' name='login'/></td></tr>";
echo "<tr><td>pass <input type='text' name='pass'/></td></tr>";
echo "<tr><td>nombre <input type='text' name='nombre'/></td></tr>";
echo "<tr><td>apellidos <input type='text' name='apellidos'/></td></tr>";
echo "<tr><td><input type='submit' value='nuevo usuario'/></td></tr></table>";
echo "</form>";
echo '</p>';

echo '<p>';
echo "<p><a href='salir.php'> Salir </a>";
echo "<p><a href='inicioadministracion.php'> Volver </a>";
echo '<p>';
?>
