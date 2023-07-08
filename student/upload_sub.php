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
  width: 100%;
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
  <a class="active" href="upload_sub.php "><i class='fa fa-upload' style="font-size:30px"></i>   UPLOAD SUBMISSION </a>
  <a href=" view_rejected_sub.php"><i class="fa fa-exclamation-circle" style="font-size:30px"></i> REJECTED SUBMISSION </a>
   <a href="about.php"><i class="fa fa-users" style="font-size: 34px"></i> ABOUT</a>
  <a href="contact.php"><i class="fa fa-envelope-square" style="font-size: 34px"></i> CONTACT</a>
  <a href="change_pass.php"><i class="fa fa-lock" style="font-size: 30px" ></i> CHANGE PASSWORD</a>

  <a href="logout.php"><i class="fa fa-sign-out-alt" style="font-size: 30px" ></i> LOGOUT</a>
</div>
</div>
<div class="content">
<p><strong>Note:</strong> Word Files Will Not Be Accepted!</p>
        <?php
        if(isset($_POST["extcheck"])){
            $acceptedext = array("pdf", "txt","png","jpg");
            $uploadedfile = $_FILES["myfile"]["name"];
            $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
            if(!in_array($extension, $acceptedext))
            {
                echo "<script>
                      alert('Word Files Not Accepted');
                      window.location.href='upload_sub.php';
                      </script>";
            }
            else
            {
  
   $dbh = new PDO("mysql:host=localhost;dbname=gpn_cm_project","root","");
        $name = $_FILES['myfile']['name'];
        $mime = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $enrollment = $_POST['enrollment'];
        $fullname = $_POST['fullname'];
        $Course = $_POST['course'];
        $Description = $_POST['Description'];
        $course_code_sub=$Course."_submission";
        $stmt = $dbh->prepare("insert into $course_code_sub (name,mime,data,enrollment,fullname,course,description) values(?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$mime);
        $stmt->bindParam(3,$data);
        $stmt->bindParam(4,$enrollment);
        $stmt->bindParam(5,$fullname);
        $stmt->bindParam(6,$Course);
        $stmt->bindParam(7,$Description);
        $stmt->execute();
        echo "<script>
                      alert('File Succesfully Uploaded.');
                      window.location.href='upload_sub.php';
                      </script>";
            }
        }
        else{
            ?>
            <left>
            
            <div class="text-center">
            <form method ="post" enctype="multipart/form-data">
  <label for="fname"  disabled>Enrollment no:</label><br><br>
  <input type="text" id="fname"   name="enrollment" value = "<?php echo $_SESSION['username']?>"  maxlength="7" minlength="7" onkeypress="return onlyNumberKey(event)" minlength="7" maxlength="7" >
    
    <script>
    function onlyNumberKey(evt) {
          
        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
    </script> <br><br>
  <label for="fullname">Full Name:</label><br><br>
  <input type="text" id="fullname" name="fullname" value="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" Required><br><br>
 <label for="course">Course Code:</label>
           <select id="course" name="course" required>
           
<option value="" disabled selected hidden>Choose a Course Code</option>
   
        <?php  for($i=0;$i<count($arr);$i++){ ?>
         <option value="<?php echo $arr[$i];?>"> <?php echo $arr[$i];?>
     
          </option>

            <?php } ?> 
  <br><br>
  <br>
  <label for="Description">Description:</label>
  <textarea id="Description" name="Description" rows="5" cols="50">
  </textarea><br><br>
  
            <form method="post" enctype="multipart/form-data">
                <form action="upload_sub.php">
                <input type="file" name="myfile" accept= ".pdf,.jpg,.png,.txt" Required>
                <input type="submit" value="Submit" name="extcheck">
            </form>
            </left>
            <?php
        }
        ?>
    </body>
</html>








<?php
if (isset($_POST['save'])) {
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "gpn_cm_project";
  $grade = $_POST['grade'];
  $connect = mysqli_connect($hostname,$username ,$password ,$databaseName);
  $query_save = "insert into `$course_code_sub` ('grade' values ([value-1]))";
  $result = mysqli_query($connect,$query_save);
  if ($result) {
    echo 'data inserted' ;
  }
  else{
    echo 'data not inserted';
  }
  mysqli_free_result($result);
  mysqli_close($connect);
}
?>

        </tr> 
<?php
if (isset($_POST['accept'])) 
{
  
  $connect = mysqli_connect("localhost","root","","gpn_cm_project");
  //$query_save = "SELECT *  INTO `user_info` FROM `update_tb`";
  $query_save = "SELECT *  INTO $course_code_sub.user_info FROM gpn_cm_project.$course_code_sub";
  $result = mysqli_query($connect,$query_save);
  if ($result)
  {
    echo 'data inserted' ;
  }
  else
  {
    echo 'data not inserted';
  }
  mysqli_free_result($result);
  mysqli_close($connect);
}



?>
  



