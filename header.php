<?php session_start();
require_once("config/config.php");
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Activity System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="css/datepicker.css"/>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
                <script src="js/excellentexport.js"></script>
                <!--scrip check numberical-->
                <script type="text/javascript">
                    function inputDigits(sensor) {
                        var regExp = /[0-9.-]$/;
                        if (!regExp.test(sensor.value)) {
                            alert("กรอกตัวเลขเท่านั้นค่ะ");
                            sensor.value = sensor.value.substring(0, sensor.value.length - 1);
                        }
                    }
                </script>
                <!--scrip check ตัวอักษร-->
                <script type="text/javascript">
                    function inputString(sensor) {
                        var regExp = /[A-Za-zก-ฮะ-็่-๋์]$/;
                        if (!regExp.test(sensor.value)) {
                            alert("กรอกตัวอักษรเท่านั้นค่ะ");
                            sensor.value = sensor.value.substring(0, sensor.value.length - 1);
                        }
                    }
                </script>
		<style type="text/css">
			#main-wrapper {
  				font-size: 18px;
				}
			footer {
				font-size: 16px;
			}	
		</style>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
                                    <h1><a href="_login.php"><img src="images/icon-home.png" width="55" height="50"></a></a> </h1>
					<nav id="nav">
						<ul>
                                                    <li><a href="index.php">Home</a></li>
                                                    <li><a href="tableindex.php">Activity Table</a></li>
                                                        
							<?php 
							if (empty($_SESSION['Status_user'])) {
								echo "<li><a href='_login.php'>Sign In</a></li>";
							}else{ ?>
                                                        <li>
								<a href="#" class="icon fa-angle-down"><?= $_SESSION['fullname']?></a>
								<ul>
                                                                    <?php if($_SESSION['Status_user']=='1'){?>
                                                                    <li><a href="admin.php">หน้าหลัก</a></li>
                                                                    <li><a href="add_stddata.php">เพิ่มข้อมูลนักศึกษา</a></li>
                                                                    <li><a href="add_aj.php">เพิ่มข้อมูลอาจารย์</a></li>
                                                                    <li><a href="Activity_fo.php">เพิ่มข้อมูลกิจกรรม</a></li>
                                                                    <li><a href="update_new.php">เพิ่มข่าวประชาสัมพันธ์</a></li>
                                                                    <li><a href="report_act.php">รายงานการเข้ากิจกรรม</a></li>
                                                                    <?php }?> 
                                                                    
                                                                        <li><a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่');">ออกจากระบบ</a></li>
								</ul>
							</li>
								
							<?php }?>
							</ul>	
					</nav>
				</header>