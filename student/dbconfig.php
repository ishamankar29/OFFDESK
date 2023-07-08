<?php
$con = mysqli_connect("localhost","root","","gpn_cm_project");
 
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>
<?php
   
if (!isset($_SESSION['username'])) {
    header('location:\gpn_cm/login');
  }

$username7 = $_SESSION['username']; // get id through query string

$qry7 = mysqli_query($con,"select * from login_info where username='$username7'"); // select query

$data7 = mysqli_fetch_array($qry7);

$desig = $data7['DESIGNATION'];


if($desig!="student")
{
  header('location:\gpn_cm/login');
}



   ?>