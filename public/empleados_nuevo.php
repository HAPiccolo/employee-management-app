<?php
require_once "../conexion.php";


/* Traer deptos */
$stmt = $db->query("SELECT id_departamento, nombre FROM departamento");
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Nuevo empleado</title>
        <link rel="stylesheet" href="css/estilos.css"> 
    </head>
    <body>

    <h2>Alta de empleado</h2>

    <form action="empleados_guardar.php" method="post">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Puesto:</label><br>
    <input type="text" name="puesto"required><br><br>

    <label>Salario: </label><br>
    <input type="number" name="salario"required><br><br>

    <label>Departamento: </label><br>
    <select name="id_departamento"required>
        <option value="">Seleccione...</option>

        <?php foreach ($departamentos as $d): ?>
            <option value="<?= $d['id_departamento'] ?>">
                <?= $d['nombre'] ?>
            </option>
            <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar</button>
    </form>

    </body>
</html>