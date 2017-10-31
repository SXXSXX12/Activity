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
            <?php require_once ('mpdf60/mpdf.php');//ที่อยู่ของไฟล์ mpdf.phpในเครื่องเรา
             ob_start();//ทำการเก็บค่า html
             ?>
<table border="0" width="700">
    
<?php include_once 'funtion/funcDateThai.php';
             $act_id = $_GET['act_id'];
             $strsql1 = "SELECT h.his_id
FROM history_act h
INNER JOIN activity a ON a.act_id=h.act_id
WHERE a.act_id=$act_id and h.status_regis=2"; 
             $result1 = mysqli_query($conn, $strsql1);
             while ($rs1 = mysqli_fetch_array($result1)) {
                 $his_id[] = $rs1['his_id'];
}
$count = ceil(count($his_id)/2);
$I=0;
for($i=1;$i<=$count;$i++){
echo "<tr>";

for ($ii=0;$ii<=1;$ii++) {
                               
             $strsql = "SELECT c.gencode,a.act_name,a.act_datestart,a.act_location
,CONCAT(s.fname,' ',s.lname)fullname ,s.std_code
,CONCAT(t.teach_name,' ',t.teach_lname)tname,a.act_hour
FROM history_act h
INNER JOIN code_activity c ON c.code_id=h.code_id
INNER JOIN activity a ON a.act_id=h.act_id
INNER JOIN student s ON s.std_code=h.std_code
INNER JOIN teacher t ON t.teach_id=a.respon
WHERE h.his_id=$his_id[$I]"; 
             $result = mysqli_query($conn, $strsql);
             $rs = mysqli_fetch_array($result);

?>
<td width="350">
<table border='1' width='350'>
        <tr>
            <td>
                <table border='0' style="background-image: url('images/logo.jpg');" Cellpadding ='5' width='350'>
                  <tr>
                      <td style="text-align: center"><h3><?php echo "รหัสกิจกรรม ". $rs ['gencode']?></h3></td>
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
    </td>
<?php   
if($I == (count($his_id)-1)){
    break;
}
$I++;
     }
echo "</tr>"; }?>
   </table>
            <?php
$html = ob_get_contents();
ob_clean();
$pdf = new mPDF('tha2','A4','8','');
$pdf->autoScriptToLang = true;
$pdf->autoLangToFont = true;
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output("MyPDF/Act_card.pdf");
echo "<meta http-equiv='refresh' content='0;url=MyPDF/Act_card.pdf' />";
?>
</body>
    </html>


