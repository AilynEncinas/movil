<?php
$servername = "154.12.254.242";  // Reemplaza con la IP del servidor de la base de datos
$username = "ratiosof74bo_uv_bd_user";
$password = "Estudiantes@2024";
$dbname = "ratiosof74bo_uv_bd";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del POST
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$date = $_POST['date'];
$time = $_POST['time'];

// Preparar la consulta
$stmt = $conn->prepare("INSERT INTO gps_data (latitude, longitude, date, time) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $latitude, $longitude, $date, $time);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Datos guardados exitosamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
