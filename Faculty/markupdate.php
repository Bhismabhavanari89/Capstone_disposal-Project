<?php
include('../config.php');
// include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
}

$sql="SELECT * FROM list";
$result = mysqli_query($conn,$sql);

$submit = $_GET['submit'];
// echo $submit;
if($submit==="Upload Internal Marks"){
  $marks = "internal_marks";
}
else{
  $marks = "external_marks";
}
// echo $marks;
// $select = "Select * from marks_projects where project='$value'";
// $sresult = mysqli_query($conn,$select);
// $rowm = mysqli_fetch_assoc($sresult);
// // print_r($rowm['internal_marks']);
// $im = $rowm['internal_marks'];
// // echo $im;
// $em = $rowm['external_marks'];
while($row = mysqli_fetch_array($result)){
  $member = $row['member'];
  $a = $_GET[$member];
  // echo $a;
  // echo "<br>";
  $select = "UPDATE `list` SET $marks=$a WHERE member='$member'";
  $sresult = mysqli_query($conn,$select);

}
?>
        <script>
            alert("Project Marks Updated");
            // window.location('http://localhost/project/Faculty/home.php');
        </script>
        <?php
        header('location:./home.php');
// if(isset($_POST['submit'])){
//   echo "ghj0";
//   while($row = mysqli_fetch_array($result)){
//     $a = $_GET['$row["member"]'];
//     echo $a;
//   }
//   }
?>