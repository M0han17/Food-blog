<?php 

	include('config/db_connect.php');
	if(isset($_POST['delete'])){

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM recipes WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)){
			header('Location: index.php');
		} else {
			echo 'query error: '. mysqli_error($conn);
		}

	}


	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM recipes WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$recipe = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center grey-text text-darken-2">
		<?php if($recipe): ?>
			<h4><?php echo $recipe['title']; ?></h4>
			<p>Created by <?php echo $recipe['email']; ?></p>
			<p><?php echo date($recipe['created_at']); ?></p>
			<h5>Ingredients:</h5>
			<p><?php echo $recipe['ingredients']; ?></p>
			<h5>Instructions:</h5>
			<p><?php echo $recipe['instructions']; ?></p>

			<!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $recipe['id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn indigo z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such recipe exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>