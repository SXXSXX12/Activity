<?php include_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	</head>
	<body>
            <?php
            include_once 'funtion/funcDateThai.php';
             $hit_id = $_GET['his_id'];
             $strsql = "SELECT c.gencode,a.act_name,a.act_datestart,a.act_location
,CONCAT(s.fname,' ',s.lname)fullname ,s.std_code
,CONCAT(t.teach_name,' ',t.teach_lname)tname,a.act_hour
FROM history_act h
INNER JOIN code_activity c ON c.code_id=h.code_id
INNER JOIN activity a ON a.act_id=h.act_id
INNER JOIN student s ON s.std_code=h.std_code
INNER JOIN teacher t ON t.teach_id=a.respon
WHERE h.his_id=$hit_id"; 
             $result = mysqli_query($conn, $strsql);
             $rs = mysqli_fetch_array($result);
             require_once ('mpdf60/mpdf.php');//ที่อยู่ของไฟล์ mpdf.phpในเครื่องเรา
             ob_start();//ทำการเก็บค่า html
             ?>
    <table border='1' width='350px'>
        <tr>
            <td>
                <table border='0' style="background-image: url('images/logo.jpg');" Cellpadding ='5' width='350px'>
                  <tr>
                      <td style="text-align: center"><?php echo "รหัสกิจกรรม ". $rs ['gencode']?></td>
                  </tr>
                  <tr>
                      <td><?php echo "กิจกรรม ". $rs ['act_name']?></td>
                  </tr>
                  <tr>
                    <td><?php echo"สถานที่จัดกิจกรรม ".$rs ['act_location']?></td>
                  </tr>  
                  <tr>
                      <td><?php echo"วันที่จัดกิจกรรม". DateThai1($rs['act_datestart'])?></td>
                  </tr> 
                  <tr>
                      <td>สาขาวิทยาการคอมพิวเตอร์</td>
                  </tr>
                  <tr>
                    <td><?php echo"ชื่อ".$rs ['fullname'] ." รหัสนักศึกษา ".$rs ['std_code']?></td>
                  </tr> 
                  <tr>
                    <td>อาจารย์ที่รับผิดชอบ <?=$rs ['tname']?></td>
                  </tr> 
                  <tr>
                    <td><?php echo"จำนวนชั่วโมง ".$rs ['act_hour']?></td>
                  </tr> 
                    
                </table>

            </td>
        </tr>
    </table>
<?php
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('tha2','A4','10','');
$pdf->autoScriptToLang = true;
$pdf->autoLangToFont = true;
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/Act_card.pdf");
echo "<meta http-equiv='refresh' content='0;url=MyPDF/Act_card.pdf' />";
?>
    </body>
    </html>