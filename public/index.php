<?php
require_once "../database.php";

$sql = "SELECT * FROM empleados";
$employees = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Empleados</title>
    </head>
    <body>
        <h1> Lista de empleados</h1>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Puesto</th>
                <th>Salario</th>
                <th>Departamento</th>
            </tr>

            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee['id_empleado'] ?></td>
                    <td><?= $employee['nombre'] ?></td>
                    <td><?= $employee['puesto'] ?></td>
                    <td><?= $employee['salario'] ?></td>
                    <td><?= $employee['id_departamento'] ?></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>