<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:login_form.php');
}

$projects = "SELECT DISTINCT(topic) FROM `projects` ORDER BY topic";
$result = mysqli_query($conn, $projects);
?>
<table>
  <tr>
    <th>Topic Name</th>
  </tr>
<?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
             <tr>
    <td><a href="./topicwiseview.php?topic=<?=$row['topic']?>"><?=$row['topic']?></a></td>
  </tr>
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