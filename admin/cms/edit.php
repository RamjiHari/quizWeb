<?php

include '../db/db_config.php';

if($_REQUEST["action"]=='category'){
	$id=$_POST['id'];
	$query="Select * from `quizz_categories` where catg_id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}
if($_REQUEST["action"]=='question'){
	$id=$_POST['id'];
	$query="Select * from `quizz_qustions` where qu_id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}
?>