<?php
include_once 'header.php';
$act_id = $_GET['act_id'];

$strsql = "SELECT c.*,a.act_name FROM code_activity c inner join activity a on a.act_id=c.act_id where c.act_id='$act_id' ORDER BY code_id DESC";
$result = mysqli_query($conn, $strsql);
$rs = mysqli_fetch_assoc($result);
?>
<section id="main" class="container">
    <header>
        <h2>โค้ดกิจกรรม <?= $rs['act_name'] ?></h2>
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
                                    <td align='center'>โค้ดกิจกรรม</td>
                                    <td align='center'>สถานะ</td>
                                    <td align='center'>วันสุดท้ายการใช้โค้ด</td>

                                </tr>
                                <?php
                                include_once 'funtion/funcDateThai.php';

                                $row_no = 0;
                                while ($rs2 = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    $gen_date = $rs2['gen_date'];
                                    ?>
                                    <tr>
                                        <td align='center'><?= $row_no ?></td>
                                        <td align='center'><?= $rs2['gencode'] ?></td>
                                        <?php if (empty($rs2['std_code'])) { ?>   
                                            <td align='center'><i class="fa fa-remove"></i></td>
                                            <?php } else { ?>
                                            <td align='center'><?= $rs2['std_code'] ?></td>
                                        <?php } ?>
                                        <td align='center'><?= DateThai2(date('Y-m-d', strtotime("$gen_date+14 days "))) ?></td>

                                    </tr>
                                <?php } ?>
                            </table>
                        </div> 
                        
                </div>
        </div>
</section>

<?php include_once 'footer.php'; ?>