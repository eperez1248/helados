<?php
$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$id_cliente = $_POST['id_cliente'];
$id_helado = $_POST['id_helado'];

// Validación básica
if (is_numeric($id_cliente) && is_numeric($id_helado)) {
    $sql = "INSERT INTO compran (id_cliente, id_helado) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_cliente, $id_helado);
    mysqli_stmt_execute($stmt);

    echo "<p>Compra registrada correctamente.</p>";
    echo "<p><a href='registrar_compra.php'>Registrar otra</a></p>";
} else {
    echo "<p>Error en los datos enviados.</p>";
}
?>

