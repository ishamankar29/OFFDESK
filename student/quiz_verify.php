<!DOCTYPE>
<html>
<!DOCTYPE>
<html>
<?php 
session_start();
 require 'dbconfig.php';
 ?>



<head>
<title>OffDesk Quiz</title>
<style>
body {
    background-color: #FFFFFF;

  background-size:100%;
  background-repeat: no-repeat;
  position: relative;
  background-attachment: fixed;
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
  width: 50%;
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

/* button */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #004d99;
  color: #FFFFFF;
  /* start button*/
  border: none;
 /* start button text colour*/
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
 
.button span {
  color: #FFFFFF
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
 
.button span:after {

  color: #FFFFFF
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
 
.button:hover span {
  padding-right: 25px;
}
 
.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
  background-color : #b3d9ff;
  color: #FFFFFF
  font-size: 28px;
  padding: 20px;

  
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block; 
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; /*submit button  colour*/
    border: 2px solid ##b3d9ff;
}
 
.button3:hover {
    background-color: ##b3d9ff; /*submit button hover*/
    color: Black;
}
</style>
</head>
<body><center>
<div class="title">OffDesk</div>
<?php
echo $_POST['course'];
?>
<br>
<form method="post" action="submit.php">
   <select name="quizzz" required>Quiz Name:
    <option value=""  disabled selected hidden>-- QUIZ NAME --</option>
    <?php
        
        //$username="isha";  // Using database connection file here
        $username=$_SESSION['username'];
        $final_course = $_POST['course'];

        $_SESSION['my_quizz_course'] = $final_course;
        
        $records = mysqli_query($con, "SELECT `quiz_name` From quiz_log_table where `course_code`='$final_course' and `active_flag` = 1 ");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['quiz_name'] ."'>" .$data['quiz_name'] ."</option>";  // displaying data in option menu

        }

$_SESSION['stud_Fname'] = $_POST['stud_Fname'];
$_SESSION['stud_Lname'] = $_POST['stud_Lname'];

    ?> 
  </select>
 
                
<div class="bump"><br><form>
 <button class="button" name="save" value="Next"><span>START QUIZ</span></button> 

</form></div>


</center>
</body>