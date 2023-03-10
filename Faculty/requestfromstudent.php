<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
}

$id = $_SESSION['id'];
$faculty = "SELECT * from faculty where faculty_id = $id";
$result = mysqli_query($conn, $faculty);
$row = $result->fetch_assoc();

// print_r($row);
$request = "SELECT * from request where f_id = $id";
$reqrequest = mysqli_query($conn, $request);
$reqrow = $reqrequest->fetch_assoc();

// print_r($reqrow);
if($reqrow){
    ?>
    <label for="">Member 1:</label><?=$reqrow['member1']?><br>
    <label for="">Member 2:</label><?=$reqrow['member2']?><br>
    <label for="">Member 3:</label><?=$reqrow['member3']?><br>
    <label for="">Member 4:</label><?=$reqrow['member4']?><br>
    <label for="">Interest About Project:</label><?=$reqrow['description']?><br>
    <?php
}
else{
    echo "No Requests Please come back later";
}
?>