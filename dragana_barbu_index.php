

<?php
  ob_start();

 session_start();

 require_once 'dragana_barbu_dbconnect.php';

 

 // it will never let you open index(login) page if session is set

 if ( isset($_SESSION['users'])!="" ) {

  header("Location: dragana_barbu_home.php");

  exit;

 }

 

 $error = false;

 

 if( isset($_POST['btn-login']) ) {

 

  // prevent sql injections/ clear user invalid inputs

  $email = trim($_POST['email']);

  $email = strip_tags($email);

  $email = htmlspecialchars($email);

 

  $pass = trim($_POST['pass']);

  $pass = strip_tags($pass);

  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

 

  if(empty($email)){

   $error = true;

   $emailError = "Please enter your email address.";

  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {

   $error = true;

   $emailError = "Please enter valid email address.";

  }

 

  if(empty($pass)){

   $error = true;

   $passError = "Please enter your password.";

  }

 

  // if there's no error, continue to login

  if (!$error) {

   

   $password = hash('sha256', $pass); // password hashing using SHA256

 

   $res=mysqli_query($conn, "SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");

   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);

   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   

   if( $count == 1 && $row['userPass']==$password ) {

    $_SESSION['users'] = $row['userId'];

    header("Location: dragana_barbu_home.php");

   } else {

    $errMSG = "Incorrect Credentials, Try again...";

   }

   

  }
 }
?>

<!DOCTYPE html>

<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>Login & Registration System</title>

</head>

<body>



    

  

 



      <div class="container">
        

            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

 <?php

   if ( isset($errMSG) ) {
              echo $errMSG; ?>
    <?php
        } ?>

<input  style="width: 500px;"type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="30" />

         

             <span class="text-danger"><?php echo $emailError; ?></span>

  

  <input style="width: 500px;" type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />

         

            <span class="text-danger"><?php echo $passError; ?></span>
  
      <div class="row">
  <button type="submit" class="text-center" name="btn-login" id="loginbtn">Sign In</button>
  </div>
  </div>

</form>
   <!--main image -->

<div class="container" id="heroimg">
      <div class="row">
        <div class="col-md-12 col-xs-12">
        <p class="text-center" id="titlephrase">Library</p>
        <p class="text-center"><button type="button" class="btn btn-basic" id="btnsignup"><a href="dragana_barbu_register.php">Sign Up Here!</button></a></p>

        </div>
    </div>
    
</div>




</body>

</html>

<?php ob_end_flush(); ?>