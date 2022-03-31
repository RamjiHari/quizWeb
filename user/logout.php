<?php
session_start();
$a=$_SESSION['page'];
session_destroy();
header('Location:'.$a.'');
?>