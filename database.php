<?php
try {
    $db = new PDO( "sqlite:" . __DIR__ ."/db/Empleados.db.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión");
}
?>