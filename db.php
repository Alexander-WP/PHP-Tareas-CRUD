<?php 
// Datos de conexion para servidor MySQL
$server = 'localhost'; // Poner host del servidor 
$username = 'root'; // Poner usuario de servidor 
$password = ''; // Contraseña del servidor
$db = 'database_crud'; // Nombre de la base de datos

$conn = mysqli_connect($server, $username, $password, $db);

$query = "SELECT * FROM tareas WHERE 1";

$resultado = mysqli_query($conn, $query);

if(!$resultado){

$crear = "CREATE TABLE `tareas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
	`creado` TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

	mysqli_query($conn, $crear);

};