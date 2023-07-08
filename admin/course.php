<?php
include_once 'dbconfig.php';


if(isset($_POST['save']))
{  

   $COURSE_CODE = $_POST['course_code'];

   $COURSE_NAME = $_POST['course_name'];

   $sql = "INSERT INTO course_log_table(course_code,course_name) 
   VALUES ('$COURSE_CODE','$COURSE_NAME')";





if (mysqli_query($con, $sql)) {
        
      
        echo " inserted!";
       } 
else {
        echo "Error: " . $sql . "
    " . mysqli_error($con);
       }

/*  echo "Table $COURSE_CODE created successfully";
} else {
  echo "Error creating table: " . mysqli_error($con);
}*/



       
       //mysqli_close($con);
}
     

?>

<?php


// checking connection
$con = mysqli_connect("localhost","root","","gpn_cm_project");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if(isset($_POST['save']))
{  

   $COURSE_CODE2 = $_POST['course_code'];
   $course_code_que= $COURSE_CODE2 ."_quiz_que";
   $course_code_response=$COURSE_CODE2 ."_quiz_response";
   $course_code_sub=$COURSE_CODE2 ."_submission";
  $course_code_material=$COURSE_CODE2 ."_material";

   $course_code_sub_APP=$COURSE_CODE2 ."_sub_APP";
   $course_code_sub_REJ=$COURSE_CODE2 ."_sub_REJ";



$sql3= "CREATE TABLE $course_code_sub(
        id INT(11)  AUTO_INCREMENT, 
        name VARCHAR(255) NOT NULL,
        mime VARCHAR(255) NOT NULL,
        data LONGBLOB NOT NULL,
        course VARCHAR(255) NOT NULL,
        enrollment VARCHAR(255) NOT NULL,
        fullname VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        grade int(11) NOT NULL,
        
        
        PRIMARY KEY ( id )
        )";


$sql4= "CREATE TABLE $course_code_material(
        id INT(11)  AUTO_INCREMENT, 
        name VARCHAR(255) NOT NULL,
        mime VARCHAR(255) NOT NULL,
        data LONGBLOB NOT NULL,
        course VARCHAR(255) NOT NULL,
        upload_by VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        
        PRIMARY KEY ( id )
        )";

$sql5= "CREATE TABLE $course_code_sub_APP(
        id INT(11)  AUTO_INCREMENT, 
        name VARCHAR(255) NOT NULL,
        mime VARCHAR(255) NOT NULL,
        data LONGBLOB NOT NULL,
        course VARCHAR(255) NOT NULL,
        enrollment VARCHAR(255) NOT NULL,
        fullname VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        grade int(11) NOT NULL,
        
        PRIMARY KEY ( id )
        )";

$sql6= "CREATE TABLE $course_code_sub_REJ(
        id INT(11)  AUTO_INCREMENT, 
        name VARCHAR(255) NOT NULL,
        mime VARCHAR(255) NOT NULL,
        data LONGBLOB NOT NULL,
        course VARCHAR(255) NOT NULL,
        enrollment VARCHAR(255) NOT NULL,
        fullname VARCHAR(255) NOT NULL,
        description VARCHAR(255) NOT NULL,
        grade int(11) NOT NULL,
        PRIMARY KEY ( id )
        )";


                          if ($con->query($sql3) === TRUE) {
                                    if ($con->query($sql4) === TRUE) {
                                                        if ($con->query($sql5) === TRUE) {
                                                                          if ($con->query($sql6) === TRUE) {

                                                         echo "<script>
              alert('Hello, Course created successfully !');
              window.location.href='http://localhost/gpn_cm/admin/create_course.php';
              </script>";
            }
       }
      
  }
} else {
    echo "Error creating table: " . $con->error;
}
}

$con->close();
?>