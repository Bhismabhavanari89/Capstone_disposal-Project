<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:login_form.php');
}

$projects = "SELECT email,faculty_id FROM `faculty` ORDER BY email";
$result = mysqli_query($conn, $projects);
?>
<table>
  <tr>
    <th>Faculty Name</th>
  </tr>
<?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
      
             <tr>
    <td><a href="./facultywiseview.php?id=<?=$row['faculty_id']?>"><?=$row['email']?></a></td>
        <?php

        }
      ?>



<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>