<?php

include ('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}
$s = "Select * from user_form";
$sr = mysqli_query($conn, $s);
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    // echo $id;
    $map = $_POST['map'];
    $select = "insert into intern_nw (registration_no,status) values('$id','$map')";
    $result = mysqli_query($conn, $select);
    if($result){
        ?>
    <script>
        alert("Member Updated");
    window.location.replace("./home.php");
    </script>
    <?php
    
    }
}

?>
<form action="" method="post">
<h1>Change Student To Internship/Not Working</h1>
<label for="">Member:</label>
        <input type="text" list="input" name="id">
      <datalist id="input" style="width:200%">
<?php 
      $arraylist = array();
      foreach($sr as $rowmember)
      {
          //$a = $rowmember['email'];
?>
          <option value="<?=$rowmember["registration_no"]?>"><?=$rowmember["registration_no"]?></option>;
<?php
      }
?> 
      </datalist><br>
      <label for="mapp">Mapping</label>

<select name="map" id="map">
  <option value="">--Select Option--</option>
  <option value="internship">Internship</option>
  <option value="notworking">Not Working</option>
</select><br>
<input type="submit" name="submit" value="Update Member" class="form-btn">
      </form>