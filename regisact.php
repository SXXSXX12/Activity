<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h2>ลงทะเบียนเข้าร่วมกิจกรรม</h2>
    </header>
    <div class="alert alert-info">
    <div class="row">
        <div class="11u">
                    <?php 
                    $act_id=$_GET['act_id'];
                   $strsql =" SELECT * FROM activity WHERE act_id=$act_id";
                    $result = mysqli_query($conn,$strsql);
                    $rs = mysqli_fetch_array($result);
                    include_once 'funtion/funcDateThai.php';
                    echo "<h3>"."กิจกรรม:" .$rs ['act_name']. "<br><br>";
                    echo "วันที่เริ่มจัดกิจกรรม:" . DateThai2($rs['act_datestart'])."<br><br>";
                    echo "วันที่สิ้นสุดการจัดกิจกรรม:" . DateThai2($rs['act_dateend']). "<br><br>"; 
                    echo "สถานที่จัดกิจกรรม:" .$rs ['act_location']."</h3>". "<br><br>"; 
                    ?>
                <form name="form1" method="POST" action="regis_act.php">
                          <h4>รหัสนักศึกษา<input type="text" name="std_code" value=""/></h4><br/>    
                          <input type="hidden" name="act_id" value="<?=$act_id?>">     
                    <input type="submit" onclick="return confirm('ลงทะเบียนเรียบร้อยแล้วค่ะ')" value=" บันทึก " />
                    <input type="submit" class="special" value=" ยกเลิก " />

                   </form>
                 
            </div>
    </div>
    </div>
           
</section>

<?php include_once 'footer.php'; ?>