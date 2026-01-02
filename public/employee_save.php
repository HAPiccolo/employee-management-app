<?php
require_once "../database.php";

$nombre = $_POST['nombre'];
$puesto = $_POST['puesto'];
$salario = $_POST['salario'];
$id_departamento = $_POST['id_departamento'];

$sql = "
INSERT INTO empleados (nombre, puesto, salario, id_departamento)
VALUES (?, ?, ?, ?)
";

$stmt = $db->prepare($sql);
$stmt->execute([$nombre, $puesto, $salario, $id_departamento]);

header("Location: index.php");
exit;