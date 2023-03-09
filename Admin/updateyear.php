<?php

include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}
if(isset($_POST['submit'])){
    $col = $_POST['pname'];
    $select = "ALTER TABLE count ADD $col varchar(255) default 0";
    $resul = mysqli_query($conn, $select);
    
    if($resul){
        ?>
        <script>
            alert("Project Updated");
            // window.location('http://localhost/project/Faculty/home.php');
        </script>
        <?php
        header('location:./home.php');
    }
 };
?>


<form action="" method="post" enctype="multipart/form-data">
    <h1>Update Year</h1>
    <p style="color:red">Add project prefix with year like eg:CAP_2019</p>
    <label for="">Project Prefix:</label>
    <input type="text" name="pname" id=""><br>
    
    <input type="submit" name="submit" value="Upload Project" class="form-btn">
</form>
