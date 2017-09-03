<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>เข้าสู่ระบบ</title>
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
					<h1><a href="index.html">COMPUTERSCI</h1>
					<nav id="nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="index.php">Activity table</a></li>
                            	<li><a href="login.php">Sign in</a></li>
                             </ul>
						</li>
					</ul>
				</li>
            
            </header>

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>เข้าสู่ระบบ</h2>
					</header>
	
				<div class="row">
					<div class="12u">
						<section class="box">
							<header>
								<h3>Login</h3>
							</header>
						<form action="check_login.php" method="post">
							<div id="loginbox">
							E-mail <input type="text" name="username" /><br />
							Password <input type="password" name="password"  /><br />
							<input type="submit" value=" Login " />
							</div>
							</form>
						</section>
					</div>
					<div class="12u">
						<section class="box">
							<header>
								<h3>Register</h3>
							</header>
							<form action="Insertion4.php" method="post">
							<div id="loginbox">
                            รหัสประจำตัว <input type="text" name="stu_id" /><br />
                            ชื่อ-นามสกุล <input type="text" name="stu_name" /><br />
                            E-mail <input type="text" name="email" /><br />                			
							Password <input type="password" name="password1"  /><br />
                            Confirm-Password <input type="password" name="password2"  /><br />
                            
							<input type="submit" value=" Register "/>
							</div>
							</form>
						</section>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</div>
                

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