<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
$marks = $_GET['marks'];
// echo $marks;
// $a = $_POST['select'];
  //  $fid = $rrow['f_id'];
   $value = "";
   $count = 0;
   for($x=0;$x<strlen($q);$x++){
      if($q[$x]=='_'){
         $count+=1;
         if($count==2){
            break;
         }
         else{
            $value.=$q[$x];
         }
      }
      else{
         $value.=$q[$x];
      }
   }
  //  echo $value;

// echo $marks;
// echo $q;
include('../config.php');
// include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
 }
// $con = mysqli_connect('localhost','peter','abc123');
// if (!$con) {
//   die('Could not connect: ' . mysqli_error($con));
// }

// mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM list WHERE pid = '".$q."'";
$result = mysqli_query($conn,$sql);

$select = "Select * from marks_projects where project='$value'";
$sresult = mysqli_query($conn,$select);
$rowm = mysqli_fetch_assoc($sresult);
// print_r($rowm['internal_marks']);
$im = $rowm['internal_marks'];
// echo $im;
$em = $rowm['external_marks'];

if(isset($_POST['submit'])){
  while($row = mysqli_fetch_array($result)) {
    $a = $_POST["1"];
    ?>
    <script>
      
    </script>
    <?php
  }
}
?>
<form action="markupdate.php?q="+$q+"&v="+$value+"&m="+$marks method="post">
<table>
<tr>
<th>Project Member</th>
<th>Marks</th>

</tr>
<?php
while($row = mysqli_fetch_array($result)) {
  ?>
  <tr>
<td><?=$row['member']?></td>
<?php
  if($marks === 'internal_marks'){

    ?>
    <td>
      <input type='number' name="<?=$row['member']?>" min='0' max='<?=$im?>'></td>
  <?php
  }
  else{
    
    
    ?>
    <td><input type='number' name="<?=$row['member']?>"   min='0' max='<?=$em?>'></td>
    <?php
  }
  ?>
  </tr>
  <?php
}
?>
</table>
<?php
if($marks === 'internal_marks'){

  ?>
  
  <input type="submit" name="submit" value="Upload Internal Marks" class="form-btn">
<?php
}
else{
  
  
  ?>
 <input type="submit" name="submit" value="Upload External Marks" class="form-btn">
  <?php
}
?>

</form>

</body>
</html>

