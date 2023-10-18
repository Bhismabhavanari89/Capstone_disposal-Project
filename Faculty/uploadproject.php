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
$query = "SHOW COLUMNS FROM count";
$restudent = mysqli_query($conn,$query);
// print_r($restudent);
if(isset($_POST['submit'])){
    echo $_POST['select'];
    $name = $_POST['pname'];
    $topic = $_POST['topic'];
    $members = $_POST['members'];
    $f_id = $_SESSION['id'];
    $value= $_POST['select'];
    // echo $value;

    // file values
    $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 $final_file=str_replace(' ','-',$new_file_name);
    $project = "select $value from count where f_id=$f_id";
    $presult = mysqli_query($conn,$project);
    print_r($presult);
    $pro = $presult->fetch_assoc();
    print_r($pro);
    // echo $pro[$value];
    $countpro = $pro[$value]+1;
    // echo $countpro;
    $updatecount = "update count set $value=$countpro where f_id=$f_id";
    $uresult = mysqli_query($conn,$updatecount);
    $project_id = $value."_".strval($f_id)."_".strval($countpro);
    //echo $project_id;
    $select = "INSERT INTO `projects`(`name`, `topic`, `f_id`,noofstudents,file_name,type,size,project_id) VALUES ('$name','$topic',$f_id,$members,'$final_file','$file_type','$new_size','$project_id')";
    move_uploaded_file($file_loc,"../uploads/".$file);
    $result = mysqli_query($conn, $select);
    if($result){
        ?>
            <script>
                alert("Project Uploaded");
                // window.location('http://localhost/project/Faculty/home.php');
            </script>
            <?php
            header('location:./home.php');
            
        }
    
 };
?>


<body>


<form action="" method="post" enctype="multipart/form-data">
    <h1>Project Upload</h1>
    <label for="">Project Name:</label>
    <input type="text" name="pname" id=""><br>
    <label for="">Topic</label>
    <input type="text" name="topic" id=""><br>
    <label for="">Number of Team members for project</label>
    <input type="number" name="members" id="" min="1"><br>
    

<label for="">Select Project</label>
<select id="select_page" name="select" style="width:200px;" class="operator"> 
         <option value="">Select a Project...</option>
         <?php 
                        foreach($restudent as $rowmember)
                        {
                            if($rowmember['Field']==='id' or $rowmember['Field']==='f_id' or $rowmember['Field']==='created_at' or $rowmember['Field']==='updated_at'){
                                continue;
                            }
                            else{
                                // echo $rowmember['Field'];
                                // echo '<option value="'.$rowmember.'">'.$rowmember.'</option>';
                                echo '<option value="'.$rowmember['Field'].'">'.$rowmember['Field'].'</option>';
                            }
    
                            echo "<br>";
                            // echo $rowmember;
                            $a = $rowmember;

                            
                        }
                        ?>
  </select><br>



                    



    <input type="file" name="file" /><br>
    <p>The file shouldn't contain spaces</p>
    <input type="submit" name="submit" value="Upload Project" class="form-btn">
</form>



</body>
</html>
<script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>