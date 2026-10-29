<?php
require "config.php";

if (!isset($_SESSION["usuario_id"])) {
header("Location: index.php");
exit;
}

$alumnos = $conexion->query("SELECT * FROM alumnos ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel de la Academia</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>

<header>
<h1>Academia de Música</h1>

<div>
<span>Hola, <?php echo $_SESSION["usuario_nombre"]; ?></span>
<a href="logout.php">Cerrar sesión</a>
</div>
</header>

<main>

<section class="tarjeta">

<h2>Registrar alumno</h2>

<form action="registrar_alumno.php" method="POST">

<label>Nombre</label>
<input type="text" name="nombre" required>

<label>Instrumento</label>
<input type="text" name="instrumento" required>

<label>Nivel</label>
<select name="nivel" required>
<option value="">Selecciona</option>
<option value="Principiante">Principiante</option>
<option value="Intermedio">Intermedio</option>
<option value="Avanzado">Avanzado</option>
</select>

<label>Correo</label>
<input type="email" name="correo" required>

<button type="submit">Guardar</button>

</form>

</section>

<section class="tarjeta">

<h2>Alumnos registrados</h2>

<table>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Instrumento</th>
<th>Nivel</th>
<th>Correo</th>
</tr>

<?php
foreach ($alumnos as $alumno) {
echo "<tr>";
echo "<td>" . $alumno["id"] . "</td>";
echo "<td>" . $alumno["nombre"] . "</td>";
echo "<td>" . $alumno["instrumento"] . "</td>";
echo "<td>" . $alumno["nivel"] . "</td>";
echo "<td>" . $alumno["correo"] . "</td>";
echo "</tr>";
}
?>

</table>

</section>

</main>

<script src="script.js"></script>
</body>
</html>