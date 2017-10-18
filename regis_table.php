<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>ลงทะเบียนกิจกรรม</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
            <section class="box">
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <div class="row uniform 1000%">
                            <table width='600' align='center'>
                                <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>ชื่อกิจกรรม</td>
                                    <td align='center'>เวลา</td>
                                    <td align='center'>สถานที่</td>
                                    <td align='center'>วันเริ่มจัดโครงการ</td>
                                    <td align='center'>วันสิ้นสุดโครงการ</td>
                                    <td align='center'>ลงทะเบียน</td>
                                </tr>
                                <?php
                                include_once 'config/config.php';
                                include_once 'funtion/funcDateThai.php';
                                $strsql = "SELECT * FROM activity ORDER BY act_id DESC";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    $checkDate = $rs['act_datestart'];
                                    $check = date('Y-m-d', strtotime("$checkDate+14 days "));
                                    if (date('Y-m-d') < $check) {
                                        ?>

                                        <tr>
                                            <td align='center'><?= $row_no ?></td>
                                            <td align='center'><?= $rs['act_name']; ?></td>
                                            <td align='center'><?= $rs['start_time']; ?></td>
                                            <td align='center'><?= $rs['act_location']; ?></td>
                                            <td align='center'><?= DateThai1($rs['act_datestart']) ?></td>
                                            <td align='center'><?= DateThai1($rs['act_dateend']) ?></td>
                                            <td align='center'><a href='regisact.php?act_id=<?= $rs['act_id'] ?>' class='#'><img src="images/mask.png" width="40" height="35"></a></td>
                                        </tr>		
    <?php }
}
?>
                            </table>
                            </section>
                        </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>