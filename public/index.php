<?php
require_once "../conexion.php";

$sql = "SELECT * FROM empleados";
$resultado = $db->query($sql);
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

            <?php foreach ($resultado as $fila): ?>
                <tr>
                    <td><?= $fila['id_empleado'] ?></td>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['puesto'] ?></td>
                    <td><?= $fila['salario'] ?></td>
                    <td><?= $fila['id_departamento'] ?></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>