<?php include_once 'header.php'; ?>
<section id="main" class="container">
    <header>
        <h2>รายงานการเข้ากิจกรรม</h2>
    </header>

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">รายงานการเข้ากิจกรรม</div>
        <div class="panel-body">
            <div class="alert alert-success col-lg-12">
                <?php
                include_once 'funtion/funcDateThai.php';
                $act_id = $_GET['act_id'];
                if (empty($_GET['year'])) {
                    $code = '';
                } else {
                    $year = $_GET['year'];
                    $code = "AND SUBSTR(h.std_code,1,2)='$year'";
                }
                $strsql = "SELECT * FROM activity where act_id=$act_id";
                $result = mysqli_query($conn, $strsql);
                $rs = mysqli_fetch_array($result);
                echo "ชื่อกิจกรรม :" . $rs['act_name'] . "<br>";
                echo "จำนวนกลุ่มเป้าหมาย :" . $rs['act_number'] . "<br>";
                echo "วันที่เริ่ม :" . DateThai1($rs['act_datestart']) . "<br>";
                echo "วันที่สิ้นสุด :" . DateThai1($rs['act_dateend']) . "<br>";

                $sqlstr = "SELECT s.std_code,CONCAT(s.fname,' ',s.lname) AS fullname
                FROM history_act h
                INNER JOIN activity a ON a.act_id=h.act_id
                INNER JOIN student s ON s.std_code=h.std_code
                WHERE h.status_regis=2 
                $code 
                AND a.act_id='$act_id'";
                $sumq = "SELECT 
SUM(CASE sex
WHEN '1' THEN 1
WHEN '2' THEN 0
ELSE NULL END) AS men,
SUM(CASE sex
WHEN '1' THEN 0
WHEN '2' THEN 1
ELSE NULL END) AS women,
AVG(q1) AS q1,AVG(q2) AS q2,AVG(q3) AS q3,AVG(q4) AS q4,AVG(q5) AS q5,
AVG(q6) AS q6,AVG(q7) AS q7,AVG(q8) AS q8,AVG(q9) AS q9,AVG(q10) AS q10
FROM question
WHERE act_id=$act_id";
                $result3 = mysqli_query($conn, $sumq);
                $rs1 = mysqli_fetch_array($result3);
                $result2 = mysqli_query($conn, $sqlstr);
                $num_row = mysqli_num_rows($result2);
                $sd ="SELECT 
SQRT(((COUNT(*)*SUM(POW(q1,2))-POW(SUM(q1),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq1
,SQRT(((COUNT(*)*SUM(POW(q2,2))-POW(SUM(q2),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq2
,SQRT(((COUNT(*)*SUM(POW(q3,2))-POW(SUM(q3),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq3
,SQRT(((COUNT(*)*SUM(POW(q4,2))-POW(SUM(q4),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq4
,SQRT(((COUNT(*)*SUM(POW(q5,2))-POW(SUM(q5),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq5
,SQRT(((COUNT(*)*SUM(POW(q6,2))-POW(SUM(q6),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq6
,SQRT(((COUNT(*)*SUM(POW(q7,2))-POW(SUM(q7),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq7
,SQRT(((COUNT(*)*SUM(POW(q8,2))-POW(SUM(q8),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq8
,SQRT(((COUNT(*)*SUM(POW(q9,2))-POW(SUM(q9),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq9
,SQRT(((COUNT(*)*SUM(POW(q10,2))-POW(SUM(q10),2))/(COUNT(*)*(COUNT(*)-1)))) AS SDq10
FROM question 
WHERE act_id = $act_id
GROUP BY act_id";
                $result4 = mysqli_query($conn, $sd);
                $rs2 = mysqli_fetch_array($result4);   
                echo "มีนักศึกษาเข้าร่วมกิจกรรมจำนวน " . $num_row . " คน คิดเป็น " . round(($num_row * 100) / $rs['act_number'], 3) . "%";
                ?>
                <table width='100%' align='center'>
                    <tr>
                        <td align='center'>ลำดับ</td>
                        <td align='center'>รหัสนักศึกษา</td>
                        <td align='center'>ชื่อ-สกุล</td>
                        <td align='center'>รายละเอียดการเข้ากิจกรรม</td>
                    </tr>
                    <?php
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($result2)) {
                        $row_no++;
                        ?>
                        <tr>
                            <td align='center'><?= $row_no ?></td>
                            <td align='center'><?php echo $rs['std_code']; ?></td>
                            <td align='center'><?php echo $rs['fullname']; ?></td>
                            <td align='center'><a href='reportstd_act_aj.php?std_code=<?= $rs['std_code'] ?>' class='button'>รายละเอียด</a></td>
                        </tr>
                    <?php } ?>


                </table>
            </div>
            <div>
                <a class="btn btn-success" download="แบบประเมิน.xls" href="#" onClick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><i class="fa fa-print"></i> Export to Excel</a>
                <br><br>
            <table  id="datatable" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
            <div class="alert alert-success col-lg-12">
             <h3>รายงานผลแบบประเมินการเข้าร่วม</h3>
             <table width='100%'>
                 <tr>
                        <th align='center'><h4>รายการ</h4> </th>
                        <th align='center'><h4>ความถี่</h4></th>
                        <th align='center'><h4>เปอร์เซ็น</h4></th>
                    </tr> 
                    <tr>
                         <td align='center'>เพศชาย</td>
                         <td align='center'><?php echo $rs1['men']; ?></td>
                         <td align='center'><?php echo !empty($rs1['men'])?($rs1['men']*100)/($rs1['men']+$rs1['women']):''; ?></td>
                    </tr>
                    <tr>
                        <td align='center'>เพศหญิง</td>
                        <td align='center'><?php echo $rs1['women']; ?></td>
                        <td align='center'><?php echo !empty($rs1['women'])?($rs1['women']*100)/($rs1['men']+$rs1['women']):''; ?></td>
                    </tr>
                      <tr>
                        <td align='center'>รวม</td>
                        <td align='center'><?php echo $rs1['women']+$rs1['men']; ?></td>
                        <td align='center'><?php echo !empty($rs1['women']+$rs1['men'])?($rs1['women']*100)/($rs1['men']+$rs1['women'])+($rs1['men']*100)/($rs1['men']+$rs1['women']):''; ?></td>
                    </tr>
            </table>
             
             </div>
            <div class="alert alert-success col-lg-12">
                <h3>รายงานผลแบบประเมิน</h3>
                <table width='100%'>
                    <tr bgcolor="pink">

                        <th align='center' rowspan="2"><h4>รายการ</h4></th>
                        <th align='center' colspan="3"><h4>ผลการประเมิน</h4></th>
                        <th align='center' rowspan="2"><h4>ผลการประเมิน</h4></th>
                    </tr> 
                    <tr bgcolor="pink">
                        <th align='center'>X</th>
                        <th align='center'>S.D</th>
                        <th align='center'>ค่าร้อยละ</th>
                    </tr>
                    <tr>
                        <td align='left'colspan="5"><h4><b>ด้านความพึงพอใจในการเข้าร่วมโครงการ</b></h4></td>
                    </tr>
                    <tr>
                        <td align='left'>1 การประชาสัมพันธ์ข่าวสาร</td>
                        <?php $avgq1=round($rs1['q1'],2);?>
                        <td align='center'><?= $avgq1 ?></td>
                        <td align='center'><?= round ($rs2['SDq1'],2); ?></td>
                        <td align='center'><?= ($avgq1*100)/5 ?></td>
                        <td align='center'><?php if ($avgq1<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq1<=2 and $avgq1<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq1<=3 and $avgq1<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq1<=4 and $avgq1<=4.50) {echo 'มาก';}
                                                 elseif ($avgq1<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr>
                    <tr>
                        <td align='left'>2 สถานที่ในการจัดโครงการ</td>
                        <?php $avgq2=round($rs1['q2'],2);?>
                        <td align='center'><?= $avgq2?></td>
                        <td align='center'><?= round ($rs2['SDq2'],2); ?></td>
                        <td align='center'><?= ($avgq2*100)/5 ?></td>
                        <td align='center'><?php if ($avgq2<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq2<=2 and $avgq2<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq2<=3 and $avgq2<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq2<=4 and $avgq2<=4.50) {echo 'มาก';}
                                                 elseif ($avgq2<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr>  
                    <tr>
                        <td align='left'>3ระยะเวลาในการดำเนินโครงการ</td>
                        <?php $avgq3=round($rs1['q3'],2);?>
                        <td align='center'><?= $avgq3 ?></td>
                        <td align='center'><?= round ($rs2['SDq3'],2); ?></td>
                        <td align='center'><?= ($avgq3*100)/5 ?></td>
                        <td align='center'><?php if ($avgq3<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq3<=2 and $avgq3<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq3<=3 and $avgq3<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq3<=4 and $avgq3<=4.50) {echo 'มาก';}
                                                 elseif ($avgq3<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr>  
                    <tr>
                        <td align='left'>4 การลงทะเบียน</td>
                        <?php $avgq4=round($rs1['q4'],2);?>
                        <td align='center'><?= $avgq4?></td>
                        <td align='center'><?= round ($rs2['SDq4'],2); ?></td>
                        <td align='center'><?= ($avgq4*100)/5 ?></td>
                        <td align='center'><?php if ($avgq4<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq4<=2 and $avgq4<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq4<=3 and $avgq4<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq4<=4 and $avgq4<=4.50) {echo 'มาก';}
                                                 elseif ($avgq4<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 
                    <tr>
                        <td align='left'>5 การจัดบริการอาหาร/อาหารว่าง</td>
                        <?php $avgq5=round($rs1['q5'],2);?>
                        <td align='center'><?= $avgq5 ?></td>
                        <td align='center'><?= round ($rs2['SDq5'],2); ?></td>
                        <td align='center'><?= ($avgq5*100)/5 ?></td>
                        <td align='center'><?php if ($avgq5<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq5<=2 and $avgq5<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq5<=3 and $avgq5<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq5<=4 and $avgq5<=4.50) {echo 'มาก';}
                                                 elseif ($avgq5<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 
                    <tr>
                        <td align='left' colspan="5"><h4><b>ด้านการนำความรู้ที่ได้ไปใช้ประโยชน์</b></h4></td>
                    </tr> 
                    <tr>
                        <td align='left'>6 สามารถนำความรู้ที่ได้กลับไปประยุกต์ใช้งานได้จริง</td>
                        <?php $avgq6=round($rs1['q6'],2);?>
                        <td align='center'><?=$avgq6?></td>
                        <td align='center'><?= round ($rs2['SDq6'],2); ?></td>
                        <td align='center'><?= ($avgq6*100)/5 ?></td>
                        <td align='center'><?php if ($avgq6<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq6<=2 and $avgq6<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq6<=3 and $avgq6<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq6<=4 and $avgq6<=4.50) {echo 'มาก';}
                                                 elseif ($avgq6<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 
                    <tr>
                        <td align='left'>7 สามารถกลับไปพัฒนาต่อยอดความรู้เดิมที่มีอยู่ได้</td>
                        <?php $avgq7=round($rs1['q7'],2);?>
                        <td align='center'><?= $avgq7?></td>
                        <td align='center'><?= round ($rs2['SDq7'],2); ?></td>
                        <td align='center'><?= ($avgq7*100)/5 ?></td>
                        <td align='center'><?php if ($avgq7<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq7<=2 and $avgq7<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq7<=3 and $avgq7<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq7<=4 and $avgq7<=4.50) {echo 'มาก';}
                                                 elseif ($avgq7<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 
                    <tr>
                        <td align='left'>8 มีความมั่นใจและสามารถนำความรู้ที่ได้รับไปใช้ได้</td>
                        <?php $avgq8=round($rs1['q8'],2);?>
                        <td align='center'><?= $avgq8?></td>
                        <td align='center'><?= round ($rs2['SDq8'],2); ?></td>
                        <td align='center'><?= ($avgq8*100)/5 ?></td>
                        <td align='center'><?php if ($avgq8<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq8<=2 and $avgq8<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq8<=3 and $avgq8<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq8<=4 and $avgq8<=4.50) {echo 'มาก';}
                                                 elseif ($avgq8<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr>
                    <tr>
                        <td align='left'>9 ผู้เข้าร่วมโครงการมีความรู้เพิ่มมากขึ้น</td>
                        <?php $avgq9=round($rs1['q9'],2);?>
                        <td align='center'><?= $avgq9?></td>
                        <td align='center'><?= round ($rs2['SDq9'],2); ?></td>
                        <td align='center'><?= ($avgq9*100)/5 ?></td>
                        <td align='center'><?php if ($avgq9<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq9<=2 and $avgq9<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq9<=3 and $avgq9<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq9<=4 and $avgq9<=4.50) {echo 'มาก';}
                                                 elseif ($avgq9<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 
                    <tr>
                        <td align='left'>10 สามารถนำความรู้ที่ได้รับไปใช้งานได้จริง</td>
                        <?php $avgq10=round($rs1['q10'],2);?>
                        <td align='center'><?= $avgq10?></td>
                        <td align='center'><?= round ($rs2['SDq10'],2); ?></td>
                        <td align='center'><?= ($avgq10*100)/5 ?></td>
                        <td align='center'><?php if ($avgq10<=1.99){ echo 'น้อยที่สุด';}
                                                 elseif ($avgq10<=2 and $avgq10<=2.99) {echo 'น้อย';}
                                                 elseif ($avgq10<=3 and $avgq10<=3.99) {echo 'ปานกลาง';}
                                                 elseif ($avgq10<=4 and $avgq10<=4.50) {echo 'มาก';}
                                                 elseif ($avgq10<=5 ) {echo 'มากที่สุด';}?></td>
                    </tr> 

                </table>
            </div>
                        </td>
                    </tr>
            </table>
        </div>
            <div align='center'>
             </div>
        </div>
        </div>
    


</section>

<?php include_once 'footer.php'; ?>