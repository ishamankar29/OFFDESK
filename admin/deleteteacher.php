
<?php
include "dbconfig.php";

$username = $_GET['username'];


$sql = "DELETE FROM user_teacher WHERE username='$username'";  

if (mysqli_query($con, $sql)) {

   $delete = "DELETE FROM login_info WHERE USERNAME ='$username'";

    if(mysqli_query($con, $delete)){
            echo"<script>
                      alert('Teacher User Deleted');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/editteacher.php';
                      </script>";
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($con);
        }
    
} 
mysqli_close($con);
?>