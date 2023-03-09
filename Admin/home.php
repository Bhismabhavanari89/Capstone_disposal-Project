<?php

include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}

?>

