
<html>
  
<head>
    <title>CREATE TEACHER USER</title>
</head>
  
<body >
    <center>
    	<style>
div {
  background-color:#ffffff;
  width: 400px;
  border: 25px  #db57f0;
  padding: 70px;
  margin: 50px;
  outline-width: medium;
  font-family: "Lucida Console", "Courier New", monospace;
}
</style>
    	<?php
    	  $servername = "localhost";
			$username = "username";
			$password = " ";
			$dbname = "database_name";

			$conn = mysqli_connect("localhost", "root", "", "gpn_cm_project");
          
	        // Check connection
	        if($conn === false){
	            die("ERROR: Could not connect. " 
	                . mysqli_connect_error());
	        }


			if(isset($_POST["submit"]))
			
			 {
			$username=$_POST["username"]; 
			$f_name=$_POST["f_name"];
			$l_name=$_POST["l_name"];
			$email=$_POST["email"];
			//$alloted_course=$_POST["alloted_course"];
			$checkbox1 = $_POST['techno'];
			      $chk = "";
			      //$courseAllotted2 = $_POST['courseAllotted'];
			    //$course_allotted = $_POST['course_allotted'];
			 
			 foreach($checkbox1 as $chk1)
			 {
			  $chk .= $chk1.",";
			 }
			$sql = "INSERT INTO user_teacher(username,f_name,l_name,email,alloted_course)  VALUES ('$username','$f_name','$l_name','$email','$chk')";

				if(mysqli_query($conn, $sql)){

			$pass=$_POST["username"];
			$pass=md5($pass);
			$designation= "teacher";
			

			$insert = "INSERT INTO login_info (USERNAME,PASSWORD,DESIGNATION,COURSE_ALLOTTED)  VALUES ('$username','$pass','$designation','$chk')";

				if(mysqli_query($conn, $insert)){

				      echo "<script>
                      alert('Teacher User created');
                      window.location.href='http://127.0.0.1/gpn_cm/admin/createteacher.php';
                      </script>";} else{
            echo "ERROR: Hush! Sorry $insert. " 
                . mysqli_error($conn);
        		}
             } 
             else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        		}
          
        // Close connection
        mysqli_close($conn);
       }
			

			 ?>
</center>
</body>
  
</html>