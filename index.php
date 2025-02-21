<?php

// Incluir el archivo de configuración
require '../config.php';

// Conexión a la base de datos  
$mysqli = new mysqli($db_host, $db_usuario, $db_contra, $db_nombre);

if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Insertar datos
$stmt = $mysqli->prepare("INSERT INTO Persona (id, nombre, empresa) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $id, $nombre, $empresa);

$id = 12;
$nombre = "Juan Pérez";
$empresa = "Empresa XYZ";
$stmt->execute();

echo "Filas insertadas: " . $stmt->affected_rows . "<br/>";

// Actualizar datos
$stmt = $mysqli->prepare("UPDATE Persona SET nombre = ?, empresa = ? WHERE id = ?");
$stmt->bind_param("ssi", $nombre, $empresa, $id);

$nombre = "Juan Pérez López";
$empresa = "Empresa XYZ";
$id = 12;
$stmt->execute();

echo "Filas actualizadas: " . $stmt->affected_rows . "<br/>";

// Eliminar datos
$stmt = $mysqli->prepare("DELETE FROM Persona WHERE id = ?");
$stmt->bind_param("i", $id);

$id = 12;
$stmt->execute();

echo "Filas eliminadas: " . $stmt->affected_rows . "<br/>";

// Recuperar datos
$stmt = $mysqli->prepare("SELECT * FROM Persona");
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "ID: " . $fila["id"] . " - Nombre: " . $fila["nombre"] . " - Empresa: " . $fila["empresa"] . "<br/>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$mysqli->close();
?>