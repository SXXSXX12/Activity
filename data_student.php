<?php     include_once 'header.php';?>
<br>
				<center><ul class="actions">
						<li><a href="admin.php" class="button">Cnofirm Activity</a></li>
                                                <li><a href="educate.php" class="button ">Build Resume</a></li>
                                                <li><a href="Activity_fo.php" class="button">Activity Data</a></li>
						<li><a href="data_aj.php" class="button">Lecturer Data</a></li>
						<li><a href="data_student.php" class="button special">Student Data</a></li>
					</ul></center>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>ข้อมูลนักศึกษา</h2>
					</header>
					<div class="row">
						<div class="12u">
							<!-- Table -->
								<section class="box">

									<div class="table-wrapper">
										<table>
												<tr>
			<td align='center'>ลำดับที่</td>
			<td align='center'>ชื่อ-สกุล</td>
			<td align='center'>รหัสนักศึกษา</td>
			<td align='center'>Username</td>
			<td align='center'>Phone</td>
                        <td align='center'>แก้ไข</td>
			<td align='center'>ลบ</td>

												</tr>
<?php
		include_once 'config/config.php';
                if(isset($_GET['method'])){
                    //$method = $_GET['method'];
                    $std_id = $_GET['std_id'];
                    $strsql = "delete FROM student WHERE std_id=$std_id"; 
                    $result = mysqli_query($conn,$strsql) or die(mysqli_error($conn));
                }
		$strsql = "SELECT * FROM student ORDER BY std_id DESC";
		$result = mysqli_query($conn,$strsql);
		$row_no = 0;
		while($rs = mysqli_fetch_array($result))
		{
			$row_no++;
	?>

	<tr>
			<td align='center'><?php echo $row_no;?></td>
			<td align='center'><?php echo $rs ['fname'].$rs ['lname'];?></td>
			<td align='center'><?php echo $rs['std_code'];?></td>
			<td align='center'><?php echo $rs['email'];?></td>
			<td align='center'><?php echo $rs['phone'];?></td>
                        <td align='center'><a href='add_stddata.php?std_id=<?php echo $rs['std_id'];?>&method=edit' class='#'><img src="images/din.png" width="40" height="40"></a></td>
                        <td align='center'><a href='data_student.php?std_id=<?php echo $rs['std_id'];?>&method=delete' onclick="return confirm('คุณต้องการลบ?')" class='#'><img src="images/2.png" width="40" height="40"></a></td>

	</tr>
		<?php } ?>
	
	</table>
															
						</section>
					</div>
				</div>
			</section>
			
<?php include_once 'footer.php'; ?>