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
$Get_Courses2 =  $_GET['course'];
$course_code_sub1=$Get_Courses2."_submission";
$course_code_sub_rej1=$Get_Courses2."_sub_REJ";
$sql1 = "INSERT INTO $course_code_sub_rej1(name,mime,data,course,enrollment,fullname,description) SELECT  name,mime,data,course,enrollment,fullname,description FROM $course_code_sub1 WHERE id = '$id' ";
$sql2 = "DELETE FROM $course_code_sub1 WHERE id = '$id' "; 

if (mysqli_query($con, $sql1)) {
  if (mysqli_query($con, $sql2)) {
    
  echo "<script>
          alert('Rejected');
          window.location.href='view_sub.php?course=$Get_Courses2';
        </script>";
} } 
else 
{
  echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>