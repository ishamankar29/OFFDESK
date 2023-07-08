
<?php 
	session_start();
    $_SESSION=array();
	session_destroy();
	echo "<script>
		localStorage.clear();
		alert('Hello, Exam Submitted, please login again.');
		window.location.href='/gpn_cm/login';
		</script>";
 ?>