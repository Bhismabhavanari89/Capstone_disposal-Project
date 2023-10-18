<?php

include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}
if(isset($_POST['submit'])){
    $col = $_POST['pname'];
    $im = $_POST['imarks'];
    $em = $_POST['emarks'];
    $crt = "CREATE TABLE $col ( id int AUTO_INCREMENT PRIMARY KEY, f_id int, p_id varchar(225), file_name varchar(225), created_at Timestamp DEFAULT CURRENT_TIMESTAMP, updated_at Timestamp DEFAULT CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP );";
    $crtr = mysqli_query($conn,$crt);   
    $select = "ALTER TABLE count ADD $col varchar(255) default 0";
    $resul = mysqli_query($conn, $select);
    $pr = "insert into marks_projects (project,internal_marks,external_marks) values('$col',$im,$em)";
    $rpr = mysqli_query($conn,$pr);
    
    if($resul and $crtr and $rpr){
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
    <input type="text" name="pname" id="" placeholder="Enter Project"  required><br>
    <label for="">Internal Marks</label>
    <input type="number" name="imarks" id="" min="1" placeholder="Enter Internal Marks" required><br>
    <label for="">External Marks</label>
    <input type="number" name="emarks" id="" min="1" placeholder="Enter External Marks"  required><br>
    <input type="submit" name="submit" value="Upload Project" class="form-btn">
</form>
