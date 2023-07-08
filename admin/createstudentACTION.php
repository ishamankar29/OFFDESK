
<!DOCTYPE html>
<html>
 <head>
   <title> CREATE STUDENT USER</title>
 </head>
<body>
  <style>
    body{
    font-family: "Times New Roman", Times, serif;
    background-color: #ffffff;
  }

  h3{ 
        text-align: center;
        letter-spacing: 1px;
        font-size: 40px;
        }

        form{
          font-size: 20px;
          text-align: center;
        }

        input {
  width: 20%;
  padding: 10px 18px;
  margin: 2px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 3px solid pink;
}

input:focus {
  border: 3px solid #ffccff;
 
}

input[type=submit] {
  width: 8%;
  background-color: #ffe6ff;
  color: black;
  padding: 12px 28px;
  margin: 5px 0;
  border: 2px solid pink ;
  border-radius: 4px;
  cursor: pointer;
  font-size: 17px;
}


</style>
</body>
</html>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
include "dbconfig.php";
 
// Escape user inputs for security
$username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    
    $semester = $_POST['semester'];
   
    //$courseAllotted = $_POST['courseAllotted'];
    $username= $_POST["username"];
      $pass= $_POST["username"];
      $pass=md5($pass);
      $designation= "student";
      $checkbox1 = $_POST['techno'];
      $chk = "";
      //$courseAllotted2 = $_POST['courseAllotted'];
    //$course_allotted = $_POST['course_allotted'];
 
 foreach($checkbox1 as $chk1)
 {
  $chk .= $chk1.",";
 }
// Attempt insert query execution

  $sql2 = "INSERT INTO login_info(USERNAME,PASSWORD,DESIGNATION,COURSE_ALLOTTED)  VALUES ('$username','$pass','$designation' ,'$chk')";

                      if(mysqli_query($con, $sql2)){
            $sql = "INSERT INTO user_student(username,first_name, last_name,  email,degree,course_allotted) VALUES ('$username','$first_name', '$last_name', '$email', '$semester','$chk')";
            if(mysqli_query($con, $sql)){

              
                      echo "<script>
                      alert('Student User created');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/createstudent.php';
                      </script>";}
                    }
                       else{
                            echo "<script>
                      alert('Student User already exists');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/createstudent.php';
                      </script>"; 
                            mysqli_error($con);
                            }  
   


//insert into login table
      
      


 
// Close connection
mysqli_close($con);
?>