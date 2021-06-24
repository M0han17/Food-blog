<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head><br>
<title> Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="style.css">
<style>
  body {
        background-image: url(https://images.unsplash.com/photo-1448131063153-f1e240f98a72?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1924&q=80);
        background-position: center top;
        background-size: 100% auto;
    }
</style>
</head>
<body>
<a href="../food-blog.php" class=" large btn blue white-text" style="position:absolute;right:2%;top:15px;"><span>Home</span><i class="material-icons white-text right" style="font-size:17px;" >home</i></a>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
      <br><br><br>
			<div class="login_form">
 	<form action="login_process.php" method="POST">
  <div class="form-group"> <br>
<?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials, Please Try Again..</p>'; } ?>

    <label class="label_txt white-text">Username or Email </label>
    <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo  $loginerror; } ?>" class="form-control white-text" required="">
  </div>
  <div class="form-group">
    <label class="label_txt white-text">Password </label>
    <input type="password" name="password" class="form-control white-text" required="">
  </div>
  <button type="submit" name="sublogin" class="btn btn-primary btn-group-lg form_btn">Login</button>
</form>

   <br> 
    <p class="white-text">Don't have an account? <a href="signup.php">Sign up</a> </p>
		</div>
		<div class="col-sm-4">
		</div>
		</div>
	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>