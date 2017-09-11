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
WHERE u.std_code='1' AND  u.Status_user='2'";
$result = $conn->query($sql); //สั่งให้ตัวแปร sql ทำงาน 
$row = '';
$row = $result->fetch_object();
?>
<br>
<center><ul class="actions">
        <li><a href="Activity_fo.php" class="button">Add Activity </a></li>
        <li><a href="_showaj.php" class="button">Activity Data</a></li>
        <li><a href="data_aj.php" class="button">Lectuere Data</a></li>
        <li><a href="datastd_aj.php" class="button">Student Data</a></li>

    </ul></center>
<!-- Main -->

<div id="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="12u">
                <section>
                    <header class="major">

                    </header>
                    <div class="row">
                        <div class="6u">
                            <section class="box">
                                <header>
                                    <h3>ข้อมูลผู้ใช้</h3>
                                </header>
                                <div id="loginbox">
                                    ชื่อ-นามสกุล : <?= $row->tfull ?><br />
                                    อีเมล์ : <?= $row->email ?> <br />
                                    เบอร์โทร : <?= $row->phone ?>  <br />
                                    <a href="editaj.php"><input type="submit" value=" Edit "/></a>
                                </div>
                                </form>
                            </section>
                        </div>
                        <div class="6u">
                            <section class="box">
                                <header>
                                    <h3>No Activity responsible</h3>
                                </header>
                                <form action="Insertion4.php" method="post">
                                    <div id="loginbox">
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<?php include_once 'footer.php'; ?>