<?php     include_once 'header.php';?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $std_code = $_GET['std_code'];
    $status_user = $_GET['Status_user'];
    $strsql = "SELECT u.username,u.`password`,s.phone,s.std_code,s.fname,s.lname,s.address,s.dateofbirth
FROM `user` u
INNER JOIN student s ON s.std_code = u.std_code
WHERE s.std_code = $std_code AND u.Status_user =$status_user"; 
    $result = mysqli_query($conn,$strsql);
    $rs = mysqli_fetch_array($result);
}
?>                						   

			<!-- Main -->
				<section id="main" class="container 75%">
					<header>
						<h2>ข้อมูลผู้ใช้งาน</h2>
					</header>
					<div class="row">
					<div class="12u">
						
                                            <form action="editself.php" method="post">
                                                        <div class="alert alert-info">
							<div id="loginbox">
                                                            <h4>คำนำหน้า
                                                                <select name="pname" required>
                                                                    <option value="">เลือกคำนำหน้าชื่อ</option>
                                                                    <?php if(isset($_GET['method'])){
                                                                        if($rs['pname']=='1'){?>
                                                                    <option value="1" selected>นาย</option>
                                                                    <option value="2">นางสาว</option>
                                                                        <?php }elseif($rs['pname']=='2'){?>
                                                                    <option value="1">นาย</option>
                                                                    <option value="2" selected>นางสาว</option>
                                                                        <?php }else{ ?>
                                                                    <option value="1">นาย</option>
                                                                    <option value="2">นางสาว</option>
                                                                        <?php }?>
                                                                    <?php }else{ ?>
                                                                    
                                                                    <option value="1">นาย</option>
                                                                    <option value="2">นางสาว</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </h4>    
							<h4>ชื่อ<input type="text" name="fname" value="<?= isset($_GET['method'])?$rs['fname']:''?>"/></h4>
							<h4>สกุล<input type="text" name="lname"value="<?=isset($_GET['method'])?$rs['lname']:''?>"/></h4>
							<h4>รหัสนักศึกษา <input type="text" name="StudentID" value="<?= isset($_GET['method'])?$rs['std_code']:''?>"/></h4>
							<h4>ที่อยู่ <input type="text" name="address"value="<?= isset($_GET['method'])?$rs['address']:''?>"/></h4>
							<h4>วัน-เดือน-ปี-เกิด <input readonly  type="text" name="dateofbirth" class='datepicker' data-date-format="yyyy/mm/dd"value="<?= isset($_GET['method'])?$rs['dateofbirth']:''?>"></h4>
							<h4>เบอร์โทร <input type="text" name="phone"value=" <?= isset($_GET['method'])?$rs['phone']:''?>"/></h4>	
                                                        <h4>Username <input type="text" name="email" value=" <?= isset($_GET['method'])?$rs['username']:''?>"/></h4>
                                                        <h4>Password <input type="text" name="email" value=" <?= isset($_GET['method'])?$rs['password']:''?>"/></h4>
							<?php
                                    if(isset($_GET['method'])?$_GET['method']:''=='edit'){
                                        echo "<input type='hidden' name='method' value='edit'>";
                                        echo "<input type='hidden' name='std_code' value='".$std_code."'>";
                                        echo "<input type='submit' name='submit' value='บันทึก'>";
                                    }else{
                         ?>
                                                        <h4><input type="submit" value=" บันทึก " />
                                                        <input type="reset" class="button special" value=" ยกเลิก " /></h4>
							
                                    <?php }?>				
								</div>
						   
						 
					</div></form>
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