<?php
session_start();
include '../db/db_config.php';

if($_REQUEST["action"]=='category'){
	$id=$_POST['id'];
    $category=$_POST['category'];
    $createdby = $_SESSION['user_id'];
	if(!empty($id)){
     $sql="UPDATE `quizz_categories` SET `catg_name`='$category' ,`catg_qt_id`='$createdby' ,`catg_createdby`='$createdby'  WHERE `catg_id`='$id'";
	}else{
	$sql = "INSERT INTO `quizz_categories`(`catg_name`,`catg_qt_id`,`catg_createdby`) VALUES('$category','$createdby','$createdby')";
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

if($_REQUEST["action"]=='question'){
	$id=$_POST['id'];
	$category=$_POST['category'];
	$question=$_POST['question'];
	$option_one=$_POST['option_one'];
	$option_two=$_POST['option_two'];
	$option_three=$_POST['option_three'];
	$option_four=$_POST['option_four'];
	$answer=$_POST['answer'];
	$createdby = $_SESSION['user_id'];

	if(!empty($id)){
     $sql="UPDATE `quizz_qustions` SET `question` = '$question',`topic`='$createdby', `type` = '$category', `option_one` = '$option_one',
	 `option_two` = '$option_two', `option_three` = '$option_three', `option_four` = '$option_four', `correctIndex` = '$answer' ,
	 `createdBy` ='$createdby' WHERE `quizz_qustions`.`qu_id` = '$id'";
	}else{
	$sql = "INSERT INTO `quizz_qustions`(`question`,`topic`,`type`,`option_one`,`option_two`,`option_three`,`option_four`,`correctIndex`,`createdBy`) VALUES
	('$question','$createdby','$category','$option_one','$option_two','$option_three','$option_four','$answer','$createdby')";
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
?>