<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:login_form.php');
}

if(isset($_POST['submit'])){
   $team1 = $_POST['t1'];
   $team2 = $_POST['t2'];
   $team3 = $_POST['t3'];
   $team4 = $_POST['t4'];
   $description = $_POST['description'];
   $femail = $_POST['femail'];
   // echo $prid;
   $select = "INSERT INTO request (member1, member2, member3, member4,description,facultyemail) VALUES ('$team1','$team2','$team3','$team4','$description','$femail')";
   $resul = mysqli_query($conn, $select);
   
   if($resul){
       ?>
       <script>
           alert("Project Requested for Team Members");
           // window.location('http://localhost/project/Faculty/home.php');
       </script>
       <?php
       header('location:./home.php');
   }
}
$id = $_SESSION['id'];
$user = "SELECT * FROM user_form where registration_no = '$id'";
$result = mysqli_query($conn, $user);
$row = $result->fetch_assoc();
// print_r($row);

$email = $row['email'];
$request = "SELECT * FROM request where member1='$email' or member2 = '$email' or member3 = '$email' or member4 = '$email'";
$reqresult = mysqli_query($conn, $request);
$row = $reqresult->fetch_assoc();
if($row){
   echo "Waiting For response";
}
else{
   ?>
   <form action="" method="post">
      <h1>Request for Project</h1>
      <label for="">Member 1:</label>
      <input type="text" name="t1" id=""><br>
      <label for="">Member 2:</label>
      <input type="text" name="t2" id=""><br>
      <label for="">Member 3:</label>
      <input type="text" name="t3" id=""><br>
      <label for="">Member 4:</label>
      <input type="text" name="t4" id=""><br>
      <label for="">Interest About Project</label>
      <textarea name="description" id=""></textarea><br>
      <label for="">Faculty Email:</label>
      <input type="text" name="femail" id=""><br>
      <input type="submit" name="submit" value="Request Project" class="form-btn">
  </form>
            
   <?php
}
?>


