<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:login_form.php');
}

$fid = $_GET['id'];
$projects = "SELECT * FROM projects p where p.f_id = $fid";
$result = mysqli_query($conn, $projects);
$faculty = "SELECT * FROM faculty where id = $fid";
$fresult = mysqli_query($conn, $faculty);
?>
<?php
        while($frow = $fresult->fetch_assoc()){
            ?>
            <center><h3>You are viewing for faculty Email: <?=$frow['email']?></h3></center>
          <?php
          }
          ?>
<table>
  <tr>
    <th>Project Topic</th>
    <th>Project Name</th>
  </tr>

<?php
        while($row = $result->fetch_assoc()){
            ?>
      
             <tr>
    <td><?=$row['topic']?></td>
    <td><?=$row['name']?></td>

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