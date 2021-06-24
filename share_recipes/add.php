<?php

	include('config/db_connect.php');

	$email = $title = $ingredients = $instructions = '';
	$errors = array('email' => '', 'title' => '', 'ingredients' => '', 'instructions' => '');

	if(isset($_POST['submit'])){
		
		// check email

		if(empty($_POST['email'])){
			$errors['email'] = 'An email is required';
		} else{
			$email = $_POST['email'];
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email address';
			}
		}

		// check title
		if(empty($_POST['title'])){
			$errors['title'] = 'A title is required';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$errors['title'] = 'Title must be letters and spaces only';
			}
		}

		// check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required';
		} 
		else{
			$ingredients = $_POST['ingredients'];
			
			}
		// check instructions
		if(empty($_POST['instructions'])){
			$errors['instructions'] = 'At least one instruction is required';
		} 
		else{
			$instructions= $_POST['instructions'];
			}
		

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// create sql
			$sql = "INSERT INTO recipes(title,email,ingredients,instructions) VALUES('$title','$email','$ingredients','$instructions');";
			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
			
		}

	} // end POST check

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add Your Recipe</h4>
		<form class="white" action="add.php" method="POST">
			<label>Your Email</label>
			<input type="text" name="email" value="<?php echo ($email) ?>">
			<div class="red-text"><?php echo $errors['email']; ?></div>
			<label>Food Title</label>
			<input type="text" name="title" value="<?php echo ($title)?>">
			<div class="red-text"><?php echo $errors['title']; ?></div>
			<label>Ingredients (comma separated)</label>
			<input type="text" name="ingredients" value="<?php echo ($ingredients) ?>">
			<div class="red-text"><?php echo $errors['ingredients']; ?></div>
			<label>Instructions </label>
			<input type="text" name="instructions" value="<?php echo ($instructions) ?>">
			<div class="red-text"><?php echo $errors['instructions']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn indigo z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>