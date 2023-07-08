<?php
session_start();
 ?>

<?php
$dbh = new PDO("mysql:host=localhost;dbname=gpn_cm_project", "root", "");
$id = isset($_GET['id'])? $_GET['id'] : "";
$course = $_SESSION['course_resourses'];

$stat = $dbh->prepare("select * from $course where id=?");

$stat-> bindParam(1,$id);
$stat-> execute();
$row = $stat->fetch();
header('Content-Type:'.$row['mime']);
echo $row['data'];
?>