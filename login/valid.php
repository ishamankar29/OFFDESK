<?php   
error_reporting(0);
    session_start();   
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $_SESSION['username']=$username;
        $password = mysqli_real_escape_string($con, $password); 
        $password=md5($password); // Encrypted Password
      
        $sql = "select * from login_info where USERNAME = '$username' and PASSWORD = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($row['USERNAME']==$username)
                {

                  //if(password_verify($password,$row['pass']))
                  if($row['PASSWORD']==$password)
                        {
                            if($row['DESIGNATION']=='teacher')
                            {

                              header("location:\gpn_cm/teacher");

                             }
                             else if($row['DESIGNATION']=='student')
                            {
                              header("location:\gpn_cm/student");
                            }
                            else 
                            {
                              header("location:\gpn_cm/admin");
                            }
                        
                            
                        }  

                    else
                        {
                     $message = " incorrect password";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location.href='\index.html';
                  </script>";
                        }
                  }
                else
                {
                    //echo "Username or Password incorrect";
                      $message = "Username and/or Password incorrect.";
                    echo "<script type='text/javascript'>alert('$message');
                    window.location.href='\index.html';
                    </script>";
                }

?>  