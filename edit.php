<?php 
	session_start();
	require_once("db.php");
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM tareas WHERE id = $id";
		$resultados = mysqli_query($conn, $query);
		if(mysqli_num_rows($resultados) == 1){
			$resultado = mysqli_fetch_array($resultados);
			$titulo = $resultado['titulo'];
			$descripcion = $resultado['descripcion'];
		}
	}
	if(isset($_POST['actualizar'])){
		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
		$resultado  = mysqli_query($conn, $query);

		$_SESSION['mensaje'] = "La tarea fue editada con exito";
		$_SESSION['mensaje_color'] = "info";

		header("Location: index.php");
	}
?>
<?php 
	require_once("includes/header.php");
	require_once("includes/nav.php");  
?>
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="edit.php?id=<?= $_GET['id'] ?>" method="POST">
						<div class="form-group">
							<input type="text" name="titulo" value="<?= $titulo; ?>" class="form-control" placeholder="Actualizar el titulo">
						</div>
						<div class="form-group">
							<textarea name="descripcion" rows="6" class="form-control" placeholder="Actualizar la tarea"><?= $descripcion; ?></textarea>
						</div>
						<button type="submit" class="btn btn-success" name="actualizar">Actualizar</button>		
					</form>
				</div>
			</div>
		</div>
	</div>
<?php require_once("includes/footer.php"); ?>