<?php
include_once 'config/config.php';
echo $educate = $_POST['educate'];
echo $major = $_POST['major'];
echo $intiute = $_POST['intiute'];
echo $endyear = $_POST['endyear'];
echo $std_code = $_POST['std_code'];
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
    
$sql=mysqli_query($conn,"insert into education SET std_code='$std_code',edu_level='$educate ',
	major ='$major ',intiute='$intiute',endyear='$endyear'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:educationtable.php?std_code=$std_code"); 
	}
}
