<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container">     
    <header>
        <h2>โค้ดกิจกรรม</h2>
    </header>
    <div class="panel panel-primary">
        <div class="panel-heading">โค้ดกิจกรรม</div>
        <div class="panel-body">
            <div class="alert alert-success col-lg-12">
                <!-- Table -->

                <div class="table-wrapper">
                    <table>

                        <?php
                        $act_id = $_GET['act_id'];
                        $strsql = "SELECT act_number,act_id,act_datestart FROM activity
WHERE act_id=$act_id";
                        $result = mysqli_query($conn, $strsql);
                        $rs1 = mysqli_fetch_array($result);
                        $a = 0;
                        $i = 0;
                        $random;
                        $c = $rs1['act_id'];
                        $b = $rs1['act_number'];
                        $number = 1;
                        /*
                          $a คือ
                          $i คือ
                          $random คือ
                          $c คือ รหัสกิจกรรม
                          $b คือ อะไร จำนวนนักศึกษา
                         */
                        echo "รหัสกิจกรรม : " . $c . "<br>";
                        echo "จำนวนนักศึกษา : " . $b . "<br>";
                        ?>
                        <tr>
                            <td align='center'>ลำดับ</td>
                            <td align='center'>โค้ดกิจกรรม</td>
                        </tr>
                        <?php
                        $arr = array();
                        $strsql = "select act_id FROM code_activity where act_id=$c limit 1";
                        $result = mysqli_query($conn, $strsql);
                        $rs = mysqli_fetch_array($result);
                        if (count($rs) == 0) {
                            for ($i = 0; $i < $b; $i++) {
                                $random = $c . rand(10000, 99999);
                                echo "<tr>";
                                echo "<td align='center'>" . $number . "</td>";
                                echo "<td align='center'>" . $random . "</td>";
                                echo "</tr>";
                                array_push($arr, $random);
                                $number++;
                            }
                            $values = '';
                            foreach ($arr as $key => $as) {
                                if ($key != 0) {
                                    $values .= ', ';
                                }
                                $values .= "('" . $as . "',$c,0,'" . $rs1['act_datestart'] . "')";
                            }
                            $sql = mysqli_query($conn, "insert into code_activity (gencode,act_id,checkcode,gen_date) VALUES $values");
                            if (!$sql) {
                                echo "Update not complate ERROR : " . mysqli_error($conn) . "";
                            } else {
                                ?>
                                <script type="text/javascript">alert('Insert complate!!!');</script>
                            <?php
                            }
                        } else {
                            echo 'กิจกรรมนี้สร้างโค้ดไปแล้ว';
                            echo "<META HTTP-EQUIV='Refresh' CONTENT='2;URL=table.php'>";
                        }
                        ?>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<div align='center'><a href='code.php?act_id=<?=$c?>' class="btn btn-primary" target="_blank">พิมพ์โค้ดกิจกรรม</a></div>
<?php include_once 'footer.php'; ?>
