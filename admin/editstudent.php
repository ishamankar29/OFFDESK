<?php
   session_start(); 
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
 
    <div class = "pog" ><a href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a  href="createstudent.php"><i class="fa fa-graduation-cap" style="font-size: 30px"></i> CREATE STUDENT</a>
  <a class="active" href="editstudent.php"><i class="fa fa-edit" style="font-size: 30px"></i>  EDIT STUDENT</a> </div>
  <div class="log">
  <a href="createteacher.php"><i class="fa fa-user"  style="font-size: 30px"></i>   CREATE TEACHER</a>
  <a href="editteacher.php"><i class='fa fa-edit' style="font-size: 30px"></i>   EDIT TEACHER</a>
  <a href="create_course.php"><i class="fa fa-book"style="font-size: 30px"></i> CREATE COURSE</a>

  <a href="dlt_course.php"><i class="fa fa-trash"style="font-size: 30px"></i> DELETE COURSE RECORDS</a>
  <a href="#contact"><i class="fa fa-eye"style="font-size: 30px"></i> VIEW</a>
  <a href=" resource_view.php"><i class="" style="font-size:30px"></i> RESOURCES </a>
  <a href=" view_approved_sub.php"><i class="" style="font-size:30px"></i> APPROVED SUBMISSION </a>
  <a href="about.php"><i class="fa fa-users" style="font-size: 30px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 30px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px"></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
   <title> EDIT STUDENT USERS </title>



   <link rel="stylesheet" href="style.css">
 </head>
<body>
 <style>
  
      
    </style>
    <h2> STUDENTS INFORMATION </h2>

<form method="GET" action="editstudent.php">
<label for="u_batch">Choose a Batch:</label>

<select id="u_batch" name="u_batch">

  <option value="">All</option>
  <option value="16">2016 Batch</option>
  <option value="17">2017 Batch</option>
  <option value="18">2018 Batch</option>
  <option value="19">2019 Batch</option>
  <option value="20">2020 Batch</option>
  
</select>
<input type="submit" name="save" >
</form>
<center>
<button onclick="window.print()"><i class="fa fa-print "></i>  Print as PDF</button>
</center>
<br>
 <?php
error_reporting(0);
include_once 'dbconfig.php';
if(isset($_GET['save']))
{  
   ?>
<?php
include_once 'dbconfig.php';

$batch = $_GET['u_batch'];

$result = mysqli_query($con,"SELECT * FROM user_student where username like '$batch%'");
}
?>
<?php
if (mysqli_num_rows($result) > 0) {
?><style>
  
        table {
          border-collapse: collapse;
        width: 100%;

           ;
        }
      th, td {
        font-size: 19px;
      text-align: left;
      padding: 8px;
      text-align: center;
    }
    

    th {
      font-size: 20px;
      background-color: #b3d9ff;
      color: black;
    }

   
  
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
    <style type="text/css">
    @media print{
  body * {
    visibility: hidden;
  }
  .edit_student_table, .edit_student_table *{
    visibility: visible;
  }
.edit_student_table{
    position: absolute;
    left : 1px;
    right : 1px;
    top : 5px;
  }
</style>

<div class="edit_student_table">
<table>

   <center><table width="90%" border="1" cellspacing="0" cellpadding="1" bgcolor=white>
    <tr>
      <th bgcolor=#b3d9ff>USERNAME</th>
    <th bgcolor=#b3d9ff>FIRST NAME</th>
    <th bgcolor=#b3d9ff>LAST NAME</th>
    <th bgcolor=#b3d9ff>EMAIL</th>
    
    <th bgcolor=#b3d9ff>DEGREE</th>
    <th bgcolor=#b3d9ff>ALLOTED_COURSE</th>
    <th bgcolor=#b3d9ff>UPDATE  </th>
    <th bgcolor=#b3d9ff>DELETE </th>
    
    </tr>
    
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>

    <tr>
      <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
   
    <td><?php echo $row["degree"]; ?></td>
    <td><?php echo $row["course_allotted"]; ?></td>
        <td><a href="updatestudent.php?username=<?php echo $row["username"]; ?>">UPDATE</a></td>
        <td><a href="deletestudent.php?username=<?php echo $row["username"]; ?>">DELETE</a></td>
      </tr>
      <?php
      $i++;
      }
      ?>
    </center>
</table>
    </div>

 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>


</div>

</body>
</html>
