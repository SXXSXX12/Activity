<?php
include_once 'config/config.php';
$std_code = $_POST['std_code'];
$projectname = $_POST['projectname'];
$portyear = $_POST['portyear'];
$portfolio = $_POST['portfolio'];
$method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
 $edu_id=$_POST['edu_id'];
 $sql=mysqli_query($conn,"update education SET edu_level='$educate ',
	major ='$major ',intiute='$intiute',endyear='$endyear' where edu_id=$edu_id");
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