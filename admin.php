<?php
include_once 'header.php';
if (empty($_SESSION['std_code'])) {
    echo "<script>alert('ยังไม่ได้ Login นะ');</script>";
    echo "<META HTTP-EQUIV='Refresh' CONTENT='1;URL=_login.php'>";
}
$sql = "SELECT s.email,s.phone,s.std_code,
CASE u.Status_user
WHEN 1 THEN 'ผู้ดูแลระบบ'
WHEN 2 THEN 'อาจารย์'
WHEN 3 THEN 'นักศึกษา'
ELSE 'ไม่มีสถานะ' END as Status_user
 FROM student s
INNER JOIN `user` u ON u.std_code=s.std_code
WHERE s.std_code='" . $_SESSION['std_code'] . "' AND  u.Status_user=" . $_SESSION['Status_user'] . ""; //คำสั่งของ sql สำหรับ แสดงข้อมูล
$result = $conn->query($sql); //สั่งให้ตัวแปร sql ทำงาน 
$row = '';
$row = $result->fetch_object();
?>
<br>
<center><ul class="actions">
        <li><a href="admin.php" class="button special" title="คอนเฟิร์มกิจกรรม">Confirm Activity</a></li>
        <li><a href="educate.php" class="button" title="สร้างประวัติส่วนตัว">Build Resume</a></li>
        <li><a href="data_aj.php" class="button" title="ข้อมูลอาจารย์">Lecturer Data</a></li>
        <li><a href="data_student.php" class="button" title="ข้อมูลนักศึกษา">Student Data</a></li>
        <li><a href="table.php" class="button" title="ข้อมูลกิจกรรม">Activity Data</a></li>
    </ul></center><br>
<!-- Main -->

<div id="main-wrapper">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5 well well-lg">
                    <header>
                        <h3>ข้อมูลผู้ใช้</h3>
                    </header>
                    <div id="loginbox">
                        <?php $strsql1 ="SELECT CONCAT((CASE s.pname
    WHEN 1 THEN 'นาย'
    WHEN 2 THEN 'นางสาว'
    ELSE 'ไม่มีสถานะ' END),s.fname,' ',s.lname) as fullname
    FROM student s
    WHERE s.std_code='" . $_SESSION['std_code'] . "'" ;
                        $result1 = mysqli_query($conn, $strsql1);
                        $rs1 = mysqli_fetch_array($result1)
                        ?>
                        ชื่อ-นามสกุล : <?= $rs1['fullname'] ?><br />
                        รหัสนักศึกษา : <?= $_SESSION['std_code'] ?>  <br />
                        สถานะ : <?= $row->Status_user ?>  <br />
                        อีเมล์ : <?= $row->email ?>  <br />
                        เบอร์โทร : <?= $row->phone ?>  <br /><br>
                        <a href='edit_self_admin.php?std_code=<?= $_SESSION['std_code'] ?>&Status_user=<?= $_SESSION['Status_user'] ?>&method=edit' title="แก้ไข" class='button'>Edit</a>
                    </div>
                </div>

                <div class="col-md-1"></div>		

                <div class="col-md-5 well well-lg">
                    <header>
                        <?php
                        $strsql = "SELECT * FROM activity a
INNER JOIN history_act h ON h.act_id=a.act_id
WHERE h.std_code='" . $_SESSION['std_code'] . "' AND h.status_regis=1";
                        
                        $result = mysqli_query($conn, $strsql);
                        while ($rs = mysqli_fetch_array($result)) {
                            $checkDate = $rs['act_datestart'];
                            $check = date('Y-m-d', strtotime("$checkDate+14 days "));
                            if (date('Y-m-d') < $check) { ?>
                                <h3><?= $rs['act_name'] ?></h3> <a href="q_std.php?act_id=<?= $rs['act_id'] ?>&std_code=<?= $_SESSION['std_code'] ?>"class="button">Confirm</a><br />
                            <?php }
                        } ?>
                    </header>
                    <form action="Insertion4.php" method="post">
                        <div id="loginbox">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include_once 'footer.php'; ?>