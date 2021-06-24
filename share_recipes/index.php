<?php 

	include('config/db_connect.php');

	// write query for all recipes
	$sql = 'SELECT title, ingredients, id , instructions FROM recipes ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$recipes = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>
<br><h4 class="center grey-text text-darken-2">Hey Ninjas,</h4><br>
	<h6 class="center grey-text">Feel free to share your favourite recipes here. And we are very greateful for your contribution. Thank You:)</h6>

	<div class="container">
		<div class="row">

			<?php foreach($recipes as $recipe): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<img src="img/fast-food-menu.svg"class="pizza">
						<div class="card-content center">
							<h6><?php echo ($recipe['title']); ?></h6>
							<br>
							<h6 >INGRIDIENTS:</h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $recipe['ingredients']) as $ing): ?>
									<li><?php echo ($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="indigo-text" href="details.php?id=<?php echo $recipe['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>