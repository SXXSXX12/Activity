<?php
include_once 'header.php';
if (isset($_GET['method'])) {
    $method = $_GET['method'];
    $act_id = $_GET['act_id'];
    $strsql = "SELECT * FROM activity WHERE act_id=$act_id";
    $result = mysqli_query($conn, $strsql);
    $rs = mysqli_fetch_array($result);
}
?>


<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>เพิ่มข้อมูลกิจกรรม<h2>
                </header>
                <div class="row">
                    <div class="12u">
                        <form name="update" method="POST" action="add_activity.php">
                            <div class="alert alert-info">
                                <div class="row uniform 50%">
                                    <div class="12u )">
                                        <h3>ชื่อกิจกรรม</h3>
                                        <input type="text" name="act_name" required value="<?= isset($_GET['method']) ? $rs['act_name'] : '' ?>" required />
                                    </div>
                                    <div class="12u">
                                        <h3>วันที่จัดกิจกรรม</h3>
                                        <div class="col-md-6" style="padding:0;padding-right: 10px;" required>

                                            วันเริ่มกิจกรรม <input readonly  type="text" id="dateStart" name="dateStart" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_datestart'] : '' ?>" required>
                                        </div>
                                        <div class="col-md-6" style="padding:0;padding-left: 10px;">
                                            วันสิ้นสุดกิจกรรม   <input readonly  type="text" id="dateStart" name="dateEnd" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_dateend'] : '' ?>" required> 
                                        </div>

                                        <script>
                                            $('.datepicker').datepicker({
                                                format: 'yyyy/mm/dd',
                                                autoclose: true,
                                            });


                                        </script>							   
                                    </div>
                                </div>
                                <div class="row uniform 50%">
                                    <div class="12u ">
                                        <h3>จำนวนชั่วโมงกิจกรรม</h3>
                                        <input type="text" name="hour" required value="<?= isset($_GET['method']) ? $rs['act_hour'] : '' ?>" required onkeyup="javascript:inputDigits(this);"/>
                                    </div>
                                </div>
                                <div class="row uniform 50%">
                                    <div class="12u">
                                        <h3>จำนวนนักศึกษาที่เข้าร่วม/คน</h3>
                                        <input type="text"  name="group" required value="<?= isset($_GET['method']) ? $rs['act_number'] : '' ?>" required onkeyup="javascript:inputDigits(this);"/>	
                                    </div>
                                    <div class="row uniform 50%">
                                        <h3>เวลาที่จัดกิจกรรม</h3>
                                        <div class="6u ">
                                            <select name ="take_hour" id="take_hour" value="<?= isset($_GET['method']) ? $rs['start_time'] : '' ?>" required>
                                                <option value="">ชั่วโมง</option>
                                                <?php
                                                for ($i = 0; $i <= 23; $i++) {
                                                    if ($i == substr($rs['start_time'], 0, 2)) {
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
                                        </div>
                                        <div class="6u ">
                                            <select name ="take_minute" id="take_minute">
                                                <option value="">นาที</option>
                                                <?php
                                                for ($i = 0; $i <= 59; $i++) {
                                                    if ($i == substr(isset($_GET['method']) ? $rs['start_time'] : '', 3, 2)) {
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
                                        </div>
                                    </div>
                                    <div class="row uniform 50%">
                                        <div class="12u ">
                                            <h3>สถานที่จัดกิจกรรม</h3>
                                            <input type="text" name="location" required value="<?= isset($_GET['method']) ? $rs['act_location'] : '' ?>" required/>
                                        </div>
                                        <div class="row uniform 50%"><br>
                                            <div class="12u">
                                                <h3>ชั้นปี</h3><br>
                                                <div class="row uniform 50%">
                                                    <div class="12u 12u(narrower)">
<?php
$ind = 11;
for ($i = 1; $i <= 4; $i++) {
    if (isset($_GET['method']) ? $rs[$ind] : '' == 1) {
        $check = "name='year" . $i . "' checked";
    } else {
        $check = "name='year" . $i . "'";
    }
    ?>
                                                            <input type="checkbox" id="year<?= $i ?>" <?= $check ?> value="1">
                                                            <label for="year<?= $i ?>">ปี<?= $i ?></label>
                                                        <?php $ind++;
                                                    } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row uniform 50%">

                                            <div class="12u">
                                                <h3>อาจารย์ผู้รับผิดชอบ</h3>
                                                <select name='teacher' required>
                                                    <option value=''>เลือกอาจารย์ที่รับผิดชอบ</option>
                                                    <?php
                                                    $sql = mysqli_query($conn, "SELECT teach_id,CONCAT(teach_name,' ',teach_lname) as fullname FROM teacher ORDER BY fullname ASC");
                                                    while ($teach = mysqli_fetch_assoc($sql)) {
                                                        if ($teach['teach_id'] == $rs['respon']) {
                                                            $select = 'selected';
                                                        } else {
                                                            $select = '';
                                                        }
                                                        echo "<option value='" . $teach['teach_id'] . "' " . $select . ">" . $teach['fullname'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="row uniform 50%"><br>
                                                <div class="12u">
<?php
if (isset($_GET['method']) ? $_GET['method'] : '' == 'edit') {
    echo "<input type='hidden' name='method' value='edit'>";
    echo "<input type='hidden' name='act_id' value='" . $act_id . "'>";
    echo "<input type='submit' name='submit' value='แก้ไข'>";
} else {
    ?>
                                                        <input type="submit" name="submit" value=" บันทึก "/>
                                                        <input type="reset" name="reset" class="special" value="ยกเลิก"/>

<?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>
                </div>
                </section>
                <!-- Footer -->
<?php include_once 'footer.php'; ?>
