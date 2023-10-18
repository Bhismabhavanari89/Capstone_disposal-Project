<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];
   // $cpass = md5($_POST['cpassword']);
   // $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   $faculty = "SELECT * FROM faculty where email='$email' && password='$pass' ";
   $fresult = mysqli_query($conn, $faculty); 
   $coordinator = "SELECT * FROM coordinato where email='$email' && password='$pass' ";
   $cresult = mysqli_query($conn, $coordinator);
   $admin = "SELECT * FROM admin where email='$email' && password='$pass' ";
   $aresult = mysqli_query($conn, $admin); 
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $_SESSION['id'] = $row['registration_no'];
      header('location:./Student/home.php');
     
   }
   else if(mysqli_num_rows($fresult) > 0){
      $row = mysqli_fetch_array($fresult);
      $_SESSION['id'] = $row['faculty_id'];
      header('location:./Faculty/home.php');
   }
   else if(mysqli_num_rows($cresult) > 0){
      $row = mysqli_fetch_array($cresult);
      $_SESSION['id'] = $row['id'];
      header('location:./Coordinator/home.php');
   }
   else if(mysqli_num_rows($aresult) > 0){
      $row = mysqli_fetch_array($aresult);
      $_SESSION['id'] = $row['id'];
      header('location:./Admin/home.php');
   }
   else{
      $error[] = 'Incorrect Email or Password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

<!-- pattern=".+@srmap.edu.in" -->
      <input type="text" name="email" required placeholder="enter your email" >
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>

</div>

</body>
</html>