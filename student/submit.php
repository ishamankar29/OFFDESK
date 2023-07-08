<?php
session_start();

include_once 'dbconfig.php';
//$con=mysqli_connect('localhost','root','','gpn_cm_project');
?>

<?php
if(isset($_POST['save']))
{  

   $first_name = $_SESSION['stud_Fname'];
   $last_name = $_SESSION['stud_Lname'];
   $Username = $_SESSION['username'];
   //$course_selected=mysqli_real_escape_string($con,$_POST['course']);
   //$mycourseselect = mysqli_real_escape_string($con,$_POST['course']);
   //$_POST['course'];
   //$_SESSION['course']=$mycourseselect;
   $my_quiz = $_POST['quizzz'];
   $_SESSION['my_selected_quiz'] = $my_quiz;
   $mycourseselect = $_SESSION['my_quizz_course'];
   $_SESSION['my_quiz_course'] = $_SESSION['my_quizz_course'];
   //$_SESSION['course']=$mycourseselect;
   $FINAL_RESPONSE=$mycourseselect."_".$my_quiz."_response";
   $sql = "INSERT INTO $FINAL_RESPONSE(stud_Fname,stud_Lname,username,course_id,score) /*TABLE ATTRIBUTE NNAME*/
   VALUES ('$first_name','$last_name','$Username','$mycourseselect', 0)";/*variable name*/


      if (mysqli_query($con, $sql)) {
        
      //header("Location: http://127.0.0.1/gpn_cm/student/quiz.php");

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
  width: 50%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 50%;
  padding: 12px 12px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  width: 20%;
  background-color: #004d99;
  color: #FFFFFF;
  padding: 14px 10px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}

input[type=submit]:hover {
  background-color: #004d99;
  color: #FFFFFF;
  
}
</style>
</head>
<form action="quiz.php" method="post">
  <center> <h1>Instructions to be followed !</h1></center>
<left><p>
1. Do not close the browser during the test before your exam is complete. <br>
2. Do not click the ‘BACK’ button of browser during exam .<br>
3.You can attempt a question only once .<br>
3. Keep an eye on the TIMER CLOCK on top left of the online exam page of the browser to keep a track of
the time left<br>
4.If exam is not completed your scores will be recorded upto the questions attempted<br>

</p></left> 
<center><input type="submit" class="button" name="click" ></center>
</form>

    <?php
       } 
       else {
        echo "Error: " . $sql . "
    " . mysqli_error($con);
       }
       mysqli_close($con);
}

?>

