<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>ข้อมูลกิจกรรม</title>
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
			    height: 3em;
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
					<h1><a href="admin.php"><img src="sup.png" width="60" height="60"></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="_showactive.php">Activity Table</a></li>
                            <li><a href='index.php'><input name="submit" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่')" type="submit" value="Sign Out" />
										</ul>
									</li>
								</ul>
							</li>
							
				</header><br>
				<center><ul class="actions">
						<li><a href="_showac.php" class="button special">Activity Data</a></li>
						<li><a href="q_q.php" class="button ">สร้างแบบประเมิน</a></li>
						<li><a href="a.php" class="button">สรุปแบบประเมิน</a></li>
						

					</ul></center>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>ข้อมูลกิจกรรม</h2>
					</header>
					<div class="row">
						<div class="12u">

							

							<!-- Table -->
								<section class="box">
									<div class="table-wrapper">
										<table>
											<thead>
											<div class="row uniform 1000%">
											<table width='600' align='center'>
												<tr>
		<td align='center'>ลำดับ</td>
		<td align='center'>ชื่อกิจกรรม</td>
		<td align='center'>เวลา</td>
		<td align='center'>สถานที่</td>
		
		<td align='center'>วันเริ่มจัดโครงการ</td>
		<td align='center'>วันสิ้นสุดโครงการ</td>
		
		<td align='center'>แก้ไข</td>
		<td align='center'>ลบ</td>
		
		
		
	</tr>
	<?php
		include('config/config.php');
		$strsql = "SELECT * FROM ac_data ORDER BY id DESC";
		$result = mysql_query($strsql);
		$row_no = 0;
		while($rs = mysql_fetch_array($result))
		{
			$row_no++;
	?>
		<tr>
			<td align='center'><?php echo $row_no;?></td>
			<td align='center'><?php echo $rs['name'];?></td>
			<td align='center'><?php echo $rs['time'];?></td>
			<td align='center'><?php echo $rs['location'];?></td>
			
			<td align='center'><?php echo $rs['dateStart'];?></td>
			<td align='center'><?php echo $rs['dateEnd'];?></td>
			<td align='center'><a href='update1_ac.php?data_id=<?php echo $rs['id'];?>'><input type='button' name='edit' value='Edit'></a></td>
			<td align='center'><a href='delete_ac.php?data_id=<?php echo $rs['id'];?>'><input name="submit" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" type="submit" value="Delete" />
			
			
		</tr>		
		<?php } ?>
</table>		
								
							</form>
						</section>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
</div>
<div align='center'><a href='Activity_fo.php'><input type='button' name='edit' value='เพิ่มข้อมูลกิจกรรม'></a></div>

						

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
			
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>