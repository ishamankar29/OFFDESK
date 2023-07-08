<?php
session_start();
include_once 'dbconfig.php';
//$con=mysqli_connect('localhost','root','','gpn_cm_project');

$con = mysqli_connect("localhost","root","","gpn_cm_project");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

}

if (!isset($_SESSION['username'])) {
    header('location:\gpn_cm/login');
  }
  include 'dbconfig.php';

$username7 = $_SESSION['username']; // get id through query string

$qry7 = mysqli_query($con,"select * from login_info where username='$username7'"); // select query

$data7 = mysqli_fetch_array($qry7);

$desig = $data7['DESIGNATION'];


if($desig!="admin")
{
  header('location:\gpn_cm/login');
}
?>

<!DOCTYPE html>
<head>
<style>

h1{


  display: block;
  font-size: 200%;
  margin-top: 0.67em;
  margin-bottom: 0.67em;
  margin-left: 3px;
  margin-right: 0;
  font-weight: bold;
  padding: 10px;
  font-family:Georgia, serif ;


}
body {
  background-color: white;
  margin: 0;
  font-family: "Lato", sans-serif;


}
input[type=text], select {
  width: 100%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 50%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 50%;
  background-color: #004d99;
  color: #FFFFFF;
  padding: 14px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}

input[type=submit]:hover {
  background-color: #004d99;
  color: #FFFFFF;
  
}

 
.sidebar {
  margin: 0;
  padding: 0;
  width: 290px;
  background-color:  #ddccff;
  background-image: url(21.jpeg) ; 
  color:black;
  position: fixed;
 height : 100%;
  overflow: auto;
    
  padding: 0px;
 box-shadow: 0 0 5px 10px lightgrey;
}
div.pog {
  padding-left: 6px;
}
div.log
{
  padding-left: 7px;

}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 38%;
  border-radius: 50%;
}
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  color : black; 
}
 
.sidebar a.active {
  background-color: white ;
  color: black;
}

.sidebar a:hover:not(.active) {
  background-color: #004d99;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 5% 15%;
  height: 100%;


}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
  
  <script src='js/all.js' crossorigin='anonymous'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fontawesome.min.css">

<title>ADMIN</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
    <div class = "pog" ><a  href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a  href="createstudent.php"><i class="fa fa-graduation-cap" style="font-size: 30px"></i> CREATE STUDENT</a>
  <a href="editstudent.php"><i class="fa fa-edit" style="font-size: 30px"></i>  EDIT STUDENT</a> </div>
  <div class="log">
  <a href="createteacher.php"><i class="fa fa-user"  style="font-size: 30px"></i>   CREATE TEACHER</a>
  <a href="editteacher.php"><i class='fa fa-edit' style="font-size: 30px"></i>   EDIT TEACHER</a>
  <a href="create_course.php"><i class="fa fa-book"style="font-size: 30px"></i> CREATE COURSE</a>

  <a href="dlt_course.php"><i class="fa fa-trash"style="font-size: 30px"></i> DELETE COURSE RECORDS</a>
  <a href=""><i class="fa fa-eye"style="font-size: 30px"></i> VIEW</a>
  <a href=" resource_view.php"><i class="" style="font-size:30px"></i> RESOURCES </a>
  <a class="active" href=" view_approved_sub.php"><i class="" style="font-size:30px"></i> APPROVED SUBMISSION </a>
  <a href="about.php"><i class="fa fa-users" style="font-size: 30px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 30px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px"></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
  <h1>VIEW STUDENTS' APPROVED SUBMISSION</h1>
  <center>
    <table width="90%" border="1" align="center" cellspacing="0" cellpadding="1" bgcolor= #e6f2ff>
        <tr>    
        <th bgcolor=#b3d9ff>COURSE CODE</th>&nbsp&nbsp
        <th bgcolor=#b3d9ff>DATA</th>&nbsp&nbsp
        <th bgcolor=#b3d9ff> ENROLLMENT </th>
        <th bgcolor=#b3d9ff> STUDENT NAME </th>
        <th bgcolor=#b3d9ff> DESCRIPTION </th>
        <th bgcolor=#b3d9ff> GRADE </th>
    <center>
    <form action="view_approved_sub.php" method = "get">
    <label for="course">Course Code:</label>
           <select id="course" name="course" required>
           
<option value="" disabled selected hidden>Choose a Course Code</option>
  <?php $records = mysqli_query($con, "SELECT `course_code` From course_log_table ");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['course_code'] ."'>" .$data['course_code'] ."</option>";  // displaying data in option menu

        }

        ?>
         
            <?php  ?>   
     </select>
    <input type="submit">
    <br><br><br>
    </center>
      
      <?php
      error_reporting(0);
      $n =  $_GET["course"];
      $_SESSION['approved_course_code1'] = $n;
      $course_code_app_sub=$n."_sub_APP";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,'gpn_cm_project');
      $query = " SELECT * FROM `$course_code_app_sub`where `course` = '$n'";
      $query_run = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_array($query_run)) 
      {
        ?>
        <tr>
           <td align="center"><?php echo $row['course']; ?></td>
           <td align="center">
            <br><br>

            <?php 
          echo "<li><a target='_blank' href='view_approved_sub2.php?id=".$row['id']."'>".$row['name']."</a><br/>
       <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."'width='500' height='300'/></li>";
                        ?>       
           &nbsp &nbsp &nbsp 
           &nbsp &nbsp &nbsp
           &nbsp &nbsp &nbsp 
           <br><br>
           </td>
           <td align="center"><?php echo $row['enrollment']; ?></td>
           <td align="center"><?php echo $row['fullname']; ?></td>
           <td align="center"><?php echo $row['description']; ?></td>
           <td align="center"><?php echo $row['grade']; ?></td>      
           </tr>
           </form>
          <?php } ?>
        
</table>    
</form> 
</center>
</body>
</html>