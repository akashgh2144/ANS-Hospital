<?php

date_default_timezone_set('Asia/Dhaka');

setcookie('last_logout', date('Y-m-d g:i:s A'), time() + (86400 * 30), '/'); 


session_start();
session_destroy();

header("Location: ../view/UserLogin.php");
exit();
?>
