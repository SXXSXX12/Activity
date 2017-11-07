<?php include_once 'header.php'; ?>
<?php
if (isset($_GET['method'])) {
    $method = $_GET['method'];
    $teach_id = $_GET['teach_id'];
    $strsql = "SELECT * FROM teacher WHERE teach_id=$teach_id";
    $result = mysqli_query($conn, $strsql);
    $rs = mysqli_fetch_array($result);
}
?>                			
<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>สมัครสมาชิก</h2>
    </header>
    <div class="12u">
            <header>
                <h3>Register</h3>
            </header>
            <form action="adduser.php" method="post">
                <div class="alert alert-info">
                    <div id="loginbox">
                        รหัสประจำตัว <input type="text" name="stu_id" required onkeyup="javascript:inputDigits(this);"/><br />
                        E-mail <input type="email" name="email" required/><br />             			
                        Password <input type="password" name="password1" required/><br />
                        Confirm-Password <input type="password" name="password2" required/><br /> 
                            <h4>Status</h4>
                            <select name="statususer">
                                <option value="3">เลือกสถานะ</option>
                                <option value="3">นักศึกษา</option>
                                <option value="2">อาจารย์</option>
                                <option value="1">ผู้ดูแลระบบ</option>
                            </select>
                            <br>
                            <div align='center'><input type="submit"  value="Register" ></div>
                    </div>
                </div>
            </form>
        </section>
    </div
</section>
</section>             
<!-- Footer -->
<footer id="footer">
    <ul class="copyright">
        <li>&copy; 234 ถนนเลย-เชียงคาน ตำบลเมือง อำเภอเมืองเลย จังหวัเลย ห้อง 323 อาคาร 3 โทรศัพท์ 042-835223-8 ต่อ 42128</a></li>
        <p><p>สงวนสิขสิทธิ์ © พ.ศ.2556, มหาวิทยาลัยราชภัฏเลย พัฒนาโดย คณะวิทยาศาสตร์และเทคโนโลยี สาขาวิชาวิทยาการคอมพิวเตอร์</p></p>
    </ul>
</footer>
</div>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
</body>
</html>