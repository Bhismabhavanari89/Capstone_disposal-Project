<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> -->


<?php

include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
 }
$prid = $_GET['id'];
$fid = $_SESSION['id'];
// echo $fid;
$projects = "select * from projects where id = $prid";
$result = mysqli_query($conn, $projects);
$list = "select * from list where pid = $prid and fid = $fid";
$rlist = mysqli_query($conn, $list);
// echo $id;
// $students = "select * from user_form";
// $stulist = mysqli_query($conn, $students);
// if(isset($_POST['submit'])){
//     $a = $_POST['cars'];
//     echo $a;
//  };
$query = "SELECT email FROM user_form";
$restudent = mysqli_query($conn,$query);

?>


<body>

<div id="container">
  <div class="one">  
<?php
        while($row = $result->fetch_assoc()){
            ?>
    <h1>Project Name</h1>
    Project Id:<?=$row['id']?><br>
    Project Name:<?=$row['name']?><br>
    Project Topic:<?=$row['topic']?><br>
    
        <?php
        $mem = $row['noofstudents'];
        }
      ?> 
      </div>
    
    <div class="two">
        <?php
        $rowl = $rlist->fetch_assoc();
        if($rowl){
            ?>
            <?=$rowl['team1']?>
    <?=$rowl['team2']?>
    <?=$rowl['team3']?>
    <?=$rowl['team3']?>
    <?=$rowl['team4']?>
    <?php
        }
        else{
            ?>
            <form action="" method="post">
              <h1>Update Project For Team Members</h1>

      <!-- <label for="">Member 1:</label>
      <input type="text" name="t1" id=""><br>
      <label for="">Member 2:</label>
      <input type="text" name="t2" id=""><br>
      <label for="">Member 3:</label>
      <input type="text" name="t3" id=""><br>
      <label for="">Member 4:</label>
      <input type="text" name="t4" id=""><br> -->
      <?php
      $m =1;
      while($m<$mem+1){
        ?>
        <label for="">Member <?=$m?>:</label>
        <select name="<?=$m?>"  id="country">
                          <option value="">Select Student</option>
                          <?php 
                          foreach($restudent as $rowmember)
                          {
                              //$a = $rowmember['email'];
                              echo '<option value="'.$rowmember["email"].'">'.$rowmember["email"].'</option>';
                              
                          }
                          ?>  
                      </select><br>
        <?php
        $m++;
      }
      ?>


      <input type="submit" name="submit" value="Update Project" class="form-btn">
  </form>
            <?php
           
        }
        ?>
        
     
     </div>
      </div>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<script src="select2.min.js"></script>
<script>
$("#country").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>
</body>
</html>


<style>
    #container{
  margin: 0 auto;
  width:100%;
  padding-top:50px;
}

.one{
  background:#FFEB3B;
  width:50%;
  height:400px;
  float:left;
}
.two{
  width:50%;
  height:400px;
  background:#8BC34A;
  overflow:hidden;
}

</style>

<script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>
<!-- <script src="select2.min.js"></script>
<script>
$("#country").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script> -->

<?php
if(isset($_POST['submit'])){
  $arraylist = array();
  $me = 1;
  while($me<$mem+1)
  {
    $b = $_POST[$me];
    array_push($arraylist,$b);
    $me++;                          
  }
    
  print_r($arraylist);
 };
?>