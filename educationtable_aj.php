<?php include_once 'header.php'; ?>

<!-- Table -->
<br><br>
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">ประวัติการศึกษาและผลงาน</div>
        <div class="panel-body">
            <div class="alert alert-success col-lg-12">
                <header>
                    <h2>ประวัติการศึกษา</h2> 
                    <?php
                  $std_code = $_GET['std_code'];
                    $strsql = "SELECT * FROM student WHERE std_code=$std_code";

                    $result = mysqli_query($conn, $strsql);
                    $rs = mysqli_fetch_array($result);
                    echo "<h4>ชื่อ นามสกุล : " . $rs ['fname'] . " " . $rs ['lname'] . "<br><br>";
                    echo "รหัสนักศึกษา :" . $rs['std_code'] . "<br><br>";
                    ?>
                </header>
                <table width='100%' align='center'>
                    <thead>
                    <td align='center'>ลำดับ</td>
                    <td align='center'>สาขาวิชา</td>
                    <td align='center'>วุฒิการศึกษา</td>
                    <td align='center'>สถาบันที่จบ</td>
                    <td align='center'>ปีที่จบการศึกษา</td>
                   </thead>
                    <?php
//                    $std_code = $_GET['std_code'];
                    $strsql = "SELECT e1.edu_id,e1.major,e2.educate_name,e1.intiute,e1.endyear
                                           FROM education e1 
                                           INNER JOIN educate e2 on e2.educate_id=e1.edu_level
                                           WHERE e1.std_code=$std_code";
                    $result = mysqli_query($conn, $strsql);
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($result)) {
                        $row_no++;
                        ?>
                        <tr>
                            <td align='center'><?= $row_no ?></td>
                            <td align='center'><?php echo $rs ['major']; ?></td>
                            <td align='center'><?php echo $rs ['educate_name']; ?></td>
                            <td align='center'><?php echo $rs ['intiute']; ?></td>
                            <td align='center'><?php echo $rs ['endyear']; ?></td>
                        </tr>
                    <?php } ?>
                    <input type="hidden" name="edu_id" value="<?= $edu_id ?>">
                </table>
            </div>
            <div class="alert alert-success col-lg-12">
                <h2>ผลงาน</h2>
                 <table width='100%' align='center'>
                    <thead>
                    <td align='center'>ลำดับ</td>
                    <td align='center'>ชื่อผลงาน</td>
                    <td align='center'>รายละเอียดผลงาน</td>
                    <td align='center'>ปีที่ทำผลงาน</td>
                     </thead>
                    <?php
                  $strsql1 = "SELECT p.portfolio_id,p.projectname,p.portfolio,p.portyear
                             FROM portfolio p
                             WHERE std_code=$std_code";
                    $result1 = mysqli_query($conn, $strsql1);
                    $row_no1 = 0;
                    while ($rs = mysqli_fetch_array($result1)) {
                        $row_no1++;
                        ?>
                        <tr>
                            <td align='center'><?= $row_no1 ?></td>
                            <td align='center'><?php echo $rs ['projectname']; ?></td>
                            <td align='center'><?php echo $rs ['portfolio']; ?></td>
                            <td align='center'><?php echo $rs ['portyear']; ?></td>
                         </tr>
                    <?php } ?>
                 </table>
            </div>
            <div align='center'><a href='folio_pdf.php?std_code=<?=$std_code?>' title="พิมพ์ใบ portfolio" target="_blank"><img src="images/printer.ico" width="65" height="65" ></a></div>
        </div>
    </div>
</section>
<?php include_once 'footer.php'; ?>
