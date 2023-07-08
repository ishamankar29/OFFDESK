<?php
session_start();
 ?>

<?php
$dbh = new PDO("mysql:host=localhost;dbname=gpn_cm_project", "root", "");
$id = isset($_GET['id'])? $_GET['id'] : "";
$course = $_SESSION['approved_course_code1'];
$course_code_app_sub=$course."_sub_app";
$stat = $dbh->prepare("select * from $course_code_app_sub where id=?");

$stat-> bindParam(1,$id);
$stat-> execute();
$row = $stat->fetch();
header('Content-Type:'.$row['mime']);
echo $row['data'];
?>