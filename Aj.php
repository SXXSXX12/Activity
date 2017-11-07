<?php
include_once 'header.php';
$sql = "SELECT t.email,t.phone,t.teach_id,CONCAT(t.teach_name,' ',t.teach_lname) AS tfull ,
CASE u.Status_user
WHEN 1 THEN 'ผู้ดูแลระบบ'
WHEN 2 THEN 'อาจารย์'
WHEN 3 THEN 'นักศึกษา'
ELSE 'ไม่มีสถานะ' END as Status_user
 FROM teacher t
INNER JOIN `user` u ON u.std_code=t.teach_id
WHERE u.std_code='" . $_SESSION['std_code'] . "' AND  u.Status_user=" . $_SESSION['Status_user'] . "";
$result = $conn->query($sql); //สั่งให้ตัวแปร sql ทำงาน 
$row = '';
$row = $result->fetch_object();
?>
<br>
<center><ul class="actions">
        <li><a href="Aj.php" class="button special">Lectuere Data</a></li>
        <li><a href="table_aj.php" class="button">Activity Data</a></li>
        <li><a href="data_student_aj.php" class="button">Student Data</a></li>
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
                        ชื่อ-นามสกุล : <?= $row->tfull ?><br />
                        อีเมล์ : <?= $row->email ?> <br />
                        สถานะ : <?= $row->Status_user ?>  <br />
                        เบอร์โทร : <?= $row->phone ?>  <br />
                        <a href='edit_self_aj.php?Status_user=<?= $_SESSION['Status_user'] ?>&method=edit' class='button' title="แก้ไข">Edit</a>
                    </div>
                </div>
                <div class="col-md-1"></div>		
                <div class="col-md-5 well well-lg">
                    <header>
                        <h3>กิจกรรมที่รับผิดชอบ 5 อันดับล่าสุด</h3>
                    </header>
                    <table width='100%' align='center'>
                    <?php
                    //$std_code = $_GET['std_code'];
                    if($_SESSION['Status_user']=='2'){
                                    $wherecode = "WHERE t.teach_id=".$_SESSION['std_code']."";
                                } else {
                                    $wherecode = "";
}
                    $strsql = "SELECT a.act_id,a.act_name
FROM activity a
INNER JOIN teacher t ON t.teach_id = a.respon
$wherecode order by a.act_id desc limit 5";
                    $result = mysqli_query($conn, $strsql);
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($result)) {
                        $row_no++;
                        ?>
                        <tr>
                            <td align='left'><?= $row_no ?></td>
                            <td align='left'><?php echo $rs['act_name']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                    <a href="table_aj.php">กิจกรรมที่รับผิดชอบทั้งหมด</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include_once 'footer.php'; ?>