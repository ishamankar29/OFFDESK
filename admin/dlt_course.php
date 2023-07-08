<?php
session_start();
include_once 'dbconfig.php';
//$con=mysqli_connect('localhost','root','','gpn_cm_project');

$con = mysqli_connect("localhost","root","","gpn_cm_project");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

}

if (!isset($_SESSION['username'])) {
    header('location:\gpn_cm/login');
  }

  include 'dbconfig.php';

$username7 = $_SESSION['username']; // get id through query string

$qry7 = mysqli_query($con,"select * from login_info where username='$username7'"); // select query

$data7 = mysqli_fetch_array($qry7);

$desig = $data7['DESIGNATION'];


if($desig!="admin")
{
  header('location:\gpn_cm/login');
}
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
  width: 100%;
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

 
.sidebar {
  margin: 0;
  padding: 0;
  width: 290px;
  background-color:  #ddccff;
  background-image: url(21.jpeg) ; 
  color:black;
  position: fixed;
  height: 100%;
  overflow: auto;    
  padding: 0px;
 box-shadow: 0 0 5px 10px lightgrey;
}
div.pog {
  padding-left: 6px;
}
div.log
{
  padding-left: 7px;

}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 38%;
  border-radius: 50%;
}
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  color : black; 
}
 
.sidebar a.active {
  background-color: white ;
  color: black;
}

.sidebar a:hover:not(.active) {
  background-color: #004d99;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 5% 15%;
  height: 100%;


}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
  <script src='js/all.js' crossorigin='anonymous'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fontawesome.min.css">

<title>ADMIN</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
    <div class = "pog" ><a  href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a  href="createstudent.php"><i class="fa fa-graduation-cap" style="font-size: 30px"></i> CREATE STUDENT</a>
  <a href="editstudent.php"><i class="fa fa-edit" style="font-size: 30px"></i>  EDIT STUDENT</a> </div>
  <div class="log">
  <a href="createteacher.php"><i class="fa fa-user"  style="font-size: 30px"></i>   CREATE TEACHER</a>
  <a href="editteacher.php"><i class='fa fa-edit' style="font-size: 30px"></i>   EDIT TEACHER</a>
  <a href="create_course.php"><i class="fa fa-book"style="font-size: 30px"></i> CREATE COURSE</a>

  <a class="active" href="dlt_course.php"><i class="fa fa-trash"style="font-size: 30px"></i> DELETE COURSE RECORDS</a>
  <a href=""><i class="fa fa-eye"style="font-size: 30px"></i> VIEW</a>
  <a href=" resource_view.php"><i class="" style="font-size:30px"></i> RESOURCES </a>
  <a href=" view_approved_sub.php"><i class="" style="font-size:30px"></i> APPROVED SUBMISSION </a>
  <a href="about.php"><i class="fa fa-users" style="font-size: 30px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 30px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px"></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
  <center>
  <h1>DELETE COURSE </h1>
  <form method="post" action="dlt_course.php">
   
    

            
            <label for="course">Course Code:</label>
           <select id="course" name="course" required>
           
<option value="" disabled selected hidden>Choose a Course Code</option>
  <?php $records = mysqli_query($con, "SELECT `course_code` From course_log_table ");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['course_code'] ."'>" .$data['course_code'] ."</option>";  // displaying data in option menu

        }

        ?>
         
            <?php  ?>   
     </select>


   

<input type="submit" name="save" value="Next">
    </center>

</div>
</form>


</body>
</html>
<?php
if(isset($_POST['save']))
{  

   $C_CODE = $_POST['course'];

   //$Q_NAME = $_POST['quizname'];
//$quiz_name = $_POST['quizname'];
   //$que_no = $_POST['ques_no'];
   $course_code=$_POST['course'];
  //$resp_tb ="DELETE FROM table WHERE table_name like'$C_CODE%response'";
   //$QUIZ_que=$course_code."_". $que_resp."_que";
   //$QUIZ_response=$course_code."_". $que_resp."_response";

 //$sql = "DELETE FROM course_log_table WHERE course_code='$C_CODE'";

$course_code_sub=$course_code ."_submission";
  $course_code_material=$course_code."_material";

   $course_code_sub_APP=$course_code."_sub_APP";
   $course_code_sub_REJ=$course_code."_sub_REJ";


$submission="TRUNCATE TABLE $course_code_sub ";

$approved="TRUNCATE TABLE $course_code_sub_APP ";

$rejected="TRUNCATE TABLE $course_code_sub_REJ ";

$del_quizes = "DELETE FROM quiz_log_table WHERE `course_code` = '$course_code'";
//$QUIZ_que_tb="TRUNCATE TABLE $QUIZ_que ";
//$QUIZ_response_tb="TRUNCATE TABLE $QUIZ_response";

//$response_tb = "DROP TABLE  $QUIZ_response ";
//if ($con->query($QUIZ_que_tb) === TRUE) { 

//if ($con->query($resp_tb) === TRUE) { 

  
  
      if ($con->query($submission) === TRUE) { 
  
          if ($con->query($approved) === TRUE) { 
  
              if ($con->query($rejected) === TRUE) {
      
                    if ($con->query($del_quizes) === TRUE) {
                                    
                       
                echo "<script>
    alert('Hello, $course_code Course Records deleted successfully !');
    window.location.href='dlt_course.php';
    </script>";
           }
          }
        }        
      }
    
  //}
//}
 else {
    echo "<script>
    alert('this $course_code course dosen't exist !');
    window.location.href='dlt_course.php';
    </script>";
}

  }                                                      


$con->close();
?> 

