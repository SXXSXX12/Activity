<?php     include_once 'header.php';?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $std_id = $_GET['std_id'];
    $strsql = "SELECT * FROM student WHERE std_id=$std_id"; 
    $result = mysqli_query($conn,$strsql);
    $rs = mysqli_fetch_array($result);
}
?>
                						   

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>เพิ่มข้อมูลนักศึกษา</h2>
					</header>
					<div class="row">
					<div class="12u">
						<section class="box">
							<form action="check_login.php" method="post">
							<div id="loginbox">
							ชื่อ<input type="text" name="fname" <?= isset($_GET['method'])?$rs['fname']:''?>/><br />
							สกุล<input type="text" name="lname" <?= isset($_GET['method'])?$rs['lname']:''?>/><br />
							รหัสนักศึกษา <input type="text" name="StudentID" <?= isset($_GET['method'])?$rs['std_code']:''?>/><br />
							ที่อยู่ <input type="text" name="address" <?= isset($_GET['method'])?$rs['address']:''?>/><br />
							<div class="col-md-6" style="padding:0;padding-right: 10px;">
							วันเดือนปีเกิด <input readonly  type="text" name="dateofbirth" class='datepicker' data-date-format="yyyy/mm/dd" <?= isset($_GET['method'])?$rs['dateofbirth']:''?> >
								
							เบอร์โทร <input type="text" name="phone"<?= isset($_GET['method'])?$rs['phone']:''?> /><br />
							</div>
                            E-mail <input type="text" name="email" /><br />
                            <?php
                                    if(isset($_GET['method'])?$_GET['method']:''=='edit'){
                                        echo "<input type='hidden' name='method' value='edit'>";
                                        echo "<input type='hidden' name='std_id' value='".$std_id."'>";
                                        echo "<input type='submit' name='submit' value='แก้ไข'>";
                                    }else{
                         ?>
                            
							<input type="submit" value=" บันทึก " />
                                                        <input type="submit" value=" ยกเลิก " />
							
									
								</div>
						   </form>
						  </section>
					</div>
					</div>
				</section>
                                 

			<!-- Footer -->
			<script>
				$('.datepicker').datepicker({
		 		format: 'yyyy/mm/dd',
		 		autoclose: true});
			 </script>
			<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
			<link rel="stylesheet" href="assets/css/main.css" />
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<?php include_once 'footer.php';?>