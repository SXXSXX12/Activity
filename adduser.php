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
$stu_id = $_POST['stu_id'];
$email = $_POST['email'];
$status_user =$_POST['statususer'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$rec_date = date('Y-m-d');
echo 'กำลังดำเนินการ...' ;
$chk = mysqli_query($conn, "select std_code from user where std_code='$stu_id'");
$chk = mysqli_num_rows($chk);
if($chk==0){
if($password1 == $password2){
$sql=mysqli_query($conn,"insert into user SET std_code='$stu_id',username='$email',
	Status_user='$status_user',Rec_date='$rec_date',password='$password1'");
if (!$sql) {
	echo "<script>alert('บันทึกไม่สมบูรณ์กรุณาบันทึกใหม่');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=_register.php'>";
}else{
	echo "<script>alert('สมัครสมาชิกเรียบร้อยแล้วค่ะ');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=_login.php'>";
}
}else{
	echo "<script>alert('password ไม่ตรงกัน');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=_register.php'>";
	exit();
}} else {
        echo "<script>alert('มีการลงทะเบียนแล้ว');</script>";
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=_register.php'>";
	exit();
}
?>
   </body>
</html>
