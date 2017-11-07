<?php     include_once 'header.php';?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    if($_SESSION['Status_user']=='2'){
                                    $wherecode = "WHERE t.teach_id=".$_SESSION['std_code']."";
                                } else {
                                    $wherecode = "";
}
    $status_user = $_GET['Status_user'];
    $strsql = "SELECT u.username,u.`password`,t.teach_name,t.teach_lname,t.phone,t.email
FROM `user` u
INNER JOIN teacher t ON t.teach_id = u.std_code
$wherecode AND u.Status_user =$status_user"; 
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
						
                                            <form action="editselfaj.php" method="post" enctype="multipart/form-data">
                                                        <div class="alert alert-info">
							<div id="loginbox">
                                                            <h4>ชื่อ<input type="text" name="teach_name" value="<?= isset($_GET['method'])?$rs['teach_name']:''?>"required onkeyup="javascript:inputString(this);"/></h4>
                                                            <h4>สกุล<input type="text" name="teach_lname"value="<?=isset($_GET['method'])?$rs['teach_lname']:''?>"required onkeyup="javascript:inputString(this);"/></h4>
                                                        <h4>เบอร์โทร <input type="text" name="phone"value="<?= isset($_GET['method'])?$rs['phone']:''?>"required onkeyup="javascript:inputDigits(this);"/></h4>
                                                        <h4>E-mail<input type="text" name="email"value="<?= isset($_GET['method'])?$rs['email']:''?>"required/></h4>
                                                        <h4>Username <input type="text" name="username" value="<?= isset($_GET['method'])?$rs['username']:''?>"required/></h4>
                                                        <h4>Password <input type="text" name="password" value="<?= isset($_GET['method'])?$rs['password']:''?>"required/></h4>
                                                        <?php
                                    if(isset($_GET['method'])?$_GET['method']:''=='edit'){
                                        echo "<input type='hidden' name='method' value='edit'>";
                                        echo "<input type='hidden' name='SESSION' value='".$_SESSION['std_code']."'>";
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