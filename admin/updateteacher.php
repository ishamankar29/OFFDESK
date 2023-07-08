
<!DOCTYPE html>
<html>
 <head>
   <title> UPDATING TEACHER DATA</title>
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

$qry = mysqli_query($con,"select * from user_teacher where username='$username1'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $username = $_POST['username'];
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $password_t_up = $_POST['password_t_up'];
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
 if($password_t_up=="")
        {
    $edit = "update login_info set USERNAME='$username',COURSE_ALLOTTED='$chk' where username='$username1'";
  }
  else
  {
    $password_t_up = md5($password_t_up);
    $edit = "update login_info set USERNAME='$username',PASSWORD='$password_t_up',COURSE_ALLOTTED='$chk' where username='$username1'";
  }
    if($con->query($edit) === TRUE)
    {
   
    
     
     }
     else{
       echo "Error updating Teacher User " .$con->error;
     } 

                $edit2 = "update user_teacher set username='$username', f_name='$f_name', l_name='$l_name',email='$email',alloted_course='$chk' where username='$username1'";
            
                if($con->query($edit2) === TRUE)
                {
                      echo"<script>
                      alert('Teacher User Updated');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/editteacher.php';
                      </script>"; // redirects to all records page
                    exit;
                }
                else
                {  echo "<script>
                      alert('Teacher User Updated');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/editteacher.php';
                      </script>"; $con->error; }      	
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


            

            
                    
<h3> UPDATING TEACHER USER  </h3>

<form method="POST">
   <b> USERNAME :</b> <input type="varchar" name="username" value="<?php echo $data['username'] ?>" placeholder="Enter username" Required>
</br>
</br>
  <b>FIRST_NAME :</b> <input type="text" name="f_name" value="<?php echo $data['f_name'] ?>" placeholder="Enter First Name " Required>
</br>
</br>
<b> LAST_NAME : </b><input type="text" name="l_name" value="<?php echo $data['l_name'] ?>" placeholder="Enter Last_name" Required>
  </br>
  </br>
   <p>
        <label for="emailAddress"><b>EMAIL ADDRESS:</b></label> <input type="VARCHAR" name="email" id="emailAddress" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $data['email'] ?>" placeholder="abc@xyz.com">
           </p>
                <script>
            function myFunction() {
              var x = document.getElementById("myEmail").pattern;
              //document.getElementById("demo").innerHTML = x;
            }
            </script>
  </br>
<b> PASSWORD :</b> <input type="password"  id='mypass' name="password_t_up" value="" placeholder="Password ">
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
  <b>ALLOTED_COURSE: </b>





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


