<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gpn_cm_project";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con)
{
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$course = $_GET['course'];
$tbname=$course."_material";

$sql2 = "DELETE FROM $tbname WHERE id = '$id' "; 

  if (mysqli_query($con, $sql2)) {
    
  echo "<script>
          alert('Resource Deleted');
          window.location.href='delete_resource.php?passing_course=$course';
        </script>";
} 
else 
{
  echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>