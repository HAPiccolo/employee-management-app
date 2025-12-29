<?php
require_once "../conexion.php";

if (!isset($_GET['id'])) {
    die("ID no recibido");
}

$id = $_GET['id'];

$sql = "DELETE FROM empleados WHERE id_empleado = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $id]);

header("Location: empleados_listar.php");
exit;

?>