<?php

include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
 }
$id = $_SESSION['pid'];
$projects = "select * from projects where id = $id";
$result = mysqli_query($conn, $projects);

if(isset($_POST['submit'])){
    $name = $_POST['pname'];
    $topic = $_POST['topic'];
    $select = "UPDATE projects SET name='$name',topic='$topic' WHERE id = $id";
    $result = mysqli_query($conn, $select);
    
    if($result){
        ?>
        <script>
            alert("Project Updated");
            // window.location('http://localhost/project/Faculty/home.php');
        </script>
        <?php
        unset($_SESSION['pid']);
        header('location:./home.php');
        
    }
 };
?>


<body>
<div id="container">
  <div class="one">
<?php
        while($row = $result->fetch_assoc()){
            // echo $row['id'];
            ?>
    <h1>Existing Values</h1>
    ProjectId:<?=$row['project_id']?><br>
    Project Name:<?=$row['name']?><br>
    Project Topic:<?=$row['topic']?><br>
    <a href="../uploads/<?=$row['file_name']?>">Click Download</a>
    
        <?php

        }
        
      
      ?>

   </div>
    
  <div class="two"><form action="" method="post">
    <h1>Update Project</h1>
    <label for="">Project Name:</label>
    <input type="text" name="pname" id=""><br>
    <label for="">Topic</label>
    <input type="text" name="topic" id=""><br>
    <input type="submit" name="submit" value="Update Project" class="form-btn">
</form>
   </div>
    </div> 




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