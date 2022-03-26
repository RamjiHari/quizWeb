<?php
include "../db/db_config.php";

if($_GET["action"]=='user'){

	$id=$_POST['id'];
	$query="Delete from `quizz_admin` where id=$id";
	$spl=mysqli_query($con,$query);
	$select = mysqli_query($con,"DELETE FROM `quizz_topics` WHERE `qt_id` = $id ");
    $selectCatg = mysqli_query($con,"DELETE FROM `quizz_categories` WHERE `catg_qt_id` = $id ");
    $selectQuestion = mysqli_query($con,"DELETE FROM `quizz_qustions` WHERE `topic` = $id ");
	if($spl){
		echo "Delete Successfully";
	}else{
		echo "Not delete";
	}

}
if($_GET["action"]=='topics'){

	$id=$_POST['id'];
	$query="Delete from `quizz_topics` where qt_id=$id";
	$spl=mysqli_query($con,$query);
	$queryCatg="Delete from `quizz_categories` where catg_qt_id=$id";
	$splCatg=mysqli_query($con,$queryCatg);
	if($spl){
		echo "Delete Successfully";
	}else{
		echo "Not delete";
	}

}
?>