<?php
require_once "../conexion.php";

/* obtener ID */
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID no válido");
}

/* Traer empleado */
$sqlEmpleado = "
SELECT
e.id_empleado,
e.nombre,
e.puesto,
e.salario,
e.id_departamento
FROM empleados e
WHERE e.id_empleado = :id
";

$stmt = $db->prepare($sqlEmpleado);
$stmt->execute([':id'=> $id]);
$empleado = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$empleado) {
 die("Empleado no encontrado");
}

/* Traer deptos */
$sqlDepto = "SELECT id_departamento, nombre FROM departamento";
$stmt = $db->prepare($sqlDepto);
$stmt->execute();
$departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* Guardar cambios */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sqlUpdate = "
    UPDATE empleados SET
    nombre = :nombre,
    puesto = :puesto,
    salario = :salario,
    id_departamento = :id_departamento
    WHERE id_empleado = :id
    ";

    $stmt = $db->prepare($sqlUpdate);
    $stmt->execute([
        ':nombre' => $_POST['nombre'],
        ':puesto' => $_POST['puesto'],
        ':salario' => $_POST['salario'],
        ':id_departamento' => $_POST['id_departamento'],
        ':id' => $id
    ]);

    header("Location: empleados_listar.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar empleado</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>

<h2>Editar empleado</h2>
<form method="post">
    <label>Nombre: </label><br>
    <input type="text" name="nombre" value="<?= $empleado['nombre'] ?>" required><br>

    <label>Puesto:</label><br>
    <input type="text" name="puesto" 
    value="<?php echo $empleado['puesto']; ?>" 
    required><br><br>

    <label>salario: </label><br>
    <input type="number" name="salario" value="<?= $empleado['salario'] ?>" required><br>

    <label>Departamento: </label><br>
    <select name="id_departamento" required>
        <?php foreach ($departamentos as $d): ?>
            <option value="=<?= $d['id_departamento'] ?>"
                <?= $d['id_departamento'] == $empleado['id_departamento'] ? 'selected' : '' ?>>
                <?= $d['nombre'] ?>
        </option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Guardar cambios</button>
</form>

        </body>
        </html>
