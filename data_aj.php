<?php     include_once 'header.php';?>
<br>
				<center><ul class="actions">
						<li><a href="admin.php" class="button">Cnofirm Activity</a></li>
						<li><a href="educate.php" class="button ">Build Resume</a></li>
						<li><a href="" class="button special">Lecturer Data</a></li>
						<li><a href="data_student.php" class="button ">Student Data</a></li>
                                                 <li><a href="table.php" class="button">Activity Data</a></li>
					</ul></center>

			<!-- Main -->
				<section id="main" class="container">
					<header>
						<h2>ข้อมูลอาจารย์</h2>
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
			<td align='center'>email</td>
			<td align='center'>Phone</td>
                        <td align='center'>แก้ไข</td>
			<td align='center'>ลบ</td>

												</tr>
<?php
		include_once 'config/config.php';
                if(isset($_GET['method'])){
                    //$method = $_GET['method'];
                    $teach_id = $_GET['teach_id'];
                    $strsql = "delete FROM teacher WHERE teach_id=$teach_id"; 
                    $result = mysqli_query($conn,$strsql) or die(mysqli_error($conn));
                }
		$strsql = "SELECT * FROM teacher ORDER BY teach_id DESC";
		$result = mysqli_query($conn,$strsql);
		$row_no = 0;
		while($rs = mysqli_fetch_array($result))
		{
			$row_no++;
	?>

	<tr>
			<td align='center'><?php echo $row_no;?></td>
			<td align='center'><?php echo $rs ['teach_name'].$rs['teach_lname'];?></td>
			<td align='center'><?php echo $rs['email'];?></td>
			<td align='center'><?php echo $rs['phone'];?></td>
                        <td align='center'><a href='add_aj.php?teach_id=<?php echo $rs['teach_id'];?>&method=edit' class='#'><img src="images/din.png" width="40" height="40"></a></td>
                        <td align='center'><a href='data_aj.php?teach_id=<?php echo $rs['teach_id'];?>&method=delete' onclick="return confirm('คุณต้องการลบ?')" class='#'><img src="images/2.png" width="40" height="40"></a></td>

	</tr>
		<?php } ?>
	
	</table>
															
						</section>
					</div>
				</div>
			</section>
			
<?php include_once 'footer.php'; ?>