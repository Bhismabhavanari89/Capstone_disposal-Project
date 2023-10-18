<?php
include ('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}

$select = "select DISTINCT(pid) from list where internal_marks>-1";
$result = mysqli_query($conn,$select);
// print_r($result);

?>
<table>
  <tr>
    <th>Project Id</th>
  </tr>
<?php
while($row = $result->fetch_assoc()){
   ?>
   <tr>
    <td><?=$row['pid']?></td>
    
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