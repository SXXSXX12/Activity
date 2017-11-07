<!DOCTYPE HTML>
<html>
	<head>
		<title>Activity System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                </head>
	<body>
<?php
include_once 'config/config.php';
$act_id = $_POST['act_id'];
$std_code = $_POST['std_code'];
$chk = mysqli_query($conn, "select std_code from history_act where std_code='$std_code' and act_id=$act_id");
$chk = mysqli_num_rows($chk);
if($chk==0){
$sql=mysqli_query($conn,"insert into history_act SET act_id='$act_id',
	std_code ='$std_code',status_regis=1");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
            echo "<script>alert('ลงทะเบียนเรียบร้อยแล้วค่ะ');</script>";
            echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=regis_table.php'>";
		//header("location:regis_table.php"); 
	}
        } else {
        echo "<script>alert('มีการลงทะเบียนแล้วค่ะ !!');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=regis_table.php'>";
	exit();
}?>
</body>
</html>

