<?php include_once 'header.php'; ?>
<br>
<center><ul class="actions">
        <li><a href="admin.php" class="button"  title="คอนเฟิร์มกิจกรรม">Confirm Activity</a></li>
        <li><a href="educate.php" class="button special"  title="สร้างประวัติส่วนตัว">Build Resume</a></li>
        <li><a href="data_aj.php" class="button" title="ข้อมูลอาจารย์">Lecturer Data</a></li>
        <li><a href="data_student.php" class="button" title="ข้อมูลนักศึกษา">Student Data</a></li>
        <li><a href="table.php" class="button" title="ข้อมูลกิจกรรม">Activity Data</a></li>
    </ul></center>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>ประวัติการศึกษา</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <div class="row uniform 100%">
                            <table width='100%' align='center'>
                                <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>รหัสนักศึกษา</td>
                                    <td align='center'>ชื่อ-สกุล</td>
                                    <td align='center'>เพิ่มประวัติการศึกษา</td>
                                    <td align='center'>เพิ่มผลงาน</td>
                                </tr>
                                <?php
                                //$std_code = $_GET['std_code'];
                                $strsql = "SELECT * FROM student";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    ?>
                                    <tr>
                                        <td align='center'><?= $row_no ?></td>
                                        <td align='center'><?php echo $rs['std_code']; ?></td>
                                        <td align='center'><a href="educationtable.php?std_code=<?= $rs['std_code'] ?>"><?php echo $rs ['fname'] . $rs ['lname']; ?></a></td>
                                        <td align='center'><a href='buildresumeadmin.php?std_code=<?= $rs['std_code'] ?>'title="เพิ่มประวัติการศึกษา"><img src="images/save.ico" width="40" height="45"></a></td>
                                        <td align='center'><a href='addfolio.php?std_code=<?= $rs['std_code'] ?>' title="เพิ่มผลงาน"><img src="images/book.svg" width="45" height="45"></a></td>
                                    </tr>
                                <?php } ?>

                            </table>
                        </div>
                    </table>
                </div>
            </section>
        </div>
    </div>


    <?php include_once 'footer.php'; ?>
