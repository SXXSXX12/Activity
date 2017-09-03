<?php
include_once 'config/config.php';
$act_id=$_POST['act_id'];
echo $sex = $_POST['sex'].'<br>';
echo $year = $_POST['year'].'<br>';
echo $q1 = $_POST['q1'].'<br>';
echo $q2 = $_POST['q2'].'<br>';
echo $q3 = $_POST['q3'].'<br>';
echo $q4 = $_POST['q4'].'<br>';
echo $q5 = $_POST['q5'].'<br>';
echo $q6 = $_POST['q6'].'<br>';
echo $q7 = $_POST['q7'].'<br>';
echo $q8 = $_POST['q8'].'<br>';
echo $q9 = $_POST['q9'].'<br>';
echo $q10 = $_POST['q10'];
echo $message = $_POST['message'];
$sql=mysqli_query($conn,"insert into question SET sex='$sex',act_id='$act_id',
	year='$year',q1='$q1',q2='$q2',q3='$q3',q4='$q4',q5='$q5',q6='$q6',q7='$q7',q8='$q8',q9='$q9',q10='$q10',comment='$message'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:confirm_act.php?act_id=".$_POST['act_id'].""); 
	}

	
?>