<?php     include_once 'header.php';?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $teach_id = $_GET['teach_id'];
    $strsql = "SELECT * FROM teacher WHERE teach_id=$teach_id"; 
    $result = mysqli_query($conn,$strsql);
    $rs = mysqli_fetch_array($result);
}
?>                						   

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>เพิ่มข้อมูลอาจารย์</h2>
					</header>
					<div class="row">
					<div class="12u">
						
							<form action="addaj.php" method="post">
                                                        <div class="alert alert-info">
							<div id="loginbox">
							<h4>ชื่อ<input type="text" name="fname" value="<?= isset($_GET['method'])?$rs['teach_name']:''?>" required/></h4>
							<h4>สกุล<input type="text" name="lname"value=" <?= isset($_GET['method'])?$rs['teach_lname']:''?>" required/></h4>
							<h4>เบอร์โทร <input type="text" name="phone"value=" <?= isset($_GET['method'])?$rs['phone']:''?>" required/></h4>	
                                                        <h4>E-mail <input type="text" name="email" value=" <?= isset($_GET['method'])?$rs['email']:''?>" required/></h4>
							<?php
                                    if(isset($_GET['method'])?$_GET['method']:''=='edit'){
                                        echo "<input type='hidden' name='method' value='edit'>";
                                        echo "<input type='hidden' name='teach_id' value='".$teach_id."'>";
                                        echo "<input type='submit' name='submit' value='บันทึก'>";
                                    }else{
                         ?>
                                                        <h4><input type="submit" value=" บันทึก " />
                                                        <input type="reset" class="button special" value=" ยกเลิก " /></h4>
							
                                    <?php }?>				
								</div>
						   </form>
						 
					</div>
					</div>
                                            </div>
				</section>

			<!-- Footer -->
			<script>
				$('.datepicker').datepicker({
		 		format: 'yyyy/mm/dd',
		 		autoclose: true,});
			 </script>
			<!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
			<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
			<link rel="stylesheet" href="assets/css/main.css" />
			<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>-->
<?php include_once 'footer.php';?>