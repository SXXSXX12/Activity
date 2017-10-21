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
                <form class="navbar-form navbar-right" action="" method="POST">
                    <div class="form-group">
                        <div class="col-md-3" style="padding:0;padding-left: 10px;">
                            วันเริ่มกิจกรรม <input readonly  type="text" id="dateStart" name="dateStart" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_datestart'] : '' ?>">
                        </div>
                        <div class="col-md-3" style="padding:0;padding-left: 10px;">
                            วันสิ้นสุดกิจกรรม   <input readonly  type="text" id="dateStart" name="dateEnd" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_dateend'] : '' ?>"> 
                        </div>

                        <script>
                            $('.datepicker').datepicker({
                                format: 'yyyy/mm/dd',
                                autoclose: true,
                            });
                        </script>
                        <div class="col-lg-4">ค้นหารหัส 
                            <select name="year">
                                <option value="">กรุณาเลือกรหัส</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                            </select><br/>
                            <input type="hidden" name="method" value="search">
                           <input type="submit" value=" ค้นหา"> 
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['method']) and $_POST['dateStart'] !=''and $_POST['dateEnd'] !='' and $_POST['year']!='' ){
                    include_once 'funtion/funcDateThai.php';
                $dateStart=$_POST['dateStart'];
                $dateEnd =$_POST['dateEnd'];
                $year =$_POST['year'];
                $code = "WHERE (a.act_datestart BETWEEN '$dateStart' AND '$dateEnd') AND (a.act_dateend BETWEEN '$dateStart' AND '$dateEnd')
AND (a.year1='$year' OR a.year2='$year' OR a.year3='$year' OR a.year4='$year')";
                echo "วันที่เริ่มต้น :".DateThai1($dateStart). "<br><br>";
                echo "วันที่สิ้นสุด :".DateThai1($dateEnd)."<br><br>";
                echo "รหัส :".$year;
                } else {
                $code ="";    
                }
                $strsql = "SELECT a.act_id, a.act_name, a.act_datestart, a.act_dateend, a.start_time, a.act_hour, a.act_location,
                CONCAT(t.teach_name, t.teach_lname) AS respon_name
                FROM activity a
                INNER JOIN teacher t ON t.teach_id = a.respon 
                $code
                ORDER BY a.act_id DESC";
                    $result = mysqli_query($conn, $strsql);
                
                ?>
            </div><p>
            <div class="alert alert-success col-lg-12">
                <table width='100%' align='center'>
                    <tr>
                        <td align='center'>ลำดับ</td>
                        <td align='center'>ชื่อกิจกรรม</td>
                        <td align='center'>วันเริ่มกิจกรรม</td>
                        <td align='center'>วันที่สิ้นสุดกิจกรรม</td>
                        <td align='center'>อาจารย์ที่รับผิดชอบ</td>
                        <td align='center'>รายละเอียดการเข้ากิจกรรม</td>
                    </tr>
                    <?php
                    
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($result)) {
                        $row_no++;
                        ?>
                        <tr>
                            <td align='center'><?= $row_no ?></td>
                            <td align='center'><?php echo $rs['act_name']; ?></td>
                            <td align='center'><?php echo $rs['act_datestart']; ?></td>
                            <td align='center'><?php echo $rs['act_dateend']; ?></td>
                            <td align='center'><?php echo $rs['respon_name']; ?></td>
                            <td align='center'><a href='report_act1.php?act_id=<?= $rs['act_id']?>&year=<?= isset($year)?$year:''?>' title="ดูรายละเอียด"><img src="images/do.png" width="35" height="35"></a></td>

                        </tr>
                    <?php } ?>


                </table>
            </div>
        </div>
    </div>


</section>

<?php include_once 'footer.php'; ?>