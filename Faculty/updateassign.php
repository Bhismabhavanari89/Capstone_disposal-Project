<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';
// require './src/Exception.php';
require('/xampp/htdocs/Project/src/Exception.php');
// require './src/Exception.php';
require ('/xampp/htdocs/Project/src/PHPMailer.php');
require ('/xampp/htdocs/Project/src/SMTP.php');
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
include('../config.php');
include('header.php');
session_start();
if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}
$prid = $_GET['id'];
$fid = $_SESSION['id'];
// echo $fid;
$projects = "select * from projects where project_id = '$prid'";
$result = mysqli_query($conn, $projects);
$list = "select * from list where pid = '$prid' and f_id = $fid";
$rlist = mysqli_query($conn, $list);
// print_r($rlist);
// $abc = $rlist->fetch_assoc();
// print_r($abc);
// echo $id;
// $students = "select * from user_form";
// $stulist = mysqli_query($conn, $students);
// if(isset($_POST['submit'])){
//     $a = $_POST['cars'];
//     echo $a;
//  };
$query = "SELECT * FROM user_form";
$restudent = mysqli_query($conn,$query);
if(isset($_POST['submit'])){
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->SMTPAuth = true;
  $mail->Username = 'b.v.p.sbhismarao@gmail.com';
  $mail->Password = 'uxmlivagyobdiuns';
  $mail->setFrom('b.v.p.sbhismarao@gmail.com', 'Project');
  $mail->addReplyTo('replyto@example.com', 'First Last');
    //  $arraylist = array();
     $m = 1;
     $memberlist = $_POST['id'];
    while($m<$memberlist+1)
    {
      $a = $_POST[$m]; 
      $select = "INSERT INTO list (pid,f_id, member) VALUES ('$prid',$fid,'$a')";
      echo $m;
      echo "bn";
      $resul = mysqli_query($conn, $select);
      if($resul){
        $eselect = "Select email from user_form where registration_no='$a'";
        $eresult = mysqli_query($conn, $eselect);
        // print_r($eresult);
        foreach($eresult as $mailvalue){
          $mail->addAddress($mailvalue['email'], $a);
        $mail->Subject = 'Approved From Faculty For Project';
        $mail->Body = 'Hello Your Project Has been Approved Please login into the portal And Approve the Project';
        $mail->AltBody = 'Hii Tjis a ddcf gvbh';
        if (!$mail->send()) {
          echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
        else {
          echo 'Message sent!';
        }
        }
        
        $m++;
      } 
      else{
        echo $resul;
        break;
      }                      
    }
    ?>
    <script>
    window.location.replace("http://localhost/project/Faculty/home.php");
    </script>
    <?php
    
  header('location:./home.php');
    echo $m;
    echo $memberlist;
    echo $m+1==$memberlist;
      // echo $m;
    // echo "bbnnnn";
    // echo $mem;
  
  
  // function save_mail($mail)
  // {
  //     $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
  //     $imapStream = imap_open($path, $mail->Username, $mail->Password);
  
  //     $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
  //     imap_close($imapStream);
  
  //     return $result;
  // }
  };
?>

<link rel="stylesheet" href="style.css">
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
        $memberlist = $row['noofstudents'];
        }
?> 
      </div>
    
    <div class="two">
<?php
        $rowl = $rlist->fetch_assoc();
        // print_r($rowl);
        if($rowl){
          // print_r($rowl);
          // while($rowl){
            ?>


            
            <h3>Assign Not Available Because It has team members</h3>
            <?php
          // }

        }
        else{
?>
            <form action="" method="post">
              <h1>Update Project For Team Members</h1>
              <input type="hidden" name="id" value="<?php echo $memberlist; ?>"/>
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
        <label for="">Member<?=$m?>:</label>
        <input type="text" list="input" name="<?=$m?>">
      <datalist id="input" style="width:200%">
<?php 
      $arraylist = array();
      foreach($restudent as $rowmember)
      {
          //$a = $rowmember['email'];
?>
          <option value="<?=$rowmember["registration_no"]?>"><?=$rowmember["registration_no"]?></option>;
<?php
      }
?> 
      </datalist><br>
<?php
        $m++;
      }
?>


      <input type="submit" name="submit" value="Update Project" class="form-btn">
  </form><?php } ?>
     </div>
      </div>  
      <script src="main.js"></script>
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

<!-- <script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script> -->
<!-- <script src="select2.min.js"></script>
<script>
$("#country").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script> -->
<script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>