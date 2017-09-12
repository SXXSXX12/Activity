<?php include_once 'header.php'; ?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $std_id = $_GET['std_id'];
    $status_user = $_GET['Status_user'];
    $strsql = "SELECT u.username,u.`password`,s.phone,s.std_code,CONCAT(s.fname,' ',s.lname) AS fullname
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
        <h2>ข้อมูลส่วนตัว</h2>
    </header>
    <div class="row">
        <div class="12u">
            <section class="box">
                <header>
                </header>
                <div class="alert alert-info">
                    <div id="loginbox">
                        ชื่อ-สกุล <input type="text" name="name"<?=isset($_GET['method'])?$rs['fullname']:''?> /><br />
                        รหัสนักศึกษา <input type="text" name="student_id"<?= isset($_GET['method'])?$rs['std_code']:''?>  /><br />
                        E-mail <input type="email" name="username"<?= isset($_GET['method'])?$rs['username']:''?> /><br />
                        Password <input type="password" name="password" <?= isset($_GET['method'])?$rs['password']:''?> /><br />
                        เบอร์โทร <input type="text" name="phone"<?= isset($_GET['method'])?$rs['phone']:''?> /><br />
                        <a href="admin.php"><input type="submit" value=" บันทึก " /></a>
                        <a href="student.php"><input type="submit" class="button special" value=" ยกเลิก " </a>

                        </ul>
                    </div>
                </div>
                </form>
        </div>
</section>

<?php include_once 'footer.php'; ?>