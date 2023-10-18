<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
  header('location:../login_form.php');
}

$id = $_SESSION['id'];
$projects = "SELECT DISTINCT(pid) FROM list, faculty f WHERE f_id = f.faculty_id and f_id = $id ORDER BY pid;";
$presult = mysqli_query($conn,$projects);
if(isset($_POST['submit'])){
  // $value= $_POST['select'];
  // echo $value;
   //file values
//    $file = $_FILES['file']['name'];
//    $file_loc = $_FILES['file']['tmp_name'];
// $file_size = $_FILES['file']['size'];
// $file_type = $_FILES['file']['type'];
// $folder="upload/";

// /* new file size in KB */
// $new_size = $file_size/1024;  
// /* new file size in KB */
// /* make file name in lower case */
// $new_file_name = strtolower($file);
// /* make file name in lower case */
// $final_file=str_replace(' ','-',$new_file_name);
$file = $_FILES["file"];
echo $file["name"];
  
  $a = $_POST['select'];
  //  $fid = $rrow['f_id'];
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
   echo $value;
   $file_name = $file["name"];
   $select = "insert into $value (f_id,p_id,file_name) values($id,'$a','$file_name')";
   $result = mysqli_query($conn,$select);
   move_uploaded_file($file["tmp_name"], "../uploads/" . $file["name"]);
   if($result){
    ?>
    <script>
        alert("Project Uploaded");
        // window.location('http://localhost/project/Faculty/home.php');
    </script>
    <?php
    header('location:./home.php');
    

   }

}
?>
<form action="" method="post" enctype="multipart/form-data">
<label for="">Select Project</label>
<select id="select_page" name="select" style="width:200px;" class="operator"> 
         <option value="">Select a Project...</option>
         <?php 
                        foreach($presult as $rowmember)
                        {
                            
                                // echo $rowmember['Field'];
                                // echo '<option value="'.$rowmember.'">'.$rowmember.'</option>';
                                echo '<option value="'.$rowmember['pid'].'">'.$rowmember['pid'].'</option>';
                            
    
                            echo "<br>";
                            // echo $rowmember;
                            // $a = $rowmember;

                            
                        }
                        ?>
  </select><br>
  <input type="file" name="file" /><br>
    <p>The file shouldn't contain spaces</p>
    <input type="submit" name="submit" value="Upload Project" class="form-btn">
</form>


<script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>