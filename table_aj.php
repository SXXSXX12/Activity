<?php include_once 'header.php'; ?>
<br>                                     
<center><ul class="actions">
        <li><a href="Aj.php" class="button">Lectuere Data</a></li>
        <li><a href="Activity_aj.php" class="button">Add Activity </a></li>
        <li><a href="table_aj.php" class="button special">Activity Data</a></li>
        <li><a href="data_student_aj.php" class="button">Student Data</a></li>
    </ul></center>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>ข้อมูลกิจกรรม</h2>
    </header>
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
                                    <td align='center'>โค้ดกิจกรรม</td>
                                    <td align='center'>เพิ่ม</td>
                                    <td align='center'>แก้ไข</td>
                                    <td align='center'>ลบ</td>
                                </tr>
                                <?php
                                include_once 'funtion/funcDateThai.php';
                                if (isset($_GET['method'])) {
                                    //$method = $_GET['method'];
                                    //$teach_id = $_GET['teach_id'];
                                    $act_id = $_GET['act_id'];
                                    $strsql = "delete FROM activity WHERE act_id=$act_id";
                                    $result = mysqli_query($conn, $strsql) or die(mysqli_error($conn));
                                }
                                $strsql = "SELECT a.*,c.act_id as check_act 
FROM activity a
left join code_activity c on c.act_id=a.act_id
group by a.act_id
ORDER BY act_id DESC";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    ?>
                                    <tr>
                                        <td align='center'><?= $row_no ?></td>
                                        <td align='center'><?= $rs['act_name']; ?></td>
                                        <td align='center'><?= $rs['start_time']; ?></td>
                                        <td align='center'><?= $rs['act_location']; ?></td>
                                        <td align='center'><?= DateThai1($rs['act_datestart']) ?></td>
                                        <td align='center'><?= DateThai1($rs['act_dateend']) ?></td>
                                        <?php if (empty($rs['check_act'])) { ?>
                                            <td align='center'><a href='randomcode.php?act_id=<?= $rs['act_id'] ?>' class='#'><img src="images/das.png" width="35" height="35"></a></td>
                                        <?php } else { ?>
                                            <td align='center'><a href='code.php?act_id=<?= $rs['act_id'] ?>' title="พิมพ์โค้ดกิจกรรม" target="_blank"><img src="images/printer.ico" width="35" height="35"></a></td>
                                        <?php } ?>
                                            <td align='center'><a href='Activity_aj.php' title="เพิ่มกิจกรรม"><img src="images/save.ico" width="40" height="45"></a></td>
                                            <td align='center'><a href='Activity_aj.php?act_id=<?= $rs['act_id'] ?>&method=edit' title="แก้ไขกิจกรรม"><img src="images/din.png" width="35" height="35"></a></td>
                                            <td align='center'><a href='table_aj.php?act_id=<?= $rs['act_id']; ?>&method=delete' onclick="return confirm('คุณต้องการลบ?')" title="ลบกิจกรรม"><img src="images/2.png" width="35" height="35"></a></td>
                                    </tr>		
                                <?php } ?>
                            </table>
                         </section>

<?php include_once 'footer.php'; ?>