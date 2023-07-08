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
  width: 100%;
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
  background-color: #b3d9ff;
  color: #FFFFFF
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




                               $final_course= $_SESSION['my_quiz_course'];
                               $final_quiz = $_SESSION['my_selected_quiz'];
                               $FINAL_C=$final_course."_".$final_quiz."_que";
                               $FINAL_RES=$final_course."_".$final_quiz."_response";

  $no_of_que = mysqli_query($con, "SELECT `question_no` From quiz_log_table where `course_code`='$final_course' AND `quiz_name`='$final_quiz'");
  $data_no_of_que = mysqli_fetch_array($no_of_que);

$final_question_no = $data_no_of_que['question_no'];

                                if (isset($_POST['click']) || isset($_GET['start'])) {
                                @$_SESSION['clicks'] += 1 ;
                                $c = $_SESSION['clicks'];
                                if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
                                $userans_loop = "userans_Q" . $c-1;
                $username_final = $_SESSION['username'];
                $id_number = $c-1;
              
                $qry6 = "SELECT `ans` FROM `$FINAL_C` where `id`= '$id_number'";
                
                  $result6 = mysqli_query($con,$qry6);
                  $storeArray = Array();
                  //$update_marks = "UPDATE `student_quiz_info` SET `score` = 5 where `username`= '$username_final'";
                  while ($row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC))
                  {
                 if($row6['ans'] == $_POST['userans'])
                 {
                    
                   mysqli_query($con,"UPDATE `$FINAL_RES` SET `score` = `score` + 1 where `username`= '$username_final'");
                   @$_SESSION['score'] += 1 ;
                   
                  }
                  }
                  
                
                
                                //$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c-1"; /*storing user ans*/
                                $fetchqry3 = "UPDATE `$FINAL_RES` SET $userans_loop ='$userselected' WHERE `username`= '$username_final' " ; /*storing user ans*/
                               // $result2 = mysqli_query($con,$fetchqry2);
                                $result7=mysqli_query($con,$fetchqry3);
                                }
                
                                
                                  
                                }
                else {
                                  $_SESSION['clicks'] = 0;
                                }
                                
                              //echo($_SESSION['clicks']);
                                ?>
  
  

   
<div class="bump"><br><form><?php if($_SESSION['clicks']==0){ ?> <button class="button" name="start" float="left"><span>START QUIZ</span></button> <?php } ?></form></div>

<?php

$time_min = mysqli_query($con, "SELECT `quiz_time` From quiz_log_table where `course_code`='$final_course' AND `quiz_name`='$final_quiz'");
  $time_min_arr = mysqli_fetch_array($time_min);
  $time_final = $time_min_arr['quiz_time'];
?>

<body>
<p id="demo"></p>
<div id="quiz-time-left"> </div>
<script>
if(localStorage.getItem("total_seconds"))
{
    var total_seconds = localStorage.getItem("total_seconds");
} 
else 
{
    var total_seconds = 60*<?php echo $time_final ?>;
}
var minutes = parseInt(total_seconds/60);
var seconds = parseInt(total_seconds%60);
function countDownTimer()
{
    if(seconds < 10)
  {
        seconds= "0"+ seconds ;
    }
  if(minutes < 10)
  {
        minutes= "0"+ minutes ;
    }
    
    document.getElementById("quiz-time-left").innerHTML = "<b>Time Left :"+minutes+"minutes:"+seconds+"seconds</b>";
    if(total_seconds <= 0)
  {
    alert("Time Is Out");
    clearCountdown();
    } 
  else 
  {
        total_seconds = total_seconds -1 ;
        minutes = parseInt(total_seconds/60);
        seconds = parseInt(total_seconds%60);
        localStorage.setItem("total_seconds",total_seconds);
        setTimeout("countDownTimer()",1000);
    }
}
setTimeout("countDownTimer()",1000);

function clearCountdown() 
{
  var c=confirm("Time is Out, Want To submit the Page:");
  if(c==true)
  {
    
    setTimeout("window.location.href='end_quiz.php'",1);
    setTimeout("document.quiz.submit()",1);     
  }
  else
  {
    alert("Timer Is Reset,Now You Start Your Exam Again");
    location.reload();
    var resettm=60*<?php echo $time_final ?>; 
    localStorage.setItem("total_seconds",resettm);
  }
};

//window.onunload = clearCountdown();

</script>
  
<?php
echo $_SESSION['my_quiz_course'];
echo " - ".$_SESSION['my_selected_quiz'];
echo $FINAL_C;
echo $data_no_of_que['question_no'];
?>
<form action="" method="post">          
<table><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `$FINAL_C` where id='$c'"; 
        $result=mysqli_query($con,$fetchqry);
        $num=mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
      ?>
<tr><td><h3><br><?php echo @$row['que'];?></h3></td></tr> <?php if($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < $final_question_no+1){ ?>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_1'];?>">&nbsp;<?php echo $row['option_1']; ?><br>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_2'];?>">&nbsp;<?php echo $row['option_2'];?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_3'];?>">&nbsp;<?php echo $row['option_3']; ?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option_4'];?>">&nbsp;<?php echo $row['option_4']; ?><br><br><br></td></tr>
  <tr><td><input type="submit" class="button3" name="click" ></td></tr> 
</table>
</form>


<?php }  
                                  ?> 
                               
 <button onclick="document.location='end_quiz.php'">END EXAM</button>      
 <?php if($_SESSION['clicks']>$final_question_no){ 
  
 
 ?> 
 
 <h2>Result</h2>
 <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score']; 

 session_unset(); ?></span><br>
 <span>Your Score:&nbsp<?php echo $no; ?></span>
 <br>
 <a button type="button" href="end_quiz.php">End Exam!</button>

<?php } 
?>
 <!-- <script type="text/javascript">
    function radioValidation(){
    /* var useransj = document.getElementById('rd').value;
        //document.cookie = "username = " + userans;
    alert(useransj); */
    var uans = document.getElementsByName('userans');
    var tok;
    for(var i = 0; i < uans.length; i++){
      if(uans[i].checked){
        tok = uans[i].value;
        alert(tok);
      }
    }
    }
</script> -->
</center>
</body>