<?php
session_start ();
include_once "dbconfig.php";


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

input[type=password], select {
  width: 100%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
.sidebar a, .dropdown-btn {
  padding:16px;
  text-decoration: none;
   /*menubar variable  size*/
  color: black;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.sidenav a:hover:not(.active), .dropdown-btn:hover {
  
background-color: white;
  color: black;

}
.dropdown-container {
  display: none;
  background-color: black;
  padding-left: 8px;
  
}

/* Optional: Style the caret down icon */
.fa-chevron-circle-down {
  float: right;
  padding-right: 10px;
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

<title>STUDENT</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
  <div class = "pog" ><a href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a href="profile_student.php "><i class="fa fa-id-badge" style="font-size: 28px"></i> PROFILE</a>
     <a  href="mcq.php "><i class="fa fa-edit" style="font-size: 30px"></i> MCQ </a>
  <a href=" resource_view.php"><i class="fa fa-file" style="font-size:30px"></i> RESOURCES </a> </div>
  <div class="log">
  <a href="upload_sub.php "><i class='fa fa-upload' style="font-size:30px"></i>   UPLOAD SUBMISSION </a>
  <a href=" view_rejected_sub.php"><i class="fa fa-exclamation-circle" style="font-size:30px"></i> REJECTED SUBMISSION </a>
   <a href="about.php"><i class="fa fa-users" style="font-size: 34px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 34px"></i> CONTACT</a>
  <a class="active" href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px" ></i> CHANGE PASSWORD</a>

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
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
</body>
</html>
