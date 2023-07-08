<?php

   session_start(); 
include 'dbconfig.php';

   ?>
   <?php
$connect = mysqli_connect("localhost", "root", "", "gpn_cm_project");  
?>

<?php 
    $con=mysqli_connect('localhost' , 'root', '', 'gpn_cm_project');

    

 ?>  

<?php       
//**$str="";
//**  echo "hello";
$userlogin=$_SESSION["username"];
$user=$_SESSION["username"];

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
  width: 300px;
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
<body>
  
<script src='js/all.js' crossorigin='anonymous'></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/fontawesome.min.css">

<title>STUDENT</title>
<div class="sidebar">
  <div class="imgcontainer">
    <img src="logo2.jpeg" alt="Avatar" class="avatar">
    </div>
 
  <div class = "pog" ><a href="home.php"><i class="fa fa-home" style="font-size: 30px"></i> HOME</a>
     <a href="profile_student.php "><i class="fa fa-id-badge" style="font-size: 28px"></i> PROFILE</a>
     <a  href="mcq.php "><i class="fa fa-edit" style="font-size: 30px"></i> MCQ </a>
  <a href=" resource_view.php"><i class="fa fa-file" style="font-size:30px"></i> RESOURCES </a> </div>
  <div class="log">
  <a href="upload_sub.php "><i class='fa fa-upload' style="font-size:30px"></i>   UPLOAD SUBMISSION </a>
  <a class="active" href=" view_rejected_sub.php"><i class="fa fa-exclamation-circle" style="font-size:30px"></i> REJECTED SUBMISSION </a>
   <a href="about.php"><i class="fa fa-users" style="font-size: 34px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 34px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px" ></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
<h1>VIEW STUDENTS' REJECTED SUBMISSION</h1>
  <center>
    <table width="90%" border="1" align="center" cellspacing="0" cellpadding="1" bgcolor= #e6f2ff>
        <tr>    
        <th bgcolor=#b3d9ff>DATA</th>&nbsp&nbsp
        <th bgcolor=#b3d9ff>ENROLLMENT</th>&nbsp&nbsp
        <th bgcolor=#b3d9ff> USERNAME </th>
        <th bgcolor=#b3d9ff> DESCRIPTION </th>
        <th bgcolor=#b3d9ff> DELETE </th>
    <center>
    <form action="view_rejected_sub.php" method = "get">
    <label for="course">Course Code:</label>
           <select id="course" name="course" required>
           
<option value="" disabled selected hidden>Choose a Course Code</option>
   
        <?php  for($i=0;$i<count($arr);$i++){ ?>
         <option value="<?php echo $arr[$i];?>"> <?php echo $arr[$i];?>
     
          </option>

            <?php } ?>
    <input type="submit">
      <?php
      error_reporting(0);
      $n =  $_GET["course"];
      $_SESSION['view_rej_sub_course']=$n;
      $course_code_rej_sub=$n."_sub_REJ";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
      $connection = mysqli_connect("localhost","root","");
      $db = mysqli_select_db($connection,'gpn_cm_project');
      $query = " SELECT * FROM `$course_code_rej_sub`where `course` = '$n' and `enrollment`=$user";
      $query_run = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_array($query_run)) 
      {
        ?>
        <tr>
           <td align="center">
            <br><br>

            <?php 
          echo "<li><a target='_blank' href='view_rejected_sub2.php?id=".$row['id']."'>".$row['name']."</a><br/>
       <embed src='data:".$row['mime'].";base64,".base64_encode($row['data'])."'width='500' height='300'/></li>";
                        ?>           
           &nbsp &nbsp &nbsp 
           &nbsp &nbsp &nbsp
           &nbsp &nbsp &nbsp 
           <br><br>
           </td>
           <td align="center"><?php echo $row['enrollment']; ?></td>
           <td align="center"><?php echo $row['fullname']; ?></td>
           <td align="center"><?php echo $row['description']; ?></td> 
           <td align="center"><a href="delete_rejected_sub.php?id=<?php echo $row['id'];?>&course=<?php echo $row['course'];?>& $course_code_rej_sub">Delete</a></td>
           </tr>
           </form>              
           <?php } ?>
</table>
</form> 
</center>
</body>
</html>
