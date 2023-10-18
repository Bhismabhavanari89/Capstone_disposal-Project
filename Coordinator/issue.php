<?php

include ('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}
$s = "Select * from issues where status = 'pending'";
$sr = mysqli_query($conn, $s);
if(isset($_POST['submit'])){
   $uid = $_POST['id'];
   $fid = $_POST['fid'];
   $nfid = $_POST['nfid'];
   $select = "select * from list where member = '$uid'";
   $result = mysqli_query($conn, $select);
   $rrow = $result->fetch_assoc();
   print_r($rrow);
   $a = $rrow['pid'];
   $fid = $rrow['f_id'];
   $value = "";
   $count = 0;
   for($x=0;$x<strlen($a);$x++){
      if($a[$x]=='_'){
         $count+=1;
         if($count==2){
            break;
         }
         else{
            $value.=$a[$x];
         }
      }
      else{
         $value.=$a[$x];
      }
   }
   echo $fid;
   // print_r($value);
   $project = "select $value from count where f_id=$nfid";
    $presult = mysqli_query($conn,$project);
    print_r($presult);
    $pro = $presult->fetch_assoc();
    print_r($pro);
    // echo $pro[$value];
    $countpro = $pro[$value]+1;
    // echo $countpro;
    $updatecount = "update count set $value=$countpro where f_id=$nfid";
    $uresult = mysqli_query($conn,$updatecount);
    $project_id = $value."_".strval($nfid)."_".strval($countpro);
    $uselect = "UPDATE `projects` SET project_id='$project_id',`f_id`=$nfid WHERE f_id = $fid and project_id ='$a'";
   //  move_uploaded_file($file_loc,"../uploads/".$file);
    $uresult = mysqli_query($conn, $uselect);
    $ls = "update list set pid = '$project_id',`f_id`=$nfid where pid ='$a'";
    $lr = mysqli_query($conn, $ls);
    $is = "update issues set status = 'solved' where registration_no = '$uid'";
    $isr = mysqli_query($conn, $is);
    if($uresult){
      ?>
      <script>
          alert("Updated")
  window.location.replace("./home.php");
  </script>
  <?php
  }

    

}
?>
  <table>
  <tr>
    <th>Registration Number</th>
    <th>Project Id</th>
    <th>Issue</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Submit</th>
  </tr>
<?php
while($row = $sr->fetch_assoc()){
   ?>
   <tr>
   <td><?=$row['registration_no']?></td>
    <td><?=$row['p_id']?></td>
    <td><?=$row['issue']?></td>
    <td><?=$row['status']?></td>
    <form action="" method="post"> 
    <td><input type="text" name="nfid" placeholder="Give New Faculty Id"></td>
    <td><input type="submit" name="submit" value="Submit"/>
         <input type="hidden" name="id" value="<?php echo $row['registration_no']; ?>"/>
         <input type="hidden" name="fid" value="<?php echo $row['p_id']; ?>"/>
         </td></form>
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
