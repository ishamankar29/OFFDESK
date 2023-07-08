<?php

include "dbconfig.php";


 $status = $_POST['quiz_status'];
 $course_code = $_POST['course_code_act'];
 $quiz_name = $_POST['quiz_name_act'];
 $quiz_time = $_POST['quiz_time1'];

 $edit2 = "update quiz_log_table set active_flag='$status', quiz_time='$quiz_time' where course_code='$course_code' and quiz_name = '$quiz_name'";
            
                if($con->query($edit2) === TRUE)
                {
                      echo"<script>
                      alert('Quiz Status Updated');
                      window.location.href='editmcq.php?course=$course_code&quizname=$quiz_name&save=Next';
                      </script>"; // redirects to all records page
                    exit;
                }
                else
                {  echo "Error updating Student User " .$con->error; }       



?>