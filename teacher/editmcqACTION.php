<style>
   body{
       background-color: #eee6ff;
 font-family: "Times New Roman", Times, serif;
}

  </style>
  <?php
include_once 'dbconfig.php';
if(isset($_POST['save']))
{  
$mycourse=$_POST['course'];
   
   $QUIZ_NAME = $_POST['quizname'];
$fetchquiz=$mycourse."_".$QUIZ_NAME."_que";
//$quiz_name=$_POST["quiz_name"];
//$quiz_name=$_POST["quiz_name"];
echo $fetchquiz;
$result = mysqli_query($con,"SELECT * FROM $fetchquiz");
session_start();
$_SESSION['quizname']= $QUIZ_NAME;
$_SESSION['course']=$mycourse;}
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?><style>
	body{
		font-family: "Times New Roman", Times, serif;
		
	}
			 h2{ 
			 	text-align: center;
			 	letter-spacing: 2px;
			 	font-size: 40px;
			 	}
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
		tr:nth-child(even){background-color: #ffe6ff }

		th {
			font-size: 20px;
		  background-color:#e7b3ff;
		  color: blacks;
		}

		a{	font-size:16px;
			font-variant: small-caps;
		}

		a:link {
  color: #660099;
  background-color: transparent;
  text-decoration: none;
  
}
a:visited {
  color: #bf80ff;
  background-color: transparent;
  text-decoration: none;}
a:hover {
  color: #ff99cc;
  background-color: transparent;
  text-decoration: underline;
}
a:active {
  color: yellow;
  background-color: transparent;
  text-decoration: underline;
}
		
   
   
    
	
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
        }
    </style>
<table>
	  <tr>
	    <th>Sl No</th>
		<th>question</th>
		<th>answerA</th>
		<th>answerB</th>
		<th>answerC</th>
		<th>answerD</th>
		<th>correct ans</th>
		<th>Action</th>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["que"]; ?></td>
		<td><?php echo $row["option_1"]; ?></td>
		<td><?php echo $row["option_2"]; ?></td>
		<td><?php echo $row["option_3"]; ?></td>
		<td><?php echo $row["option_4"]; ?></td>
		<td><?php echo $row["ans"]; ?></td>
				<td><a href="updatemcq.php?id=<?php echo $row["id"]; ?> & $fetchquiz">Update</a></td>
				
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>