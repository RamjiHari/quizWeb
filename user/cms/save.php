<?php
session_start();
include '../db/db_config.php';

if($_REQUEST["action"]=='updateScore'){
    $opt=$_POST['opt'];
    $ans=$_POST['ans'];
  if($opt==$ans){
	$_SESSION['score']=$_SESSION['score']+1;
  	echo $_SESSION['score'];
  }else{
	$_SESSION['score']=$_SESSION['score'];
	echo $_SESSION['score'];
  }

}
if($_REQUEST["action"]=='submitQuiz'){
$userId=$_SESSION['user_id'];
$userName=$_SESSION['username'];
$catgId=$_SESSION['categ'];
$topicId=$_SESSION['topic'];
$totQues=$_SESSION['totques'];
$score=$_SESSION['score'];

$sql = "INSERT INTO `quizzScore`(`name`,`userId`,`score`,`type`,`topic`,`tot_ques`) VALUES('$userName','$userId','$score','$catgId','$topicId','$totQues')";

if(mysqli_query($con, $sql)){
	echo $score;
}
else {
	echo false;
}
}

?>