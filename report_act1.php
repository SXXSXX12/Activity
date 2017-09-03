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
                $act_id=$_GET['act_id'];
                if(empty($_GET['year'])){
                    $code = '';
                } else {
                   $year=$_GET['year'];
                   $code = "AND SUBSTR(h.std_code,1,2)='$year'"; 
}            
                $strsql = "SELECT * FROM activity where act_id=$act_id";
                $result = mysqli_query($conn, $strsql);
                $rs= mysqli_fetch_array($result);
                echo "ชื่อกิจกรรม :".$rs['act_name']."<br>";
                echo "จำนวนกลุ่มเป้าหมาย :".$rs['act_number']."<br>";
                echo "วันที่เริ่ม :".DateThai1($rs['act_datestart'])."<br>";
                echo "วันที่สิ้นสุด :".DateThai1($rs['act_dateend'])."<br>";
                
                $sqlstr = "SELECT s.std_code,CONCAT(s.fname,' ',s.lname) AS fullname
                FROM history_act h
                INNER JOIN activity a ON a.act_id=h.act_id
                INNER JOIN student s ON s.std_code=h.std_code
                WHERE h.status_regis=2 
                $code 
                AND a.act_id='$act_id'";
                $result2 = mysqli_query($conn, $sqlstr);
                $num_row = mysqli_num_rows($result2);
                echo "มีนักศึกษาเข้าร่วมกิจกรรมจำนวน ".$num_row." คน คิดเป็น ". round(($num_row*100)/$rs['act_number'],3)."%";
                ?>
                <table width='100%' align='center'>
                    <tr>
                        <td align='center'>ลำดับ</td>
                        <td align='center'>รหัสนักศึกษา</td>
                        <td align='center'>ชื่อ-สกุล</td>
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
                        </tr>
                    <?php } ?>


                </table>
            </div>
        </div>
    </div>


</section>

<?php include_once 'footer.php'; ?>