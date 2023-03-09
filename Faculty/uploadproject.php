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

    $name = $_POST['pname'];
    $topic = $_POST['topic'];
    $members = $_POST['members'];
    $f_id = $_SESSION['id'];

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
    $select = "INSERT INTO `projects`(`name`, `topic`, `f_id`,noofstudents,file_name,type,size) VALUES ('$name','$topic',$f_id,$members,'$final_file','$file_type','$new_size')";
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
    <select name="select_box" class="form-select" id="select_box">
                        <option value="">Select Student</option>
                        <?php 
                        foreach($restudent as $rowmember)
                        {
                            if($rowmember['Field']==='id' or $rowmember['Field']==='faculty_id' or $rowmember['Field']==='created_at' or $rowmember['Field']==='updated_at'){
                                continue;
                            }
                            else{
                                echo $rowmember['Field'];
                                // echo '<option value="'.$rowmember.'">'.$rowmember.'</option>';
                                echo '<option value="'.$rowmember['Field'].'">'.$rowmember['Field'].'</option>';
                            }
    
                            echo "<br>";
                            // echo $rowmember;
                            $a = $rowmember;

                            
                        }
                        ?>  
                    <!-- </select> -->



    <input type="file" name="file" /><br>
    <p>The file shouldn't contain spaces</p>
    <input type="submit" name="submit" value="Upload Project" class="form-btn">
</form>



</body>
</html>