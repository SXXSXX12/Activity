<?php
include_once 'config/config.php';
echo $std_code = $_POST['std_code'];
echo $portfolio_id =$_GET['$portfolio_id'];
echo $projectname = $_POST['projectname'];
echo $portyear = $_POST['portyear'];
echo $portfolio = $_POST['portfolio'];
echo $method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
 $portfolio_id=$_GET['$portfolio_id'];
 echo $sql=mysqli_query($conn,"update portfolio SET projectname='$projectname',
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