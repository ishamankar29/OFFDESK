<?php

include_once "dbconfig.php";
session_start ();
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
$user = $_SESSION['username'];
//user is logged in
if ($_POST)
{
  //check fields
  $oldpassword =$_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $repeatnewpassword =$_POST['repeatnewpassword'];

      $olpassword = stripcslashes($oldpassword);
      $newpassword = stripcslashes($newpassword);
      $repeatnewpassword = stripcslashes($repeatnewpassword);
  //check password against db
          $oldpassword = mysqli_real_escape_string($con, $oldpassword);
          $newpassword = mysqli_real_escape_string($con, $newpassword);  
          $repeatnewpassword = mysqli_real_escape_string($con, $repeatnewpassword); 
            
            $oldpassword=md5($oldpassword);
            $newpassword=md5($newpassword);
            $repeatnewpassword=md5($repeatnewpassword);
  //connect to db
  //$con = mysqli_connect ("localhost","root","","offdesk_db") or die();
  //mysqli_select_db("offdesk_db")or die();

  $queryget = mysqli_query ($con,"SELECT PASSWORD FROM login_info WHERE USERNAME='$user' ")or die ("Query didnt work");
  $row = mysqli_fetch_assoc($queryget);
  $oldpassworddb = $row['PASSWORD'];
  
  //echo"$oldpassworddb";


/*
  <?Php
include "dbconn.php";
$queryget = mysqli_query ($con,"SELECT PASSWORD FROM log_table WHERE username=1812010")or die ("Query didnt work");
  $row = mysqli_fetch_assoc($queryget);
  $oldpassworddb = $row['PASSWORD'];
  echo"$oldpassworddb";
  //echo $row;
  ?>*/

  //check passwords
  if($oldpassword==$oldpassworddb)
  {
//check the new password
    if ($newpassword==$repeatnewpassword)
    {
      if ($newpassword==$oldpassworddb) {

        echo"<script>
    alert('old password and new password are same');
    window.location.href='/gpn_cm/login';
    </script>";
      }
      //succes
      //change password in db
      $querychange = mysqli_query ($con,"UPDATE login_info SET PASSWORD='$newpassword' WHERE USERNAME='$user'");
      
      echo"<script>
    alert('Your password has been changed ');
    </script>";
      
    
    }
    else {
       echo"<script>
    alert(' New password dont match!');
    </script>"; 
           }
       }
  else {
  echo"<script>
    alert(' Old password doesnt match!');
    </script>";
         }
}
/*else
{
echo("
<form action ='change-password.php' method='POST'>
 Old password: <input type ='text' name ='oldpassword'><p>
 New password: <input type='password' name='newpassword'><br>
 Repeat new password <input type='password' name='repeatnewpassword'><p>
 <input type='submit' name='submit' value='Change password'>
</form>
");
}
*/

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
  width: 100%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
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
  <a href=" view_approved_sub.php"><i class="" style="font-size:30px"></i> APPROVED SUBMISSION </a>
  <a href="about.php"><i class="fa fa-users" style="font-size: 30px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 30px"></i> CONTACT</a>
  <a class="active" href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px"></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
  <center>
 
  <h2>Change Password</h2>
  </center>

  <form  action="change_pass.php" method="POST">
        
          <br>
          <div class="container">  
          
                    Old password: 
                    <input type ='password' id='mypass'name ='oldpassword'> 
                    <center>
                    <input type="checkbox" onclick="myFunction()">
                  </center>
                <script>
                function myFunction() {
                var x = document.getElementById("mypass");
                if (x.type === "password") {
                      x.type = "text";
                  } else 
                  {
                      x.type = "password";
                }
                }
                  
                </script>
                </div>

          <div> 
            New password:      
            <input type='password'id='mynpass' name='newpassword'> 
            <center>
            <input type="checkbox" onclick="mynFunction()">
</center>
              <script>
              function mynFunction() {
                var x = document.getElementById("mynpass");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
              </script>
          </div>

                    Confirm Password: <input type='password' id='mycpass'name='repeatnewpassword'> 
                    <center>
                            <input type="checkbox" onclick="myrFunction()">

          <div><br><br><input type="submit" value="Change Password"></input></div>
        </center>
              <script>
              function myrFunction() {
                var x = document.getElementById("mycpass");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
              </script>
          </div>
</div>
               
  
  </form> 
  </center>
</div>

</body>
</html>
