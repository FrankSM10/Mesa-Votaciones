<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jurados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$identificacion = $_POST['identificacion'];

// Preparar la consulta
$stmt = $conn->prepare("SELECT * FROM tabla_cedulas WHERE cedula = ?");
$stmt->bind_param("s", $identificacion);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si la cédula existe en la base de datos
    echo json_encode([
        "error" => false,
        "redirectUrl" => "Jurado_mesa2.php"
    ]);
} else {
    // Si la cédula no existe en la base de datos
    echo json_encode([
        "error" => true,
        "message" => "No puede ver los resultados de la mesa."
    ]);
}

$stmt->close();
$conn->close();
?>
