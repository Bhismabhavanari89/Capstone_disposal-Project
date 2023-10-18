<?php
// $q = intval($_GET['q']);
include('../config.php');
include('header.php');
session_start();

if(!isset($_SESSION['id'])){
    header('location:../login_form.php');
 }
$id = $_SESSION['id'];
$query = "SELECT distinct(pid) FROM list where f_id=$id";
$restudent = mysqli_query($conn,$query);
?>


<html>
<head>
<script>
  var x = "";
  function test(a) {
    x = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
    // alert(x);
}

    // console.log(document.getElementById('greet').value);
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    // console.log(str);
    
//Expected output: hello
    // $marks = document.getElementById("marks");
    // console.log($marks);
    // alert(x);
    xmlhttp.open("GET","marksuser.php?q="+str+"&marks="+x,true);
    xmlhttp.send();

  }
}
</script>
</head>
<body>
<!-- <select onchange="test(this)" id="select_id">
    <option value="0">-Select-</option>
    <option value="1">Communication</option>
    <option value="2">Communication</option>
    <option value="3">Communication</option>
</select> -->

<!-- <script>
 document.getElementById("comboA").onchange = function(){
    var value = document.getElementById("comboA").value;
    // console.log(value);
 };
 console.log(value);
</script> -->
<form>
    <label for="">Mark Type</label>
    <select name="markstype"  onchange="test(this)" id="select_id">
        <option value="">Select a Mark Type</option>
        <option value="internal_marks">Internal Marks</option>
        <option value="external_marks">External Marks</option>
    </select><br><br>
    <label for="">Select Project</label>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a project:</option>
  <!-- <option value="3">3</option>
  <option value="4">4</option> -->
  <?php 
      $arraylist = array();
      foreach($restudent as $rowmember)
      {
          //$a = $rowmember['email'];
?>
          <option value="<?=$rowmember["pid"]?>"><?=$rowmember["pid"]?></option>;
<?php
      }
?> 
  </select>
</form>
<br>
<div id="txtHint"><b>Project info will be listed here...</b></div>

</body>
</html>