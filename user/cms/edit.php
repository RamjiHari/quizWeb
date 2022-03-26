<?php

include '../db/db_config.php';

if($_REQUEST["action"]=='user'){
	$id=$_POST['id'];
	$query="Select * from `quizz_admin` where id=$id";
	$spl=mysqli_query($con,$query);
	$fetch=mysqli_fetch_assoc($spl);
	$num= mysqli_num_rows($spl);
	if($num==1){
		echo json_encode($fetch);
	}else{
		echo "not successfully";
	}
}
if($_REQUEST["action"]=='topic'){
	$id=$_POST['id'];
	$query="Select * from `quizz_topics` where qt_id=$id";
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