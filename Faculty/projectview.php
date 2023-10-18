<?php
session_start();
include('../config.php');
include('header.php');
if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}
$id = $_SESSION['id'];
$projects = "select * from projects where f_id = $id";
$result = mysqli_query($conn, $projects);
?>


<body>

      <?php
      if(mysqli_num_rows($result)==0){
        ?>
        <h1>No Projects</h1>
        <?php
      }
      else{
        ?>
        <table>
  <tr>
    <th>ProjectId</th>
    <th>Project Name</th>
    <th>Project Topic</th>
    <th>Edit</th>
  </tr>
        <?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
            <form action="./modify.php" method="post">
             <tr>
    <td><?=$row['project_id']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['topic']?></td>
    <td><button type="submit" onclick="">Edit<?php $_SESSION['pid']= $row['id']?></button></td>
  </tr></form>
        <?php

        }
        
      }
      ?>
</table>
</body>
</html>

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