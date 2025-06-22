<?php 

session_start();
//hancurkan session
session_unset();
session_destroy();
$_SESSION = [];

header("Location: index.php");
exit;

?>