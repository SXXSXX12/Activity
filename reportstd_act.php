<?php include_once 'header.php'; ?>
<section id="main" class="container">
    <header>
        <h2>รายงานการเข้ากิจกรรม</h2>
    </header>

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">รายงานการเข้ากิจกรรม</div>
        <div class="panel-body">
            <div class="alert alert-info col-lg-12">
                <form class="navbar-form navbar-left" action="" method="POST">
                    <?php
                    include_once 'funtion/funcDateThai.php';
                    $std_code = $_GET['std_code'];
                    $year = substr($std_code, 0, 2);
                    $strsql = "SELECT h.his_id,a.act_id, a.act_name, a.act_datestart, a.act_dateend, a.start_time, a.act_hour, a.act_location
FROM history_act h
INNER JOIN activity a ON a.act_id=h.act_id
INNER JOIN student s ON s.std_code=h.std_code
WHERE h.status_regis=2 AND h.std_code='$std_code'";
                    $result = mysqli_query($conn, $strsql); //queryได้เป็นobject
                    $act_join = mysqli_num_rows($result); //นับแถวobject

                    echo "ชื่อ " . $_SESSION['fullname'];

                    $strsql1 = "SELECT  COUNT(a.act_id) AS total
FROM activity a
WHERE a.year1='$year' OR a.year2='$year' OR a.year3='$year' OR a.year4='$year'";
                    $result1 = mysqli_query($conn, $strsql1);
                    $rs1 = mysqli_fetch_array($result1); //นำobjectไปใส่array
                    
                    $result2 = mysqli_query($conn, "SELECT SUM(a.act_hour) as hour_total FROM activity a INNER JOIN history_act h ON a.act_id=h.act_id WHERE h.status_regis=2 AND h.std_code='$std_code'");
                    
                    $rs2 = mysqli_fetch_array($result2); //นำobjectไปใส่array
                    if ($act_join > 0) {//ถ้านับแถวได้มากว่า0
                        $percen = round(($act_join * 100) / $rs1['total'], 3); //ทำตรงนี้
                        $join = $act_join;
                    } else {//ถ้าน้อยกว่าหรือเท่ากับ0
                        $percen = "0";
                        $join = "0";
                    }
                    echo " <br>กิจกรรมที่ต้องเข้าร่วมทั้งหมด " . $rs1['total'] . "กิจกรรม  " ;
                    echo " <br>เข้าร่วมกิจกรรม " . $join . "กิจกรรม คิดเป็น " . $percen . " %";
                    echo " <br>จำนวนชั่วโมงรวม " . $rs2 ['hour_total'] . " ชั่วโมง  " ;
                    ?>
            </div><p>
            <div class="alert alert-success col-lg-12">
                <table width='100%' align='center'>
                    <tr>
                        <td align='center'>ลำดับ</td>
                        <td align='center'>ชื่อกิจกรรม</td>
                        <td align='center'>วันเริ่มกิจกรรม</td>
                        <td align='center'>วันที่สิ้นสุดกิจกรรม</td>
                        <td align='center'>จำนวนชั่วโมง</td>
                        <td align='center'>พิมพ์บัตรกิจกรรม</td>
                    </tr>
                    <?php
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($result)) {//ใช้วนจนครบแถวในarray
                        $row_no++;
                        ?>
                        <tr>
                            <td align='center'><?= $row_no ?></td>
                            <td align='center'><?php echo $rs['act_name']; ?></td>
                            <td align='center'><?php echo $rs['act_datestart']; ?></td>
                            <td align='center'><?php echo $rs['act_dateend']; ?></td>
                            <td align='center'><?php echo $rs['act_hour']; ?></td>

                            <td align='center'><a href='act_card.php?his_id=<?= $rs['his_id'] ?>' class='#'><img src="images/printer.ico" width="35" height="35"></a></td>
                        </tr>
                    <?php } ?>


                </table>
            </div>
        </div>
    </div>


</section>

<?php include_once 'footer.php'; ?>