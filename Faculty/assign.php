<?php


include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}
$id = $_SESSION['id'];
$projects = "select * from projects where f_id = $id";
$result = mysqli_query($conn, $projects);
if(isset($_POST['submit'])){
    $team1 = $_POST['t1'];
    $team2 = $_POST['t2'];
    $team3 = $_POST['t3'];
    $team4 = $_POST['t4'];
    $pid = $_SESSION['ppid'];
    $select = "INSERT INTO list (pid, team1, team2, team3, team4) VALUES (pid,'team1','team2','team3','team4')";
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
    <th>Assign</th>
  </tr>
        <?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
            <form action="./updateassign.php?id=<?=$row['project_id']?>" method="post">
             <tr>
    <td><?=$row['project_id']?></td>
    <td><?=$row['name']?></td>
    <td><?=$row['topic']?></td>
    <td><button type="submit" onclick="">Update<?php $_SESSION['piid']= $row['id']?></button></td>
  </tr></form>
        <?php

        }
        
      }
      ?>

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