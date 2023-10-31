<?php
// Configuración de la base de datos
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

// Obtener el nombre del aspirante desde el POST request
$aspirante = $_POST['aspirante'];

// Actualizar el conteo de votos para el aspirante seleccionado
$query = "UPDATE mesa3 SET votos = votos + 1 WHERE nombre = '$aspirante'";

if ($conn->query($query) === TRUE) {
    echo "Voto registrado exitosamente!";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>