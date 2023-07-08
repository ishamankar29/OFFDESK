
<style>
    body{
       background-color: #eee6ff;
 font-family: "Times New Roman", Times, serif;
}
  </style>
<?php
include_once 'dbconfig.php';
 session_start(); 
   
if (!isset($_SESSION['username'])) {
    header('location:\gpn_cm/login');
  }
$username = $_GET['username'];
$sql = "DELETE FROM user_student WHERE username='$username'";
if (mysqli_query($con, $sql)) {
   echo "<script>
		alert('Student User Record deleted');
		window.location.href='http://127.0.0.1/gpn_cm/admin/editstudent.php';
		</script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}

$sql = "DELETE FROM  login_info WHERE username='$username'";
if (mysqli_query($con, $sql)) {
   echo "<script>
		alert('Login Record Deleted');
		window.location.href='http://127.0.0.1/gpn_cm/admin/editstudent.php';
		</script>";
} else {
    echo "Error deleting record: " . mysqli_error($con);
}


mysqli_close($con);


?>

