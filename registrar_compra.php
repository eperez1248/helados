<?php
$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

// Obtener clientes
$clientes = mysqli_query($link, "SELECT id_usuarios, login FROM usuarios WHERE perfil = 1");

// Obtener helados
$helados = mysqli_query($link, "SELECT id_helado, sabor, tamanio FROM helados");

// Obtener compras
$compras = mysqli_query($link, "
    SELECT u.login, h.sabor, h.tamanio
    FROM compran c
    JOIN usuarios u ON c.id_cliente = u.id_usuarios
    JOIN helados h ON c.id_helado = h.id_helado
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Compra</title>
</head>
<body>
    <h2>Registrar Compra de Helado</h2>
    <form method="POST" action="procesar_compra.php">
        <label for="cliente">Cliente:</label>
        <select name="id_cliente" required>
            <?php while ($cliente = mysqli_fetch_assoc($clientes)) {
                echo "<option value='{$cliente['id_usuarios']}'>{$cliente['login']}</option>";
            } ?>
        </select><br><br>

        <label for="helado">Helado:</label>
        <select name="id_helado" required>
            <?php while ($helado = mysqli_fetch_assoc($helados)) {
                echo "<option value='{$helado['id_helado']}'>{$helado['sabor']} - {$helado['tamanio']}</option>";
            } ?>
        </select><br><br>

        <input type="submit" value="Registrar Compra">
    </form>

    <h3>Compras registradas</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr><th>Cliente</th><th>Sabor</th><th>Tamaño</th></tr>
        <?php while ($compra = mysqli_fetch_assoc($compras)) {
            echo "<tr>
                    <td>{$compra['login']}</td>
                    <td>{$compra['sabor']}</td>
                    <td>{$compra['tamanio']}</td>
                  </tr>";
        } ?>
    </table>
</body>
</html>
