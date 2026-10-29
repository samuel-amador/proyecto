<?php
require "config.php";

if (!isset($_SESSION["usuario_id"])) {
header("Location: index.php");
exit;
}

$nombre = $_POST["nombre"];
$instrumento = $_POST["instrumento"];
$nivel = $_POST["nivel"];
$correo = $_POST["correo"];

$sql = "INSERT INTO alumnos (nombre, instrumento, nivel, correo)
VALUES (:nombre, :instrumento, :nivel, :correo)";

$consulta = $conexion->prepare($sql);

$consulta->execute([
":nombre" => $nombre,
":instrumento" => $instrumento,
":nivel" => $nivel,
":correo" => $correo
]);

header("Location: dashboard.php");
exit;
?>