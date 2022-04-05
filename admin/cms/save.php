<?php
session_start();
include '../db/db_config.php';

if($_REQUEST["action"]=='topics'){
    $id=$_POST['id'];
	$topic=$_POST['topic'];
    $createdby = $_SESSION['user_id'];

	if(!empty($id)){
     $sql="UPDATE `quizz_topics` SET `qt_name`='$topic' , `qt_createdby`='$createdby' WHERE `qt_id`='$id'";
	}else{
	$sql = "INSERT INTO `quizz_topics`(`qt_name`,`qt_createdby`) VALUES('$topic','$createdby')";
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


if($_REQUEST["action"]=='category'){
	$id=$_POST['id'];
    $category=$_POST['category'];
	$topic=$_POST["topic"];
    $createdby = $_SESSION['user_id'];
	$get_topic_query=mysqli_query($con,"SELECT * FROM `quizz_topics` where qt_createdby='$createdby'");
	$topic_id_fetch=mysqli_fetch_assoc($get_topic_query);
	$topic_id=$topic_id_fetch["qt_id"];

	if(!empty($id)){
     $sql="UPDATE `quizz_categories` SET `catg_name`='$category' ,`catg_qt_id`='$topic' ,`catg_createdby`='$createdby'  WHERE `catg_id`='$id'";
	}else{
	$sql = "INSERT INTO `quizz_categories`(`catg_name`,`catg_qt_id`,`catg_createdby`) VALUES('$category','$topic','$createdby')";
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
	$get_topic_query=mysqli_query($con,"SELECT * FROM `quizz_categories` where catg_id='$category'");
	$topic_id_fetch=mysqli_fetch_assoc($get_topic_query);
	$topic_id=$topic_id_fetch["catg_qt_id"];
	if(!empty($id)){
     $sql="UPDATE `quizz_qustions` SET `question` = '$question',`topic`='$topic_id', `type` = '$category', `option_one` = '$option_one',
	 `option_two` = '$option_two', `option_three` = '$option_three', `option_four` = '$option_four', `correctIndex` = '$answer' ,
	 `createdBy` ='$createdby' WHERE `quizz_qustions`.`qu_id` = '$id'";
	}else{
	$sql = "INSERT INTO `quizz_qustions`(`question`,`topic`,`type`,`option_one`,`option_two`,`option_three`,`option_four`,`correctIndex`,`createdBy`) VALUES
	('$question','$topic_id','$category','$option_one','$option_two','$option_three','$option_four','$answer','$createdby')";
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