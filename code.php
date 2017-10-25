<?php
include_once 'header.php';
$act_id = $_GET['act_id'];

$strsql = "SELECT c.*,a.act_name FROM code_activity c inner join activity a on a.act_id=c.act_id where c.act_id='$act_id' ORDER BY code_id DESC";
$result = mysqli_query($conn, $strsql);
$rs = mysqli_fetch_assoc($result);
require_once ('mpdf60/mpdf.php');//ที่อยู่ของไฟล์ mpdf.phpในเครื่องเรา
             ob_start();
?>
<h2>โค้ดกิจกรรม <?= $rs['act_name'] ?></h2>
    <div class="row">
             <!-- Table -->
                              <table width='600' align='center' border="1">

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
                                            <td align='center'>X</td>
                                            <?php } else { ?>
                                            <td align='center'><?= $rs2['std_code'] ?></td>
                                        <?php } ?>
                                        <td align='center'><?= DateThai2(date('Y-m-d', strtotime("$gen_date+14 days "))) ?></td>

                                    </tr>
                                <?php } ?>
                            </table>
        </div>

<?php
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('tha2','A4','10','');
$pdf->autoScriptToLang = true;
$pdf->autoLangToFont = true;
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/codeactivity.pdf");
echo "<meta http-equiv='refresh' content='0;url=MyPDF/codeactivity.pdf' />";
?>

<?php include_once 'footer.php'; ?>