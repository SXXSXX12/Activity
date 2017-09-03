<?php include_once 'header.php'?>
			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>เข้าสู่ระบบ</h2>
					</header>
					
<html>
<head>
<meta charset="UTF-8">
<title>LOGIN</title>
</head>
<div align="center"><img src="images/sc.png" width="130" height="130"></center>
				<div class="row">
					<div class="12u">
						<section class="box" >
						
						
<form action="_loginController.php" method="POST">
     <div class="alert alert-info">
     <div id="loginbox">
        <h4>Username <input type="text" name="username" placeholder="Email"></h4><br>
    </div>
</form>
    <div>
        <h4>Password <input type="password" name="password" placeholder="pass"></h4><br>
    </div>
    <div> 
    	<h4>Status</h4>
    	<select name="statususer">
        <option value="3">เลือกสถานะ</option>
    	<option value="3">นักศึกษา</option>
    	<option value="2">อาจารย์</option>
    	<option value="1">ผู้ดูแลระบบ</option>
    		
    	</select>
    	
    </div><br
    <div>
		<a href="data_user.php"><input type="submit" value=" Login"></a><br><br>
		<div align="center"><a href="_register.php">Register</a></div>
    </div>
    </div>
    </div>
    </div>
					
</section>
			
	


<!-- Footer -->
				<footer id="footer">
					<ul class="copyright">
						<li>&copy; 234 ถนนเลย-เชียงคาน ตำบลเมือง อำเภอเมืองเลย จังหวัเลย ห้อง 323 อาคาร 3 โทรศัพท์ 042-835223-8 ต่อ 42128</a></li>
                        <p><p>สงวนสิขสิทธิ์ © พ.ศ.2556, มหาวิทยาลัยราชภัฏเลย พัฒนาโดย คณะวิทยาศาสตร์และเทคโนโลยี สาขาวิชาวิทยาการคอมพิวเตอร์</p></p>
					</ul>
				</footer>

		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>