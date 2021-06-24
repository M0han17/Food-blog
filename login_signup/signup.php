<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<title> SignUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
<style>
  body {
        background-image: url(https://images.unsplash.com/photo-1598358426632-93cdb5ce8be0?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1964&q=80);
        background-position: center top;
        background-size: 100% auto;
    }
</style>
</head>
<body>
<a href="../food-blog.php" class=" large btn blue white-text" style="position:absolute;right:2%;top:15px;"><span>Home</span><i class="material-icons white-text right" style="font-size:17px;" >home</i></a>
  <br>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
         <div class="col-sm-4">
    </div>
     <div class="col-sm-4">
    </div>
  </div>
	<div class="row">
<?php 
 if(isset($_POST['signup']))
 {
  extract($_POST);
  if(strlen($fname)<3){ // Minimum 
      $error[] = 'Please enter First Name using 3 charaters atleast.';
        }
if(strlen($fname)>20){  // Max 
      $error[] = 'First Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $fname)){
            $error[] = 'Invalid Entry First Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
        }    
if(strlen($lname)<3){ // Minimum 
      $error[] = 'Please enter Last Name using 3 charaters atleast.';
        }
if(strlen($lname)>20){  // Max 
      $error[] = 'Last Name: Max length 20 Characters Not allowed';
        }
if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lname)){
            $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digit or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,-,)';
              }    
      if(strlen($username)<3){ // Change Minimum Lenghth   
            $error[] = 'Please enter Username using 3 charaters atleast.';
        }
  if(strlen($username)>50){ // Change Max Length 
            $error[] = 'Username : Max length 50 Characters Not allowed';
        }
  if(!preg_match("/^^[^0-9][a-z0-9]+([_-]?[a-z0-9])*$/", $username)){
            $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No number at the start- Eg - username, unique_user or myusername123';
        }  
if(strlen($email)>50){  // Max 
            $error[] = 'Email: Max length 50 Characters Not allowed';
        }
   if($passwordConfirm ==''){
            $error[] = 'Please confirm the password.';
        }
        if($password != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password should be atleast 6 characters long.';
        }
        
         if(strlen($password)>20){ // Max 
            $error[] = 'Password: Max length 20 Characters Not allowed';
        }
          $sql="select * from users where (username='$username' or email='$email');";
      $res=mysqli_query($dbc,$sql);
   if (mysqli_num_rows($res) > 0) 
   {
     $row = mysqli_fetch_assoc($res);

     if($username==$row['username'])
     {
           $error[] ='Username alredy Exists.';
          } 
       if($email==$row['email'])
       {
            $error[] ='Email alredy Exists.';
          } 
      }
         if(!isset($error))
         { 
              $date=date('Y-m-d');
            $options = array("cost"=>4);
            $password = password_hash($password,PASSWORD_BCRYPT,$options);
            
           $result = mysqli_query($dbc,"INSERT into users values('$fname','$lname','$username','$email','$password','$date')");

           if($result)
    {
     $done=2; 
    }
    else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>

		 <div class="col-sm-4">
     
 <?php 
  if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#129305;</span> <br> You have registered successfully . <br> <a href="login.php" style="color:blue">Login here... </a> </div>
      <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
  <div class="form-group">
  	
        <label class="label_txt white-text">First Name</label>
    <input type="text" class="form-control" style='color:#EAE9E5' name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt white-text">Last Name </label>
    <input type="text" class="form-control" style='color:#EAE9E5' name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
  </div>
 
<div class="form-group">
    <label class="label_txt white-text">Username </label>
    <input type="text" class="form-control" style='color:#EAE9E5' name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
  </div>

<div class="form-group">
    <label class="label_txt white-text">Email </label>
    <input type="email" class="form-control" style='color:#EAE9E5' name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt white-text">Password </label>
    <input type="password" name="password" style='color:#EAE9E5' class="form-control" required="">
  </div>
   <div class="form-group">
    <label class="label_txt white-text">Confirm Password </label>
    <input type="password" name="passwordConfirm" style='color:#EAE9E5' class="form-control" required="">
  </div>
  <button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">SignUp</button>
      <br><br>
   <p class="white-text">Have an account?  <a href="login.php">Log in</a> </p>
</form>
<?php } ?> 
</div>
		</div>
		<div class="col-sm-4">
		</div>

	</div>
</div> 
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>