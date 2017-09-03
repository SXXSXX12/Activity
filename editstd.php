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
						<h2>แก้ไขข้อมูลส่วนตัว</h2>
					</header>
					<div class="row">
					<div class="12u">
						<section class="box">
							<header>
							</header>
                                                     <div class="alert alert-info">
							<div id="loginbox">
							ชื่อ-สกุล <input type="text" name="name" /><br />
							รหัสนักศึกษา <input type="text" name="student_id"  /><br />
                            E-mail <input type="email" name="username" /><br />
							Password <input type="password" name="password"  /><br />
							เบอร์โทร <input type="text" name="phone" /><br />
                                                        <a href="admin.php"><input type="submit" value=" บันทึก " /></a>
                            <a href="student.php"><input type="submit" class="button special" value=" ยกเลิก " </a>
							
									</ul>
								</div>
							</div>
						</form>
					</div>
				</section>

<?php include_once 'footer.php'; ?>