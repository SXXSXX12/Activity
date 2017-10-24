<?php
include_once 'config/config.php';
$std_code = $_POST['std_code'];
$portfolio_id =$_POST['portfolio_id'];
$projectname = $_POST['projectname'];
$portyear = $_POST['portyear'];
$portfolio = $_POST['portfolio'];
$method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
 $sql=mysqli_query($conn,"update portfolio SET projectname='$projectname',
	portyear ='$portyear',portfolio='$portfolio' where portfolio_id='$portfolio_id'");
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:educationtable.php?std_code=$std_code"); 
	}
}else{
$sql=mysqli_query($conn,"insert into portfolio SET std_code='$std_code',projectname='$projectname' ,portfolio='$portfolio' ,
	portyear ='$portyear'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:educate.php"); 
	}
}


?>