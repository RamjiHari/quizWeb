<?php
include "../db/db_config.php";
if($_GET["action"]=='category'){

	$id=$_POST['id'];
	$query="Delete from `quizz_categories` where catg_id=$id";
	$spl=mysqli_query($con,$query);
	$question="Delete FROM `quizz_qustions` WHERE `type` = $id";
	$questionspl=mysqli_query($con,$question);
	if($spl){
		echo "Delete Successfully";
	}else{
		echo "Not delete";
	}

}
if($_GET["action"]=='question'){

	$id=$_POST['id'];
	$query="Delete from `quizz_qustions` where qu_id=$id";
	$spl=mysqli_query($con,$query);
	if($spl){
		echo "Delete Successfully";
	}else{
		echo "Not delete";
	}

}
?>