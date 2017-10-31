<?php
include_once 'config/config.php';
$pname = $_POST['pname'];
echo $teach_name = $_POST['teach_name'];
echo $teach_lname = $_POST['teach_lname'];
     $email= $_POST['email'];
echo $phone = $_POST['phone'];
echo $username = $_POST ['username'];
echo $password = $_POST ['password'];
$method = isset($_POST['method'])?$_POST['method']:'';
if($method=='edit'){
 $SESSION=$_POST['SESSION'];
 $sql=mysqli_query($conn,"update teacher SET teach_name='$teach_name',
	teach_lname ='$teach_lname',phone='$phone',email='$email' where teach_id=$SESSION");
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:Aj.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into teacher SET teach_name='$teach_name ',
	teach_lname ='$teach_lname',phone='$phone',email='$email'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:Aj.php"); 
	}
}