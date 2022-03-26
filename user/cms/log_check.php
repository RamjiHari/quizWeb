<?php
session_start();
include '../db/db_config.php';
if(isset($_REQUEST["submit"])){
$login_user=$_REQUEST["username"];
$login_pass=$_REQUEST["password"];
$select=mysqli_query($con,"SELECT * FROM `users` WHERE `username`='$login_user' AND `password`='$login_pass'");
 $row=mysqli_fetch_array($select);
if(mysqli_num_rows($select)>0){
    $_SESSION['user_id']=$row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['score']=0;
	 header('Location:../home.php');
}else{
	echo ("<script>
alert('Username or password error');
window.location.href='../index.php';
</script>");
}
}
?>