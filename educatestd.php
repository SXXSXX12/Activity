<?php include_once 'header.php'; ?>
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
                                <td align='center'>รหัสนักศึกษา</td>
                                <td align='center'>ชื่อ-สกุล</td>
                                <td align='center'>เพิ่มประวัติการศึกษา</td>
                                <td align='center'>เพิ่มผลงาน</td>
                            </tr>
                            <?php
                            $std_code = $_GET['std_code'];
                            $strsql = "SELECT * FROM student WHERE std_code=$std_code";
                            $result = mysqli_query($conn, $strsql);
                            $row_no = 0;
                            while ($rs = mysqli_fetch_array($result)) {
                                $row_no++;
                                ?>
                                <tr>

                                    <td align='center'><?= $rs['std_code']; ?></td>
                                    <td align='center'><a href="educationtable.php?std_code=<?= $rs['std_code'] ?>"><?php echo $rs ['fname'] . $rs ['lname']; ?></a></td>
                                    <td align='center'><a href='buildresumestd.php?std_code=<?= $rs['std_code'] ?>' title="เพิ่มประวัติการศึกษา"><img src="images/save.ico" width="40" height="45"></a></td>
                                    <td align='center'><a href='addfoliostd.php?std_code=<?= $rs['std_code'] ?>' title="เพิ่มผลงาน"><img src="images/book.svg" width="45" height="45"></a></td>
                                </tr>
                            <?php } ?>


                        </table>
                    </div>
                    <div id="loginbox">
                 </div>
               </form>
            </div>
        </div>
    </div>
</div>
</di>
<?php include_once 'footer.php'; ?>