<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

$link = mysqli_connect("localhost", "elena", "P@ssw0rd", "helados");

$id = isset($_POST['id_usuarios']) ? intval($_POST['id_usuarios']) : 0;
if ($id <= 0) {
    die("ID de usuario inválido.");
}

$sql = "SELECT * FROM usuarios WHERE id_usuarios = $id";
$result = mysqli_query($link, $sql);
$usuario = mysqli_fetch_assoc($result);

if (!$usuario) {
    die("Usuario no encontrado.");
}
?>

<form action="actualizausuario.php" method="post">
    <input type="hidden" name="id_usuarios" value="<?= $usuario['id_usuarios'] ?>"/>
    <p>Login: <input type="text" name="login" value="<?= htmlspecialchars($usuario['login']) ?>"/></p>
    <p>Pass: <input type="text" name="pass" value="<?= htmlspecialchars($usuario['pass']) ?>"/></p>
    <p>Perfil: <input type="text" name="perfil" value="<?= htmlspecialchars($usuario['perfil']) ?>"/></p>
    <input type="submit" value="Guardar cambios"/>
</form>
