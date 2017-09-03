<?php
include_once 'config/config.php';
echo $fname = $_POST['fname'];
echo $lname = $_POST['lname'];
echo $phone = $_POST['phone'];
echo $email = $_POST ['email'];
$method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
 $teach_id=$_POST['teach_id'];
 $sql=mysqli_query($conn,"update teacher SET teach_name='$fname',
	teach_lname ='$lname',phone='$phone',email='$email' where teach_id=$teach_id");
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_aj.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into teacher SET teach_name='$fname ',
	teach_lname ='$lname ',phone='$phone',email='$email'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_aj.php"); 
	}
}