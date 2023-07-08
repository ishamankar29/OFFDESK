<?php
include 'dbconfig.php';
   session_start(); 
   
if (!isset($_SESSION['username'])) {
    header('location:\gpn_cm/login');
  }

$username7 = $_SESSION['username']; // get id through query string

$qry7 = mysqli_query($con,"select * from login_info where username='$username7'"); // select query

$data7 = mysqli_fetch_array($qry7);

$desig = $data7['DESIGNATION'];


if($desig!="teacher")
{
  header('location:\gpn_cm/login');
}



   ?>
   <?php 
    $con=mysqli_connect('localhost' , 'root', '', 'gpn_cm_project');
?>
<?php       
//**$str="";
//**  echo "hello";

$user = $_SESSION['username'];

//**echo "annlipgour";
 $sql = "SELECT * FROM `login_info`  WHERE `USERNAME` = '$user'";
  // mysql_select_db('test_db');
//** echo "H1annlipgour";
   $retval = mysqli_query($con,$sql) or  die("hello".mysqli_connect_error());
  //** echo "annlipgour";
   //if(! $retval ) {
     // die('Could not get data: ' . mysqli_error());
   //}

//**   echo " H2Iannlipgour"."<br>";
  //** print_r($retval);
   $row = mysqli_fetch_row($retval);
           //**echo $row[3];
            //**echo " jiiiiH2Iannlipgour";
         $str=$row[3];     
         $str_desig=$row[2];
$i=0;
$st=0;
$ed=6;
$j=0;
$arr=array();
 if($str!=null)
    {    
  while($ed<=strlen($str))
        {
           $str2 =substr($str,$st,6);
            
           array_push($arr,$str2);
           $st=$ed+1;
           
           $ed=$st+6;
           $i=$i+1;
        $j=$j+1;
        $str2="";
       }
 
}
else
    {
      if($j==0) 
        echo "";
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
  padding: 14px 1%;
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
  width: 300px;
  background-color:  #ddccff;
  background-image: url(21jpeg.jpeg) ; 
  color:black;
  position: fixed;
  height: 100%;
  overflow: auto;
    
  padding: 0px;
 box-shadow: 0 0 5px 10px lightgrey;
}
.sidebar a, .dropdown-btn {
  padding:16px;
  text-decoration: none;
   /*menubar variable  size*/
  color: black;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.sidenav a:hover:not(.active), .dropdown-btn:hover {
  
background-color: white;
  color: black;

}
.dropdown-container {
  display: none;
  background-color: black;
  padding-left: 8px;
  
}

/* Optional: Style the caret down icon */
.fa-chevron-circle-down {
  float: right;
  padding-right: 10px;
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
  padding: 2% 10%;
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

<title>TEACHER</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
  <div class = "pog" ><a href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a href="profile_teacher.php "><i class="fa fa-id-badge" style="font-size: 28px"></i> PROFILE</a>
   
  <button class="dropdown-btn"><i class="fa fa-edit" style="font-size: 30px"></i> MCQ
    <i class="fa fa-chevron-circle-down"></i>
  </button>
  <div class="QUIZ">
    <a href="view_quiz.php"><i class="" style="font-size: 30px" ></i> VIEW QUIZZES </a>
      <a href="create_quiz.php"><i class="" style="font-size: 30px" ></i> CREATE MCQ </a>
      <a href="editmcq.php"><i class="" style="font-size: 30px" ></i> EDIT MCQ </a>
      <a href="mcqgrades.php"><i class="" style="font-size: 30px" ></i> MCQ GRADES </a>
      <a href="deletemcq.php"><i class="" style="font-size: 30px" ></i> DELETE MCQ </a></div>
    </div>
      <button class="dropdown-btn"><i class="fa fa-eye" style="font-size: 30px"></i> VIEW
    <i class="fa fa-chevron-circle-down"></i>
  </button>
  <div class="QUIZ">
  <a href=" view_sub.php"><i class="" style="font-size:30px"></i> VIEW SUBMISSION </a>
  <a href=" view_approved_sub.php"><i class="" style="font-size:30px"></i> APPROVED SUBMISSION </a>
</div>
  <a class="active" href="enrolled.php "><i class="fa fa-graduation-cap" style="font-size:30px"></i> ENROLLED STUDENTS </a> 
  <div class="log">
  <a href="resource_upload.php "><i class='fa fa-upload' style="font-size:30px"></i>   UPLOAD RESOURCES  </a>
  <a href="delete_resource.php "><i class='fa fa-trash' style="font-size:30px"></i>  DELETE RESOURCES  </a>
 
 
  <a href="about.php"><i class="fa fa-users" style="font-size: 34px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 34px"></i> CONTACT</a>

 <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px" ></i> CHANGE PASSWORD</a>
  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
<head>
    <title>ENROLLED STUDENTS</title>
</head>


  
    		<h1> ENROLLED STUDENTS </h1>
	

      
        <form method="post" action="enrolled.php"> 
       
            

         <label for="course">Choose a Course:</label><br>
           <select id="course" name="course" required>
           
          <option value="" disabled selected hidden> Course Code</option>
   
          <?php  for($i=0;$i<count($arr);$i++){ ?>
          <option value="<?php echo $arr[$i];?>"> <?php echo $arr[$i];?>
     
          </option>

            <?php } ?>   
            </select>

<input type="submit" name="save" value="Submit">
      		
      	
     	
     <script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
         
      </form>
    
  
<?php
include_once 'dbconfig.php';
error_reporting(0);
if(isset($_POST["save"]))
      
       {
       
    $course_code=$_POST["course"];
    $result = mysqli_query($con,"SELECT * FROM user_student where course_allotted LIKE'%$course_code%' ");}
          
?>



<?php
if (mysqli_num_rows($result) > 0) {
?>

   
    
<style>
  
        table {
          border-collapse: collapse;
        width: 100%;

           ;
        }
      th, td {
        font-size: 19px;
      text-align: left;
      padding: 8px;
      text-align: center;
    }
    

    th {
      font-size: 20px;
      background-color: #b3d9ff;
      color: black;
    }

   
  
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
    <style type="text/css">
      

   

@media print{
  body * {
    visibility: hidden;
  }
  .edit_enroll_table, .edit_enroll_table *{
    visibility: visible;
  }
.edit_enroll_table{
    position: absolute;
    left : 1px;
    right : 1px;
    top : 5px;
  }

}
    </style>
    
<center>
<button onclick="window.print()"><i class="fa fa-print "></i>  Print as PDF</button>
</center>
<div class="edit_enroll_table">
<center><table width="90%" border="1" cellspacing="0" cellpadding="1" bgcolor=white>
    <tr>
      <th>ENROLLMENT</th>
    
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>EMAIL</th>
    <th>DEGREE</th>
    </tr>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>

    <tr>
      <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["degree"]; ?></td>
    
        
      </tr>
      <?php
      $i++;
      }
      ?>
    </center>
</table>
</center>
</div>
 <?php
}
else
{
    echo "No result found";
}
?>
</div>

 </body>
</html>

