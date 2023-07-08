<?php
session_start();
 ?>

<?php
$dbh = new PDO("mysql:host=localhost;dbname=gpn_cm_project", "root", "");
$id = isset($_GET['id'])? $_GET['id'] : "";
$course =$_SESSION['view_rej_sub_course'];
$course_code_rej_sub=$course."_sub_REJ";
$stat = $dbh->prepare("select * from $course_code_rej_sub where id=?");

$stat-> bindParam(1,$id);
$stat-> execute();
$row = $stat->fetch();
header('Content-Type:'.$row['mime']);
echo $row['data'];
?>
