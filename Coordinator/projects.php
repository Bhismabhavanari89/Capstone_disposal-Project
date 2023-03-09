<?php

@include '../config.php';
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}

$projects = "select * from projects";
$result = mysqli_query($conn, $projects);
$row = $result->fetch_assoc();
// while($row){
//     print_r($row['topic']);
// }
?>