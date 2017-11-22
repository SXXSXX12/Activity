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

$chk0 = mysqli_query($conn, "select std_code from user where std_code='$std_code'");
$chk0 = mysqli_num_rows($chk0);
if($chk0!=0){
$chk = mysqli_query($conn, "select std_code from history_act where std_code='$std_code' and act_id=$act_id");
$chk = mysqli_num_rows($chk);

$date = mysqli_query($conn, "select act_datestart from activity where act_id=$act_id"); 
$date = mysqli_fetch_array($date);
$chk2 = mysqli_query($conn, "SELECT *
FROM history_act h
INNER JOIN activity a ON a.act_id= h.act_id
WHERE h.std_code ='$std_code'
and ('".$date['act_datestart']."' between a.act_datestart and a.act_dateend)");
$chk2 = mysqli_num_rows($chk2);
if($chk!=0 or $chk2!=0){
        echo "<script>alert('มีการลงทะเบียนแล้วค่ะ !!');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=regis_table.php'>";
	exit();
        } else {
        $sql=mysqli_query($conn,"insert into history_act SET act_id='$act_id',
	std_code ='$std_code',status_regis=1");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
            echo "<script>alert('ลงทะเบียนเรียบร้อยแล้วค่ะ');</script>";
            echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=regis_table.php'>";
		//header("location:regis_table.php"); 
	}
}
}else{
    echo "<script>alert('ไม่ใช่นักศึกษาในระบบค่ะ');</script>";
            echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=regis_table.php'>";
}
?>
</body>
</html>

