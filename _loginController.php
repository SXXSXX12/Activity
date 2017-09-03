<?php     session_start();
    require_once("_config.php"); //เรียกใช้งานไฟล์ config.php 

      $username = trim(mysql_real_escape_string($_POST["username"])); //trim(mysql_real_escape_string ป้องกันการ แฮกได้ระดับหนึ่ง
      $password = trim(mysql_real_escape_string($_POST["password"]));
      $statususer = trim(mysql_real_escape_string($_POST["statususer"]));
 
    $sql= "SELECT s.std_code,
CONCAT((CASE s.pname
WHEN 1 THEN 'นาย'
WHEN 2 THEN 'นางสาว'
ELSE 'ไม่มีสถานะ' END),s.fname,' ',s.lname) as fullname,u.Status_user 
FROM `user` u
INNER JOIN student s ON s.std_code=u.std_code
WHERE u.username='".$username."' AND u.`password`='".$password."' AND u.Status_user='".$statususer."'"; //คำสั่งของ sql สำหรับ แสดงข้อมูล
    $result = $conn->query($sql);//สั่งให้ตัวแปร sql ทำงาน 
    
    @$row = $result->fetch_object(); 
    if(count(@$row)!=0){
    	$_SESSION['std_code'] = @$row->std_code;
    	$_SESSION['fullname'] = @$row->fullname;
    	$_SESSION['Status_user'] = @$row->Status_user;
    'ยินดีต้อนรับเข้าสู่ระบบ';
	    if($row->Status_user == '1'){
		header("location:admin.php"); 
    }else if($row->Status_user == '2'){
		header("location:Aj.php"); 
    }else if($row->Status_user == '3'){
	echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=student.php'>";
    }  
}else{
		echo "<h2 style='color:red;'>ไม่สามารถ login กรุณา Login ใหม่อีกครั้ง</h2>";
		echo "<a href='_login.php'>Login</a>";
	}
 

?>




























