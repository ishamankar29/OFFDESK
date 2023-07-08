<?php

   session_start(); 
include 'dbconfig.php';

   ?>

<?php 
    $con=mysqli_connect('localhost' , 'root', '', 'gpn_cm_project');

    //check wheather user is login or not
  if (!isset($_SESSION['username'])) {
    header('location:INDEX_filler.php');
  }
  //END of check for login

 ?>  
<?php

include "dbconfig.php"; // Using database connection file here

$username1 = $_SESSION['username']; // get id through query string

$qry = mysqli_query($con,"select * from user_student where username='$username1'"); // select query

$data = mysqli_fetch_array($qry);?>

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
  width: 100%;
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
  width: 300px;
  background-color:  #ddccff;
  background-image: url(21.jpeg) ; 
  color:black;
  position: fixed;
  height: 100%;
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
<body>
 <script src='js/all.js' crossorigin='anonymous'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fontawesome.min.css">

<title>STUDENT</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
  <div class = "pog" ><a  href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a class="active" href="profile_student.php "><i class="fa fa-id-badge" style="font-size: 28px"></i> PROFILE</a>
     <a  href="mcq.php "><i class="fa fa-edit" style="font-size: 30px"></i> MCQ </a>
  <a href=" resource_view.php"><i class="fa fa-file" style="font-size:30px"></i> RESOURCES </a> </div>
  <div class="log">
  <a href="upload_sub.php "><i class='fa fa-upload' style="font-size:30px"></i>   UPLOAD SUBMISSION </a>
  <a href=" view_rejected_sub.php"><i class="fa fa-exclamation-circle" style="font-size:30px"></i> REJECTED SUBMISSION </a>
  <a href="about.php"><i class="fa fa-users" style="font-size: 34px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 34px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px" ></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
<left>
    <form method="" >
      <img src="avatar4.jpg" alt="Avatar" class="avatar">
     <br><br><b> <?php echo "Hello"." ". $data['first_name']." ".$data['last_name']?></b>
     <br><br><b> USERNAME:</b>
      <input type="text" name="username" value = "<?php echo $_SESSION['username']?>" disabled >
    <br>
  <b> FIRST NAME:</b>
    <input type="text" name="stud_Fname" value="<?php echo $data['first_name'] ?>" disabled>
    <br>
  <b> LAST NAME:</b>
    <input type="text" name="stud_Lname" value="<?php echo $data['last_name'] ?>" disabled>
    <br>
    <b>EMAIL:</b>
    <input type="text" name="stud_Fname" value="<?php echo $data['email'] ?>" disabled>
    <br>
   
    <b>DEGREE:</b>
    <input type="text" name="stud_Fname" value="<?php echo $data['degree'] ?>" disabled>
    <br>
   <b> COURSE ALLOTED:</b>
    <input type="text" name="stud_Fname" value="<?php echo $data['course_allotted'] ?>" disabled>
    <br>
    
    </center>

</div>



<?php mysqli_close($con);  // close connection ?>

</body>
</html>