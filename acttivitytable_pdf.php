<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>ตารางกิจกรรม</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <div class="row uniform 1000%">
                             <?php require_once ('mpdf60/mpdf.php');//ที่อยู่ของไฟล์ mpdf.phpในเครื่องเรา
             ob_start();//ทำการเก็บค่า html
             ?>
                            <table width='600' align='center'>
                                <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>ชื่อกิจกรรม</td>
                                    <td align='center'>เวลาที่เริ่มกิจกรรม</td>
                                    <td align='center'>สถานที่</td>
                                    <td align='center'>วันเริ่มจัดโครงการ</td>
                                    <td align='center'>วันสิ้นสุดโครงการ</td>

                                </tr>
                                <?php
                                include_once 'config/config.php';
                                include_once 'funtion/funcDateThai.php';
                                if (isset($_GET['method'])) {
                                    //$method = $_GET['method'];
                                    $act_id = $_GET['act_id'];
                                    $strsql = "delete FROM activity WHERE act_id=$act_id";
                                    $result = mysqli_query($conn, $strsql) or die(mysqli_error($conn));
                                }
                                $strsql = "SELECT * FROM activity ORDER BY act_id DESC";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    ?>
                                    <tr>
                                        <td align='center'><?= $row_no ?></td>
                                        <td align='center'><?php echo $rs['act_name']; ?></td>
                                        <td align='center'><?php echo $rs['start_time']; ?></td>
                                        <td align='center'><?php echo $rs['act_location']; ?></td>
                                        <td align='center'><?= DateThai1($rs['act_datestart']) ?></td>
                                        <td align='center'><?= DateThai1($rs['act_dateend']) ?></td>
                                    </tr>		
                                <?php } ?>
                            </table>
                            <?php
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('tha2','A4','10','');
$pdf->autoScriptToLang = true;
$pdf->autoLangToFont = true;
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/acttivity_table.pdf");
echo "<meta http-equiv='refresh' content='0;url=MyPDF/acttivity_table.pdf' />";
?>
                         </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>