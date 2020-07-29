<?php 
	session_start();
	require_once('db.php');

	if(isset($_GET[id])){
		$id = $_GET['id'];
		$query = "DELETE FROM tareas WHERE id = $id";
		$resultado = mysqli_query($conn, $query);

		if(!$resultado){
			die("Fallo la accion eliminar");
		}else{
			$_SESSION['mensaje'] = "La tarea se elimino correctamente";
			$_SESSION['mensaje_color'] = "danger";
			header("Location: index.php");
		}
	}
?>