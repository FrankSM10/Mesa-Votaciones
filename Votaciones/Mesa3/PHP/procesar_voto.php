<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votaciones";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$cedula = $_POST['identificacion'];

// Verificar si la cédula ya existe en la base de datos
$query = "SELECT * FROM cedula_mesa3 WHERE cedula = '$cedula'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo json_encode(['error' => true, 'message' => 'Esta cédula ya ha realizado su voto.']);
} else {
    // Insertar la cédula en la base de datos
    $insertQuery = "INSERT INTO cedula_mesa3 (cedula) VALUES ('$cedula')";
    $conn->query($insertQuery);

    // Redirigir siempre a Mesa1.php
    echo json_encode(['error' => false, 'redirectUrl' => 'Mesa3.php']);
}

$conn->close();
?>
