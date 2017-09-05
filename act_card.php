<!DOCTYPE HTML>
<?php include_once 'config/config.php'; ?>
<html>
	<head>
		<title>Activity System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
            ?>
    <table border='1' width='450px'>
        <tr>
            <td>
                <table border='0' style="background-image: url('images/cf.jpg');" Cellpadding ='5' width='450px'>
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

    </body>
    </html>