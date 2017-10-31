<?php

session_start();
require_once("_config.php"); //เรียกใช้งานไฟล์ config.php 
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Activity System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
                </head>
	<body>
                <?php
$username = $_POST["username"]; //trim(mysql_real_escape_string ป้องกันการ แฮกได้ระดับหนึ่ง
$password = $_POST["password"];
$statususer = $_POST["statususer"];

if ($statususer == '2') {//ตรวจสอบว่าเป็น อ.
    $codesel = "t.teach_id,CONCAT(t.teach_name,' ',t.teach_lname) as fullname";
    $codejoin = "INNER JOIN teacher t ON t.teach_id=u.std_code";
} else {//ตรวจสอบว่าเป็น admnin หรือ นศ.
    $codesel = "s.std_code,CONCAT((CASE s.pname
    WHEN 1 THEN 'นาย'
    WHEN 2 THEN 'นางสาว'
    ELSE 'ไม่มีสถานะ' END),s.fname,' ',s.lname) as fullname";
    $codejoin = "INNER JOIN student s ON s.std_code=u.std_code";
}

$sql = "SELECT $codesel ,u.Status_user 
FROM `user` u
$codejoin
WHERE u.username='" . $username . "' AND u.`password`='" . $password . "' AND u.Status_user='" . $statususer . "'"; //คำสั่งของ sql สำหรับ แสดงข้อมูล
$result = $conn->query($sql); //สั่งให้ตัวแปร sql ทำงาน 

@$row = $result->fetch_object();
if (count(@$row) != 0) {
    if ($statususer == '2') {
    $_SESSION['std_code'] = @$row->teach_id;
    } else {
    $_SESSION['std_code'] = @$row->std_code;    
    }
    $_SESSION['fullname'] = @$row->fullname;
    $_SESSION['Status_user'] = @$row->Status_user;
    'ยินดีต้อนรับเข้าสู่ระบบ';
    if ($row->Status_user == '1') {
        header("location:admin.php");
    } else if ($row->Status_user == '2') {
        header("location:Aj.php");
    } else if ($row->Status_user == '3') {
        echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=student.php'>";
    }
} else {
    echo "<h2 style='color:red;'>ไม่สามารถ login กรุณา Login ใหม่อีกครั้ง</h2>";
    echo "<a href='_login.php'>Login</a>";
}
?>
        </body>
</html>




























