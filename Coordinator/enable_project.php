<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php
include ('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
   header('location:../login_form.php');
}
$query = "SHOW COLUMNS FROM count";
$restudent = mysqli_query($conn,$query);
if(isset($_POST['submit'])){
    $value= $_POST['select'];
    // echo $value;
    $select = "ALTER TABLE project_submission ADD COLUMN $value varchar(255) default 0, ADD COLUMN status$value varchar(225) default 'enabled', ADD COLUMN file_name$value varchar(225), ADD COLUMN  type$value varchar(225), ADD COLUMN size$value varchar(225)";
    $result = mysqli_query($conn,$select);
    if($result){
        ?>
        <script>
            alert("Project Submission Created");
            // window.location('http://localhost/project/Faculty/home.php');
        </script>
        <?php
        header('location:./home.php');
    }
}

?>
<form method="post" action="">
    <h1>Enable Project Submission For Students</h1>
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
  <input type="submit" name="submit" value="Enable Project Submission" class="form-btn">
  </form>
  <script>
    $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("select").select2();
});
</script>