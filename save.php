<?php 
	session_start();
	require_once('db.php');

if(isset($_POST['guardar'])){
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];

	$query = "INSERT INTO tareas (titulo, descripcion) VALUES ('$titulo', '$descripcion')";

	$respuesta = mysqli_query($conn, $query);
	if(!$respuesta){
		die("La consulta fallo");
	} else {
		$_SESSION['mensaje'] = 'Tarea guardada con exito';
		$_SESSION['mensaje_color'] = 'success';
		header("Location: index.php");
	}
	
} ?>