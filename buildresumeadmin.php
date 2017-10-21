<?php include_once 'header.php'; ?>
<br>
<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>สร้างประวัติส่วนตัว</h2>
    </header>
    <div class="row">
        <div class="12u">
            <div class="well well-lg">
                <div id="loginbox">
                    <?php
                    $std_code = $_GET['std_code'];
                    if (isset($_GET['method']) ? $_GET['method'] : '' == 'edit') {
                        $edu_id = $_GET['edu_id'];
                        $code1 = ", e.*";
                        $code2 = "INNER JOIN education e ON e.std_code=s.std_code";
                        $code3 = "AND e.edu_id=$edu_id";
                    } else {
                        $code1 = "";
                        $code2 = "";
                        $code3 = "";
                    }
                    $strsql = "SELECT s.*$code1
                    FROM student s 
                    $code2
                    WHERE s.std_code='$std_code' $code3";
                    $result = mysqli_query($conn, $strsql);
                    $rs = mysqli_fetch_array($result);

                    include_once 'funtion/funcDateThai.php';
                    echo "<h4>ชื่อ นามสกุล : " . $rs ['fname'] . " " . $rs ['lname'] . "<br><br>";
                    echo "รหัสนักศึกษา :" . $rs['std_code'] . "<br><br>";
                    echo "วันเดือนปีเกิด :" . DateThai2($rs['dateofbirth']) . "<br><br>";
                    echo "ที่อยู่:" . $rs['address'] . "<br><br>";
                    echo "เบอร์โทร:" . $rs['phone'] . "<br><br>";
                    echo "อีเมล์:" . $rs['email'] . "<br><br>";
                    ?>
                    <form name="form1" method="POST" action="addresume.php">
                        วุฒิการศึกษา<br>
                        <select name='educate' required>
                            <option value=''>วุฒิการศึกษา</option>
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM educate ");
                            while ($edu = mysqli_fetch_assoc($sql)) {
                                if ($edu['educate_id'] == $rs['edu_level']) {
                                    $select = 'selected';
                                } else {
                                    $select = '';
                                }
                                echo "<option value='" . $edu['educate_id'] . "'" . $select . ">" . $edu['educate_name'] . "</option>";
                            }
                            ?>
                        </select><br/>
                        สาขา <input type="text" name="major" value="<?= isset($_GET['method']) ? $rs['major'] : '' ?>" required /><br/>
                        สถาบันที่จบการศึกษา <input type="text" name="intiute" value="<?= isset($_GET['method']) ? $rs['intiute'] : '' ?>" required/><br />
                        ปีที่จบ (พ.ศ.)<br/>
                        <div class="6u ">
                            <select name ="endyear" id="endyearr" value="<?= isset($_GET['method']) ? $rs['endyear'] : '' ?>" required>
                                <option value="">ปีที่จบ</option>
                                <?php
                                for ($i = 2530; $i <= 2560; $i++) {
                                    if ($i == $rs['endyear']) {
                                        $select = 'selected';
                                    } else {
                                        $select = '';
                                    }
                                    if ($i < 10) {
                                        echo "<option value='0" . $i . "'" . $select . ">0" . $i . "</option>";
                                    } else {
                                        echo "<option value='" . $i . "'" . $select . ">" . $i . "</option>";
                                    }
                                }
                                ?>
                                         </select>

                        </div><br>
<?php
if (isset($_GET['method']) ? $_GET['method'] : '' == 'edit') {
    echo "<input type='hidden' name='method' value='edit'>";
    echo "<input type='hidden' name='edu_id' value='" . $edu_id . "'>";
    echo "<input type='hidden' name='std_code' value='" . $std_code . "'>";
    echo "<input type='submit' name='submit' value='แก้ไข'>";
} else {
    ?>
                            <input type="hidden" name="std_code" value="<?= $std_code ?>">
                            <input type="submit" value=" บันทึก " />
                            <input type="submit" value=" ยกเลิก " class="special"/>
<?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>