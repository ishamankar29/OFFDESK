<?php

include_once "connection.php";
session_start ();

$user = $_SESSION['username'];
//user is logged in
if ($_POST)
{
	//check fields
	$oldpassword =$_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$repeatnewpassword =$_POST['repeatnewpassword'];

			$olpassword = stripcslashes($oldpassword);
			$newpassword = stripcslashes($newpassword);
			$repeatnewpassword = stripcslashes($repeatnewpassword);
	//check password against db
	        $oldpassword = mysqli_real_escape_string($con, $oldpassword);
	        $newpassword = mysqli_real_escape_string($con, $newpassword);  
	        $repeatnewpassword = mysqli_real_escape_string($con, $repeatnewpassword); 
            
            $oldpassword=md5($oldpassword);
            $newpassword=md5($newpassword);
            $repeatnewpassword=md5($repeatnewpassword);
	//connect to db
	$con = mysqli_connect ("localhost","root","","offdesk_db") or die();
	//mysqli_select_db("offdesk_db")or die();

	$queryget = mysqli_query ($con,"SELECT PASSWORD FROM login_info WHERE USERNAME='$user' ")or die ("Query didnt work");
	$row = mysqli_fetch_assoc($queryget);
	$oldpassworddb = $row['PASSWORD'];
	
	//echo"$oldpassworddb";


/*
	<?Php
include "dbconn.php";
$queryget = mysqli_query ($con,"SELECT PASSWORD FROM log_table WHERE username=1812010")or die ("Query didnt work");
	$row = mysqli_fetch_assoc($queryget);
	$oldpassworddb = $row['PASSWORD'];
	echo"$oldpassworddb";
	//echo $row;
	?>*/

	//check passwords
	if($oldpassword==$oldpassworddb)
	{
//check the new password
		if ($newpassword==$repeatnewpassword)
		{
			if ($newpassword==$oldpassworddb) {

				echo"<script>
		alert('old password and new password are same');
		window.location.href='http://localhost/offdesk/amna%20login/loginpage.html';
		</script>";
			}
			//succes
			//change password in db
			$querychange = mysqli_query ($con,"UPDATE login_info SET PASSWORD='$newpassword' WHERE USERNAME='$user'");
			
			echo"<script>
		alert('Your password has been changed ');
		</script>";
			
		
		}
		else {
			 echo"<script>
		alert(' New password dont match!');
		</script>"; 
	         }
	     }
	else {
	echo"<script>
		alert(' Old password doesnt match!');
		</script>";
         }
}
/*else
{
echo("
<form action ='change-password.php' method='POST'>
 Old password: <input type ='text' name ='oldpassword'><p>
 New password: <input type='password' name='newpassword'><br>
 Repeat new password <input type='password' name='repeatnewpassword'><p>
 <input type='submit' name='submit' value='Change password'>
</form>
");
}
*/

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
<style>
body {
  font-family: "Lato", sans-serif;
  font-style: normal;
  font-size: 25px;
  background-color: #b3cce6;
}



input[type=text], input[type=password] {
  width: 23%;
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: none;
  border-radius: 5px;
  background-color: white;
  font-family: 'Montserrat', sans-serif;
}

button:focus {
  border: 3px solid #264d73;
 
}
button {
  width: 13%;
  background-color: #b3cce6;
  color: black;
  padding: 10px 20px;
  margin: 4px 0;
  border: 2px solid#264d73 ;
  border-radius: 10px;
  cursor: pointer;
  font-size: 15px;
}
 









}



</style>
</head>
<body><center><div class="box">
    <center> 
    	<br> <br>
    <h2> CHANGE PASSWORD </h2>
    <form  action="change_pass.php" method="POST">
        
					<br>
					<div class="container">	 
					
						        Old password: 
						        <input type ='password' id='mypass'name ='oldpassword'> 
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
								</div>

					<div>	
						New password: 		 
						<input type='password'id='mynpass' name='newpassword'> 
						<input type="checkbox" onclick="mynFunction()">

							<script>
							function mynFunction() {
							  var x = document.getElementById("mynpass");
							  if (x.type === "password") {
							    x.type = "text";
							  } else {
							    x.type = "password";
							  }
							}
							</script>
					</div>

					          Confirm Password: <input type='password' id='mycpass'name='repeatnewpassword'> 
					                  <input type="checkbox" onclick="myrFunction()">
					<div><br><br><button type="submit">CHANGE PASSWORD</button></div>
							<script>
							function myrFunction() {
							  var x = document.getElementById("mycpass");
							  if (x.type === "password") {
							    x.type = "text";
							  } else {
							    x.type = "password";
							  }
							}
							</script>
					</div>
</div>
               
	</center>
	</form> 
	</center>
</div>



