
<!DOCTYPE html>
<html>
 <head>
   <title> UPDATING STUDENT DATA</title>
 </head>
<body>
  <style>
    body{
   background-color: white;
  margin: 0;
  font-family: "Lato", sans-serif;
  }

  h3{ 
       
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

        form{
          font-size: 20px;
          text-align: left;
        }

        input[type=text], select {
  width: 50%;
  padding: 12px 12px;
  margin: 15px ;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=varchar], select {
  width: 50%;
  padding: 12px 12px;
  margin: 15px ;
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
  margin: 15px ;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
input[type=number], select {
  width: 50%;
  padding: 12px 12px;
  margin: 15px ;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}




</style>
</body>
</html>

<?php

include "dbconfig.php"; // Using database connection file here

$username1 = $_GET['username']; // get id through query string

$qry = mysqli_query($con,"select * from user_student where username='$username1'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
   
    $degree = $_POST['semester'];
    $password_up = $_POST['password_up'];
   // $alloted_course = $_POST['alloted_course'];
    $checkbox1 = $_POST['techno'];
    $chk = "";
    $checkbox3 = $_POST['techno'];
    $chk3 = "";
    //$courseAllotted2 = $_POST['courseAllotted'];
    //$course_allotted = $_POST['course_allotted'];
 
 foreach($checkbox1 as $chk1)
 {
  $chk .= $chk1.",";
 }
 if($password_up=="")
        {
    $edit = "update login_info set USERNAME='$username',COURSE_ALLOTTED='$chk' where username='$username1'";
  }
  else
  {
    $password_up = md5($password_up);
           $edit = "update login_info set USERNAME='$username',PASSWORD='$password_up',COURSE_ALLOTTED='$chk' where username='$username1'";
  }
    if($con->query($edit) === TRUE)
    {
   
    echo"done in user tb";
     
     }
     else{
       echo "Error updating Student User " .$con->error;
     } 

                $edit2 = "update user_student set username='$username', first_name='$first_name', last_name='$last_name',email='$email',degree='$degree',course_allotted='$chk' where username='$username1'";
            
                if($con->query($edit2) === TRUE)
                {
                  $batch = substr("$username",0,2);
                      echo"<script>
                      alert('Student User Updated');
                      window.location.href='editstudent.php?u_batch=$batch&save=Submit';
                      </script>"; // redirects to all records page
                    exit;
                }
                else
                {  echo "Error updating Student User " .$con->error; }       
}


?>
 
    <?php

  $Course_Alloted=" ";
global $con;
//$sql = "SELECT * FROM ".$UpdateCID." WHERE ID='$UpdateRowNo'";
$sql="SELECT * FROM  `login_info` WHERE USERNAME= '$username1' ";
 $result = mysqli_query($con, $sql);

while($DataRows =mysqli_fetch_assoc($result))
{
  
  $Course_Alloted = $DataRows["COURSE_ALLOTTED"];
}


?>        


            

            
                    
<h3> UPDATING STUDENT USER  </h3>

<form method="POST">
    <b>USERNAME :</b> <input type="varchar" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter username" Required>
</br>
</br>
  <b>FIRST_NAME :</b> <input type="text" name="first_name" value="<?php echo $data['first_name'] ?>" placeholder="Enter First Name " Required>
</br>
</br>
 <b>LAST_NAME :</b> <input type="text" name="last_name" value="<?php echo $data['last_name'] ?>" placeholder="Enter Last_name" Required>
  </br>
  </br>
   <p>
        <label for="emailAddress">EMAIL ADDRESS:</label> <input type="VARCHAR" name="email" id="emailAddress" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $data['email'] ?>" placeholder="abc@xyz.com">
           </p>
                <script>
            function myFunction() {
              var x = document.getElementById("myEmail").pattern;
              //document.getElementById("demo").innerHTML = x;
            }
            </script>
  </br>
  
  <b>PASSWORD :</b> <input type="password"  id='mypass' name="password_up" value="" placeholder="Password ">
  <br>
  <input type="checkbox" onclick="myFunction()">
                <script>
                function myFunction() {
                var x = document.getElementById("mypass");
                if (x.type === "password") {
                      x.type = "text";
                  } else 
                  {
                      x.type = "password";
                }
                }
                  
                </script>
</br></br>
 
  
  <b>DEGREE:</b>
  <br>
        &emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="1" name="semester" value="B.E./B.Tech" <?php if ($data['degree']=='B.E./B.Tech'){echo "checked";}  ?>>
        <label for="1">B.E./B.Tech</label><br>&emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="2" name="semester" value="BCA" <?php if ($data['degree']=='BCA'){echo "checked";}  ?>>
        <label for="2">BCA</label><br>&emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="3" name="semester" value="B.Sc./BA/BBA" <?php if ($data['degree']=='B.Sc./BA/BBA'){echo "checked";}  ?>>
        <label for="3">B.Sc./BA/BBA</label> <br>&emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="4" name="semester" value="Diploma" <?php if ($data['degree']=='Diploma'){echo "checked";}  ?>>
        <label for="4">Diploma</label><br>&emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="5" name="semester" value="M.Tech/M.E." <?php if ($data['degree']=='M.Tech/M.E.'){echo "checked";}  ?>>
        <label for="5">M.Tech/M.E.</label><br> &emsp;&emsp;&emsp;&emsp;
        <input type="radio" id="6" name="semester" value="other" <?php if ($data['degree']=='other'){echo "checked";}  ?>>
        <label for="6">Other</label><br>
 
  </br>
  ALLOTED_COURSE: 





<?php
   
               $i=0;
$st=0;
$ed=6;
$j=0;
$ind=0;
$arr=array();
 //**echo strlen($str)."\n";
 if($Course_Alloted!=null)
    {    
  while($ed<=strlen($Course_Alloted))
        { 
          $ind++;
           $str2 =substr($Course_Alloted,$st,6);
            $sql = 'SELECT * FROM `course_log_table`'; // sql string
 
           $result = mysqli_query($con, $sql);


     // linear search for cname for cid
      while ($row = mysqli_fetch_assoc($result)) 
      {  
          // checking if the cc id exist or not
         
         if($row["course_code"] == $str2)
         {     
          // $two[] = $row["CourseName"]; // storing names in secound array as per ccid
             echo $ind."] ".strtoupper($str2)." - ".strtoupper($row["course_name"])."<br>";// printing that crouse name for that cc id   
         }


      }
            // echo substr($str,$start,$end);
          //** echo "$str2"."\n";
         //  $arry_str[$i]=$str2;
         // echo  "element  ".$arry_str[$i]."\n";
           //**echo $st."<br>";
           //**echo $ed."<br>";
           
           array_push($arr,$str2);
           $st=$ed+1;
           
           //*echo $start."<br>";
           $ed=$st+6;
           $i=$i+1;
          //join the course in the drop down menu 
        $j=$j+1;
        $str2="";
       }
 
}
else
    {
      if($j==0) 
      {//echo "helo";5
        echo "";
      } 
    }


      echo "<br>";
      ?>


<?php
$sql_u = "SELECT * FROM course_log_table";
 $res_u = mysqli_query($con, $sql_u);

     echo "<br>";
      while($data = mysqli_fetch_assoc($res_u)) 
            {   
                       //echo $data['CourseCode'];
                       $abc=$data["course_code"];
                      // print_r($arrr);    
                       //echo gettype($arrr);
                       //echo $abc;
                       //echo gettype($abc);



                    if(in_array($abc,$arr))
                    { 
                      
                    
                    ?>

                      <label class="container">
             
                      <input type='checkbox' value="<?php echo $data['course_code'];?>" name='techno[]'checked> 
                     <?php echo strtoupper($data['course_name']).'-('.strtoupper($data['course_code']).')'; ?><br>
                     <span class="checkmark"></span>
                     </label>
                  

                    <?php 
                   }
                 else 
                 {  

                    ?>
                     <label class="container">
             
                     <input type='checkbox' value="<?php echo $data['course_code'];?>" name='techno[]'>  
                      <?php echo strtoupper($data['course_name']).'-('.strtoupper($data['course_code']).')'; ?><br>
                      <span class="checkmark"></span>
                     </label>
                    <?php 

                 }

        }
                
$con->close();
            ?>

  </br>
  </br>
 
  </br>
  <input type="submit" name="update" value="UPDATE">
</form>


