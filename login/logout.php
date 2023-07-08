<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location:http://127.0.0.1/OffdeskLogin/offdesk.html");
exit;
?>