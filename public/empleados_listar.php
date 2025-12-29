<?php
require_once "../conexion.php";

/*Traer empleados con departamento */
$sql = "
SELECT
   e.id_empleado,
e.nombre,
e.puesto,
e.salario,
d.nombre AS departamento
FROM empleados AS e
    LEFT JOIN departamento AS d 
    ON e.id_departamento = d.id_departamento
";

$stmt = $db->prepare($sql);
$stmt->execute();
$empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Lista de empleados</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>
        <h2>Lista de empleados</h2>
        
        <a href="empleados_nuevo.php" class="btn-nuevo">
             ➕ Nuevo empleado
        </a>
        <br><br>

        <table border="1" cellpadding="5">
            <tr>
                <th>nombre</th>
                <th>Puesto</th>
                <th>salario</th>
                <th>Departamento</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($empleados as $e): ?>
                <tr>
                    <td><?= $e['nombre'] ?></td>
                    <td><?= $e['puesto'] ?></td>
                    <td><?= $e['salario'] ?></td>
                    <td><?= $e['departamento'] ?></td>
                <td>
                    <a href="empleados_editar.php?id=<?= $e['id_empleado'] ?>"> ✏️ Editar</a>

                    <a href="empleados_eliminar.php?id=<?= $e['id_empleado'] ?>"
                    onclick="return confirm('¿Seguro que quiere eliminar este empleado?')">
                    🗑️ Eliminar
                </a>
            </td>
            </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>