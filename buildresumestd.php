<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>comsci</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="student.php"><img src="sup.png" width="60" height="60"></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="_showactive.php">Activity Table</a></li>
							<li><a href='index.php'><input name="submit" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')" type="submit" value="Sign Out" />
						</ul>
					</nav>
				</header><br>
				<center><ul class="actions">
						<li><a href="student.php" class="button ">Cnofirm Activity</a></li>
						<li><a href="buildresumestd.php" class="button special">Build Resume</a></li>
						<li><a href="_showactive.php" class="button">Activity Data</a></li>
					</ul></center>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h3>สร้างประวัติส่วนตัว</h3>
					</header>
					<div class="row">
					<div class="12u">
						<section class="box">
							<header>
							</header>
				
							<div id="loginbox">
							ชื่อ-สกุล <input type="text" name="name" /><br />
							ที่อยู่ <input type="text" name="address" /><br />
							วันเดือนปีเกิด <input type="text" name="date of birth" /><br />
							เบอร์โทร <input type="text" name="phone" /><br />
                            E-mail <input type="email" name="email" /><br />
							ประวัติ <input type="text" name="profile" /><br />
							ผลงาน <input type="text" name="achievements" /><br />
							การศึกษา <input type="text" name="education" /><br />
							<a href="resumestd.php"><input type="submit" value=" บันทึก " />
                            <input type="submit" value=" ยกเลิก " />
							
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; 234 ถนนเลย-เชียงคาน ตำบลเมือง อำเภอเมืองเลย จังหวัเลย ห้อง 323 อาคาร 3 โทรศัพท์ 042-835223-8 ต่อ 42128</a></li>
						 <p><p>สงวนสิขสิทธิ์ © พ.ศ.2556, มหาวิทยาลัยราชภัฏเลย พัฒนาโดย คณะวิทยาศาสตร์และเทคโนโลยี สาขาวิชาวิทยาการคอมพิวเตอร์</p></p>
					</ul>
				</footer>

		</div>

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
	