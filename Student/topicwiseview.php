<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:login_form.php');
}
$topic = $_GET['topic'];
$projects = "SELECT * FROM projects p ,faculty f where p.topic='$topic' and p.f_id = f.faculty_id";
$result = mysqli_query($conn, $projects);
?>
<table>
  <tr>
    <th>Project Topic</th>
    <th>Project Name</th>
    <th>Faculty Email</th>
  </tr>
<?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
             <tr>
    <td><?=$row['topic']?></td>
    <td><?=$row['name']?></td>
    <th><?=$row['email']?></th>
  </tr>
        <?php

        }
      ?>
</table>

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