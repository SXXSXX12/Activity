<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>เพิ่มข้อมูลนักศึกษา</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/datepicker.css"/>
		
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		
		<script type="text/javascript" src="js/jquery-ui-sliderAccess.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
 	<style>
		input[type="submit"]{
			    height: 4em;
		}
		input[type="text"]{
			    height: 4em;
		}
	</style>
	</head>
	<body>
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html"><img src="sup.png" width="60" height="60"></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="_showactive.php">Activity Table</a></li>
							<li><a href="index.php">Sign Out</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>เพิ่มข้อมูลนักศึกษา</h2>
					</header>
					<div class="box">
							<form name='regis' method='POST' action='insertdata.php'>
							<div id="loginbox">
							<h3>ชื่อ-สกุล </h3><input type="text" name="name" />
							<h3>รหัสนักศึกษา</h3><input type="text" name="student_id"/>
                            <h3>E-mail</h3><input type="email" name="username"/>
							<h3>Password</h3><input type="password" name="password" />
							<h3>เบอร์โทร</h3> <input type="text" name="phone" /><br/>
							<input type="submit" value=" บันทึก " />
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

		<!-- Scripts 
			<script src="assets/js/jquery.min.js"></script>-->
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
	