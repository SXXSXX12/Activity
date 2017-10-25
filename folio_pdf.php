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
            $std_code=$_GET['std_code'];
             //$hit_id = $_GET['his_id'];
             $strsql = "SELECT CONCAT((CASE pname
    WHEN 1 THEN 'นาย'
    WHEN 2 THEN 'นางสาว'
ELSE 'ไม่มีสถานะ' END),fname,' ',lname) as fullname ,dateofbirth,address,phone,email,image
FROM student 
WHERE std_code ='$std_code'"; 
             $result = mysqli_query($conn, $strsql);
             $rs = mysqli_fetch_array($result);
             
             $strsql1 = "SELECT projectname,portfolio,portyear
FROM portfolio
WHERE std_code ='$std_code'"; 
             $resul1 = mysqli_query($conn, $strsql1);
             $strsql2 = "SELECT e1.educate_name,e.endyear,e.major,e.intiute
FROM education e
INNER JOIN educate e1 ON e1.educate_id=e.edu_level
WHERE e.std_code ='$std_code'"; 
             $result2 = mysqli_query($conn, $strsql2);
             require_once ('mpdf60/mpdf.php');//ที่อยู่ของไฟล์ mpdf.phpในเครื่องเรา
             ob_start();//ทำการเก็บค่า html
             ?>
                   <table border='0' Cellpadding ='5'>
                  <tr>
                      <td style="text-align: center" rowspan="5"><img src="photo/<?=$rs['image'] ?>" width="100"></td>
                      <td>ชื่อ : <?=$rs['fullname'] ?></td>
                  </tr>
                  <tr>
                      <td>วันเดือนปีเกิด : <?= DateThai2($rs['dateofbirth']) ?></td>
                  </tr>
                  <tr>
                    <td>ที่อยู่ : <?=$rs['address'] ?></td>
                  </tr>  
                  <tr>
                      <td>เบอร์โทรศัพท์ : <?=$rs['phone'] ?></td>
                  </tr> 
                  <tr>
                      <td>อีเมล : <?=$rs['email'] ?></td>
                  </tr>
                 
                </table>
            <hr>
            <?php
             while ($row = mysqli_fetch_array($resul1)) {
            ?>
            <div> ชื่อผลงาน : <?=$row['projectname']?></div>
            <div> ปีที่ทำผลงาน : <?=$row['portyear']?></div>
            <div> รายละเอียดผลงาน : <?=$row['portfolio']?></div>
            <hr>
             <?php }?>
            <?php
             while ($row1 = mysqli_fetch_array($result2)) {
            ?>
            <div>วุฒิการศึกษา : <?=$row1['educate_name']?></div>
            <div>สาขาที่จบการศึกษา : <?=$row1['major']?></div>
            <div>ปีที่จบ : <?=$row1['endyear']?></div>
            <div>สถานศึกษาที่จบ : <?=$row1['intiute']?></div><hr>
             <?php }?>
<?php
//$html = ob_get_contents();
//ob_clean();
//$pdf = new mPDF('tha2','A4','10','');
//$pdf->autoScriptToLang = true;
//$pdf->autoLangToFont = true;
//$pdf->SetDisplayMode('fullpage');
//$pdf->WriteHTML($html, 2);
//$pdf->Output("MyPDF/Act_card.pdf");
//echo "<meta http-equiv='refresh' content='0;url=MyPDF/Act_card.pdf' />";
?>
    </body>
    </html>