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
  margin-left: 15px;
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
  width: 100%;
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
</style></head>
<?php

include "dbconfig.php"; // Using database connection file here


session_start();

$mycourse2=$_SESSION['course'];
$QUIZ_NAME2=$_SESSION['quizname'];
$fetchquiz=$mycourse2."_".$QUIZ_NAME2."_que";
$sql = "SELECT * FROM $fetchquiz WHERE id='" . $_GET["id"] . "' ";
//$id = $_GET['id']; // get id through query string

$qry = mysqli_query($con,$sql); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $question = $_POST['question'];
    $answerA = $_POST['answerA'];
    $answerB = $_POST['answerB'];
    $answerC = $_POST['answerC'];
    $answerD = $_POST['answerD'];
    $ans = $_POST['ans'];
  
    $edit = "update $fetchquiz set que='$question',option_1='$answerA', option_2='$answerB',option_3='$answerC',option_4='$answerD', ans='$ans' where id='" . $_GET["id"] . "' ";
  
    if($con->query($edit) === TRUE)
    {
echo "<script>
    alert(' question updateD!');
    window.location.href='http://localhost/gpn_cm/teacher/editmcq.php?course=$mycourse2&quizname=$QUIZ_NAME2&save=Next';
    </script>";
    }
    else
    {
        //echo mysqli_error();
    }     
}
?>
<left>
<h3>Update Data</h3>

<form method="POST">
    Question:<br>
  <textarea name=" question" placeholder="Enter question" Required> <?php echo $data['que'] ?></textarea>
</br>
</br>
  option1:<br>
  <input type="text" name="answerA" value="<?php echo $data['option_1'] ?>" placeholder="Enter option 1 " Required>
</br>
</br>
option2:<br>
  <input type="text" name="answerB" value="<?php echo $data['option_2'] ?>" placeholder="Enter option 2" Required>
  </br>
  </br>
  option3:<br>
  <input type="text" name="answerC" value="<?php echo $data['option_3'] ?>" placeholder="Enter option 3" Required>
  </br>
  </br>
  option4:<br>
  <input type="text" name="answerD" value="<?php echo $data['option_4'] ?>" placeholder="Enter option 4" Required>
  </br>
  </br>
  correct answer:<br>&emsp;&emsp;&emsp;&emsp;
<input type="radio" id="answerA" name="ans" value="<?php echo $data['option_1']?>"<?php if ($data['ans']==$data['option_1']){echo "checked";}  ?> Required>
<label for="answerA"><?php echo "Answer A" ?></label><br>&emsp;&emsp;&emsp;&emsp;
<input type="radio" id="answerB" name="ans" value="<?php echo $data['option_2']?>"<?php if ($data['ans']==$data['option_2']){echo "checked";}  ?> Required>
<label for="answerB"><?php echo "Answer B" ?></label><br>&emsp;&emsp;&emsp;&emsp;
<input type="radio" id="answerC" name="ans" value="<?php echo $data['option_3'] ?>"<?php if ($data['ans']==$data['option_3']){echo "checked";}  ?> Required>
<label for="answerC"><?php echo "Answer C" ?></label> <br>&emsp;&emsp;&emsp;&emsp;

<input type="radio" id="answerD" name="ans" value="<?php echo $data['option_4'] ?>" <?php if ($data['ans']==$data['option_4']){echo "checked";}  ?> Required>
<label for="answerD"><?php echo "Answer D" ?></label><br>&emsp;&emsp;&emsp;&emsp;
 
  </br>
  </br>
  <input type="submit" name="update" value="Update">

</form>
</left>