<?php
include_once 'dbconfig.php';
//$con=mysqli_connect('localhost','root','','gpn_cm_project');

$con = mysqli_connect("localhost","root","","gpn_cm_project");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

}
?>
<?php
if(isset($_POST['save']))
{  

$C_CODE = $_POST['course'];

   $Q_NAME = $_POST['quizname'];
   $Q_NO=$_POST['ques_no'];

  

   $quiz_name = $_POST['quizname'];
   $que_no = $_POST['ques_no'];
   $course_code=$_POST['course'];

   $quiz_time=$_POST['quiz_time'];
   //$_SESSION['course']=$course_code;
   $QUIZ_que=$course_code."_".$quiz_name."_que";
   $QUIZ_response=$course_code."_".$quiz_name."_response";

 $sql = "INSERT INTO quiz_log_table(course_code,quiz_name,question_no,quiz_time) 
   VALUES ('$C_CODE','$Q_NAME','$Q_NO','$quiz_time')";


$question_tb="CREATE TABLE $QUIZ_que(
        id INT(11) AUTO_INCREMENT , 
        que VARCHAR(255) NOT NULL,
        option_1 VARCHAR(255) NOT NULL,
        option_2 VARCHAR(255) NOT NULL,
        option_3 VARCHAR(255) NOT NULL,
        option_4 VARCHAR(255) NOT NULL,
        ans VARCHAR(255) NOT NULL,
        
        PRIMARY KEY ( id )
        )";
$response_tb = "CREATE TABLE $QUIZ_response(
        id INT(11) AUTO_INCREMENT , 
        stud_Fname VARCHAR(255) NOT NULL,
        stud_Lname VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        course_id VARCHAR(255) NOT NULL,
        
        score INT(3) NOT NULL,
        
        PRIMARY KEY ( id )
        )";

$x = 1;



/*
while( $x <= $que_no)
                                    {
                                        $quecolm = "userans_Q".$x;
                                        //$sql2= "ALTER TABLE $QUIZ_response ADD `$quecolm` VARCHAR(255) NOT NULL" ;
                                        mysqli_query($con,"ALTER TABLE $QUIZ_response ADD `$quecolm` VARCHAR(255) NOT NULL"); 
                                        $x++;
                                          
                                    }
                                    */
if ($con->query($sql) === TRUE) { 
  
        if ($con->query($question_tb) === TRUE) {
      
              if ($con->query($response_tb) === TRUE) {
                                    
                          //if ($con->query($sql2) === TRUE) { 
while( $x <= $que_no)
                                    {
                                        $quecolm = "userans_Q".$x;
                                        //$sql2= "ALTER TABLE $QUIZ_response ADD `$quecolm` VARCHAR(255) NOT NULL" ;
                                        mysqli_query($con,"ALTER TABLE $QUIZ_response ADD `$quecolm` VARCHAR(255) NOT NULL"); 
                                        $x++;
                                          
                                    }

for ($i = 1; $i <= $Q_NO; $i++) 
{
 
 mysqli_query($con,"INSERT INTO $QUIZ_que(id) VALUES ('$i')");

}
                echo "<script>
    alert('Hello, Quiz created successfully !');
    window.location.href='http://localhost/gpn_cm/teacher/create_quiz.php';
    </script>";
                
     // }
    }
  }
}
 else {
    echo "Error creating table: " . $con->error;
}

  }                                                      


$con->close();
?> 

