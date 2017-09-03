<?php
include_once 'config/config.php';
$pname = $_POST['pname'];
echo $fname = $_POST['fname'];
echo $lname = $_POST['lname'];
echo $StudentID = $_POST['StudentID'];
echo $address = $_POST['address'];
echo $dateofbirth = $_POST['dateofbirth'];
echo $phone = $_POST['phone'];
echo $email = $_POST ['email'];
$method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
 $std_id=$_POST['std_id'];
 $sql=mysqli_query($conn,"update student SET pname='$pname',fname='$fname',
	lname ='$lname',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',
	phone='$phone',email='$email' where std_id=$std_id");
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_student.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into student SET pname='$pname', fname='$fname ',
	lname ='$lname ',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',phone='$phone',email='$email'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_student.php"); 
	}
}