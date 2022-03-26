<?php
session_start();
include '../db/db_config.php';

if($_REQUEST["action"]=='user'){
	$id=$_POST['id'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $createdby = $_SESSION['user_id'];
	if(!empty($id)){
     $sql="UPDATE `quizz_admin` SET `username`='$username' , `password`='$password'  WHERE `id`='$id'";
	}else{
	$sql = "INSERT INTO `quizz_admin`(`username`,`password`) VALUES('$username','$password')";
}
	if(mysqli_query($con, $sql)){
		if(!empty($id)){
		echo "Update Successfully";
		}else{
			echo "Add Successfully";
		}

	}
	else {
		echo "Not insert";
	}


}
	if($_REQUEST["action"]=='topics'){
    $id=$_POST['id'];
    $user=$_POST['user'];
	$topic=$_POST['topic'];
    $createdby = $_SESSION['user_id'];
	if(!empty($id)){
     $sql="UPDATE `quizz_topics` SET `qt_id`='$user' , `qt_name`='$topic' , `qt_createdby`='$createdby' WHERE `qt_id`='$id'";
	}else{
	$sql = "INSERT INTO `quizz_topics`(`qt_id`,`qt_name`,`qt_createdby`) VALUES('$user', '$topic','$createdby')";
}
	if(mysqli_query($con, $sql)){
		if(!empty($id)){
			echo "Update Successfully";
			}else{
				echo "Add Successfully";
			}

	}
	else {
		echo "Already Topic Added";
	}



}
?>