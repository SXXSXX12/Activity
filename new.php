<?php include_once 'header.php'; ?>
<br>  
<section id="main" class="container">
    <header>
        <h2>จัดการข่าวประชาสัมพันธ์</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                    <div class="row uniform 1000%">
                        <table width='600' align='center'>
                            <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>หัวเรื่อง</td>
                                    <td align='center'>รายละเอียด</td>
                                    <td align='center'>รูปภาพ</td>
                                    <td align='center'>วันเริ่มที่อัพเดท</td>
                                    <td align='center'>เพิ่ม</td>
                                    <td align='center'>แก้ไข</td>
                                    <td align='center'>ลบ</td>
                                </tr>
                                <?php
                                include_once 'funtion/funcDateThai.php';
                                $strsql = "SELECT * FROM relations_act";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    ?>
                                <tr>
                                        <td align='center'><?= $row_no ?></td>
                                        <td align='center'><?= $rs['topic']; ?></td>
                                        <td align='center'><?= $rs['descrip']; ?></td>
                                        <td align='center'><img src="post/<?= $rs['image']; ?>" width="100px"></td>
                                        <td align='center'><?= DateThai1($rs['date']) ?></td>
                                        <td align='center'><a href='update_new.php' title="เพิ่มกิจกรรม"><img src="images/save.ico" width="40" height="45"></a></td>
                                        <td align='center'><a href='update_new.php?rela_id=<?= $rs['rela_id'] ?>&method=edit' title="แก้ไขกิจกรรม"><img src="images/din.png" width="35" height="35"></a></td>
                                        <td align='center'><a href='table.php?act_id=<?= $rs['act_id']; ?>&method=delete' onclick="return confirm('คุณต้องการลบ?')" title="ลบกิจกรรม"><img src="images/2.png" width="35" height="35"></a></td>
                                </tr>
                                <?php } ?>
                        </table>
                    </div>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
    <?php include_once 'footer.php'; ?>