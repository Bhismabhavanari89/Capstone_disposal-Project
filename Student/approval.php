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
   header('location:login_form.php');
}
$id = $_SESSION['id'];
$user = "SELECT * FROM list l, projects p, faculty f where l.member = '$id' and l.pid = p.project_id and l.f_id = f.faculty_id";
$result = mysqli_query($conn, $user);
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
    $pid = $_POST['id'];
    $select = "UPDATE list SET status='accepted' WHERE member = '$id' and pid = '$pid'";
    $lresult = mysqli_query($conn, $select);
    $faculty = "Select f.email from faculty f, projects p where p.project_id = '$pid' and f.faculty_id = p.f_id";
    $lfaculty = mysqli_query($conn, $faculty);
    $lrow = $lfaculty->fetch_assoc();
    // print_r($lrow);
    // echo $pid;
    // echo "KK";
    if($lresult){
      $mail->addAddress($lrow['email'], $pid);
      $mail->Subject = "Your Project Has Approved By Member '$id'";
      $mail->Body = "Hello Your Project Has been Approved By Member '$id' and project-id '$pid'";
      $mail->AltBody = 'Hii Tjis a ddcf gvbh';
      if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
      } 
      else {
        echo 'Message sent!';
      }
        ?>
         <script>
            alert("Project Accepted");
            // window.location('http://localhost/project/Faculty/home.php');
            window.location.replace("./home.php");
        </script>
        <?php
        // header('location:./home.php');
        
    }
 };
?>
<table>
  <tr>
    <th>Project Id</th>
    <th>Project Name</th>
    <th>Faculty Topic</th>
    <th>Faculty Name</th>
    <th>Status</th>
    <th>Edit</th>
  </tr>
<?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
      
             <tr>
             <form action="" method="post">
             <td><?=$row['pid']?></td>
             <td><?=$row['name']?></td>
             <td><?=$row['topic']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['status']?></td>
          <?php 
          if($row['status']==='accepted'){
            ?>
            <td>Cannot Edit</td>
            <?php
          }
          else{
            ?>
            <td><input type="submit" name="submit" value="Accept"/>
            <input type="hidden" name="id" value="<?php echo $row['pid']; ?>"/></td></form>
            <?php
          }
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