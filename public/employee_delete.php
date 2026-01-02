<?php
require_once "../database.php";


if (!isset($_GET['id'])) {
    die("Invalid ID");
}

$id = $_GET['id'];

$sql = "DELETE FROM empleados WHERE id_empleado = :id";
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $employeeID]);

header("Location: employee_list.php");
exit;

?>