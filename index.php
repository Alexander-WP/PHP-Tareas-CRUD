<?php 
	session_start();
	require_once( 'db.php' );
	require_once('includes/header.php' ); 
	require_once('includes/nav.php' );
	
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php if(isset($_SESSION['mensaje'])):?>
				<div class="alert alert-<?= $_SESSION['mensaje_color']?> alert-dismissible fade show" role="alert">
					<strong><?= $_SESSION['mensaje']; ?></strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php session_unset(); endif; ?>
			<div class="card card-body">
				<form action="save.php" method="POST">
					<div class="form-group">
						<input type="text" name="titulo" class="form-control" placeholder="Pon el titulo" autofocus>
					</div>
					<div class="form-group">
						<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de la tarea"></textarea>
					</div>
					<input type="submit" class="btn btn-info btn-block" name="guardar" value="Guardar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Descripción</th>
						<th>Creado el dia</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$query = "SELECT * FROM tareas";
						$resultados = mysqli_query($conn, $query) or die("Problemas al insertar".mysqli_error($conn));
						while($resultado = mysqli_fetch_array($resultados)) :?>
							<tr>
								<td><?php echo $resultado['titulo']; ?></td>
								<td><?php echo $resultado['descripcion']; ?></td>
								<td><?php echo $resultado['creado']; ?></td>
								<td>
									<a href="edit.php?id=<?= $resultado['id']; ?>" class="btn btn-success">
										<span class="lnr lnr-pencil"></span></a>
									<a href="delete.php?id=<?= $resultado['id']; ?>" class="btn btn-danger">
										<span class="lnr lnr-cross-circle"></span></a>
								</td>
							</tr>					
						<?php  endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php require_once('includes/footer.php');?>