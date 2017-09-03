<?php include_once 'header.php'; ?>
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
							
				</header><br/>
				<center><ul class="actions">
						<li><a href="admin.php" class="button">Cnofirm Activity</a></li>
						<li><a href="buildresumeadmin.php" class="button ">Build Resume</a></li>
						<li><a href="_showac.php" class="button">Activity Data</a></li>
						<li><a href="_showdata.php" class="button special">Lecturer Data</a></li>
						<li><a href="data_student.php" class="button ">Student Data</a></li>
					</ul></center>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>ข้อมูลโครงการ</h2>
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
		<td align='center'>ชื่อผู้รับผิดชอบโครงการ</td>
		<td align='center'>ชื่อโครงการ</td>
		<td align='center'>จำนวนผู้เข้าร่วม</td>
		<td align='center'>จำนวนชั่วโมง</td>
		
		<td align='center'>วันเริ่มจัดโครงการ</td>
		<td align='center'>วันสิ้นสุดโครงการ</td>
		
		<td align='center'>แก้ไข</td>
		<td align='center'>ลบ</td>
		
		
		
	</tr>
	<?php
		include('cog/figer.php');
		$strsql = "SELECT * FROM aj_dt ORDER BY id DESC";
		$result = mysql_query($strsql);
		$row_no = 0;
		while($rs = mysql_fetch_array($result))
		{
			$row_no++;
	?>
		<tr>
			<td align='center'><?php echo $row_no;?></td>
			<td align='center'><?php echo $rs['name'];?></td>
			<td align='center'><?php echo $rs['proname'];?></td>
			<td align='center'><?php echo $rs['number'];?></td>
			<td align='center'><?php echo $rs['Hour'];?></td>
			
			<td align='center'><?php echo $rs['datestart'];?></td>
			<td align='center'><?php echo $rs['dateend'];?></td>
			
			<td align='center'><a href='up_date1.php?data_id=<?php echo $rs['id'];?>'><input type='button' name='edit' value='Edit'></a></td>
                        <td align='center'><a href='delete_data.php?data_id=<?php echo $rs['id'];?>'><input name="submit" onclick="return confirm('คุณต้องการลบข้อมูลที่เลือก')" type="submit" class="special" value="Delete" />
			
			
		</tr>		
		<?php } ?>
</table>		
								
							
						</section>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<div align='center'><a href='projectdata.php'><input type='button' name='edit' value='เพิ่มข้อมูลโครงการ'></a></div>
						

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