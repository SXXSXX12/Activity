<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container 75%">
    <form action="question.php" method="post">
         <div class="alert alert-info">

        <div id="loginbox">
            <?php
            include_once 'funtion/funcDateThai.php';
            $act_id = $_GET['act_id'];
            //$year = $_GET['year'];
            $strsql = "SELECT * FROM activity where act_id=$act_id";
            $result = mysqli_query($conn, $strsql);
            $rs = mysqli_fetch_array($result);
            echo "แบบประเมินกิจกรรม :" . $rs['act_name'] . "<br>";
            echo "วันที่เริ่ม :" . DateThai1($rs['act_datestart']) . "<br>";
            echo "วันที่สิ้นสุด :" . DateThai1($rs['act_dateend']) . "<br>";
            echo "สถานที่จัดกิจกรรม :" . $rs['act_location'] . "<br>";
            ?>
            <h4>ส่วนที่1 ข้อมูลทั่วไปของผู้ตอบแบบสอบถาม<h4><br/>
                    <h5>เพศ</h5>	
                    <?php 
                    $std_code=$_GET['std_code'];
                    $year = substr($std_code, 0, 2);
                    $nowYear = date('y')+43;
                    if($year==$nowYear){
                        $year_class = '1';
                    }elseif ($year==$nowYear-1) {
                        $year_class = '2';
                    }elseif ($year==$nowYear-2) {
                        $year_class = '3';
                    }elseif ($year==$nowYear-3) {
                        $year_class = '4';
                    }
                    
                    $strsql1 = "SELECT s.pname FROM student s
WHERE s.std_code= '$std_code'" ;
             $result1 = mysqli_query($conn, $strsql1);
            $rs1 = mysqli_fetch_array($result1);              
            if($rs1['pname']=='1'){
                echo "ชาย";
            } else {
               echo "หญิง";  
            }
            ?>
                    <input type="hidden" name="sex" value="<?=$rs1['pname']?>">    
                    <h5>สถานะทางการศึกษา</h5>
                    ชั้นปีที่ <?= $year_class?>
                    <input type="hidden" name="year" value="<?= $year_class?>">
                    <br/>
                    <h4>ส่วนที่ 2 ข้อมูลความพึงพอใจของผู้ตอบแบบสอบถาม</h4>
                    <h4>ด้านความพึงพอใจในการเข้าร่วมโครงการ</h4><br/>
                    <h5>1.การประชาสัมพันธ์แจ้งข่าวสาร</h5><br/>
                    <select name="q1" required>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="5">มากที่สุด</option>
                        <option value="4">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="2">น้อย</option>
                        <option value="1">น้อยที่สุด</option>
                    </select><br/>
                    <h5>2.สถานที่ในการจัดโครงการ</h5><br/>
                    <select name="q2" required>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="5">มากที่สุด</option>
                        <option value="4">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="2">น้อย</option>
                        <option value="1">น้อยที่สุด</option>
                    </select><br/>
                    <h5>3. ระยะเวลาในการดำเนินโครงการ</h5><br/>
                    <select name="q3" required>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="5">มากที่สุด</option>
                        <option value="4">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="2">น้อย</option>
                        <option value="1">น้อยที่สุด</option>
                    </select><br/>
                    <h5>4.การลงทะเบียน</h5>
                    <select name="q4" required>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="5">มากที่สุด</option>
                        <option value="4">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="2">น้อย</option>
                        <option value="1">น้อยที่สุด</option>
                    </select><br/>
                    <h5>5. การจัดบริการอาหาร/อาหารว่าง</h5><br/>
                    <select name="q5" required>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="5">มากที่สุด</option>
                        <option value="4">มาก</option>
                        <option value="3">ปานกลาง</option>
                        <option value="2">น้อย</option>
                        <option value="1">น้อยที่สุด</option>
                    </select><br/>
                    <h4>ด้านการนำความรู้ไปใช้ประโยชน์<h4><br/>
                            <h5>6. สามารถนำความรู้ที่ได้กลับไปประยุกต์ใช้งานได้จริง</h5><br/>
                            <select name="q6" required>
                                <option value="">--กรุณาเลือก--</option>
                                <option value="5">มากที่สุด</option>
                                <option value="4">มาก</option>
                                <option value="3">ปานกลาง</option>
                                <option value="2">น้อย</option>
                                <option value="1">น้อยที่สุด</option>
                            </select><br/>
                            <h5>7. สามารถกลับๆไปพัฒนาต่อยอดความรูเดิมที่มีอยู่ได้</h5><br/>
                            <select name="q7" required>
                                <option value="">--กรุณาเลือก--</option>
                                <option value="5">มากที่สุด</option>
                                <option value="4">มาก</option>
                                <option value="3">ปานกลาง</option>
                                <option value="2">น้อย</option>
                                <option value="1">น้อยที่สุด</option>
                            </select><br/>
                            <h5>8. มีความมั่นใจและสามารถนำความรู้ที่ได้รับไปใช้ได้</h5><br/>
                            <select name="q8" required>
                                <option value="">--กรุณาเลือก--</option>
                                <option value="5">มากที่สุด</option>
                                <option value="4">มาก</option>
                                <option value="3">ปานกลาง</option>
                                <option value="2">น้อย</option>
                                <option value="1">น้อยที่สุด</option>
                            </select><br/>
                            <h5>9. ผู้เข้าร่วมโครงการมีความรู้เพิ่มมากขึ้น</h5><br/>
                            <select name="q9" required>
                                <option value="">--กรุณาเลือก--</option>
                                <option value="5">มากที่สุด</option>
                                <option value="4">มาก</option>
                                <option value="3">ปานกลาง</option>
                                <option value="2">น้อย</option>
                                <option value="1">น้อยที่สุด</option>
                            </select><br/>
                            <h5>10. สามารถนำความรู้ที่ไดรับไปใช้งานได้จริง</h5><br/>
                            <select name="q10" required>
                                <option value="">--กรุณาเลือก--</option>
                                <option value="5">มากที่สุด</option>
                                <option value="4">มาก</option>
                                <option value="3">ปานกลาง</option>
                                <option value="2">น้อย</option>
                                <option value="1">น้อยที่สุด</option>
                            </select><br/>
                            <h5>ข้อเสนอแนะอื่นๆ ที่คิดว่าจะเป็นประโยชน์สำหรับการจัดกิจกรรมในครั้งต่อไป</h5><br/>
                            <div class="row uniform 50%">
                                <div class="12u">
                                    <textarea name="message" id="message" placeholder="รายละเอียด" rows="6"></textarea>
                                </div>
                            </div><br/>
                            <input type="submit" value=" ส่งแบบประเมิน">
                            <input type="hidden" name="act_id" value="<?= $act_id ?>">
             </div>
         </div>
    </form>
</section>
<!-- Footer -->
<?php include_once 'footer.php'; ?>
	