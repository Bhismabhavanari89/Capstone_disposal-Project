<?php
include('../config.php');
include('./header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}
$id = $_SESSION['id'];
$s = "Select * from issues where registration_no = '$id'";
$sr = mysqli_query($conn, $s);
if(isset($_POST['submit'])){
    $fid = $_POST['fid'];
    $issue= $_POST['issue'];
    // echo $prid;
    $select = "INSERT INTO issues (registration_no, p_id, issue) VALUES ('$id','$fid','$issue')";
    $resul = mysqli_query($conn, $select);
    
    if($resul){
        ?>
        <script>
            alert("Issue Updated");
            // window.location('http://localhost/project/Faculty/home.php');
        </script>
        <?php
        header('location:./home.php');
    }
}
$row = $sr->fetch_assoc();
if($row){
?>


        <table>
  <tr>
    <th>Project Id</th>
    <th>Issue</th>
    <th>Status</th>
  </tr>
<td><?=$row['p_id']?></td>
    <td><?=$row['issue']?></td>
    <td><?=$row['status']?></td>
<?php
}
else{
?>

<form method="post" action="">
<h1>Issue With Project</h1>
    <label for="">Project Id:</label>
    <input type="text" name="fid" id=""><br>
    <label for="">Issue:</label>
    <textarea name="issue" id="issue" ></textarea><br>
    <input type="submit" name="submit" value="Update Issue" >
</form>
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