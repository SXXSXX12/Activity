<?php
include_once 'config/config.php';
echo $act_id = $_POST['act_id'];
echo $std_code = $_POST['std_code'];
 
$sql=mysqli_query($conn,"insert into history_act SET act_id='$act_id ',
	std_code ='$std_code',status_regis=1");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:regis_table.php"); 
	}
