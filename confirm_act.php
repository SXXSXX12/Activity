<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container 75%">
    <header>
        <h3>ลงทะเบียนเข้าร่วมกิจกรรม</h3>
    </header>
    <div class="row">
        <div class="12u">
            <div class="well well-lg">
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
                <form name="form1" method="POST" action="confirmact.php" target="_blank">
                          โค้ดกิจกรรม  <input type="text" name="gencode" value=""  /><br/>    
                          <input type="hidden" name="act_id" value="<?=$act_id?>">     
                          <a href="confirmact.php"><input type="submit" onclick="return confirm('ยืนยันการเข้ากิจกรรมเรียบร้อยแล้วค่ะ')" value="ยืนยัน"/></a>
                    <input type="submit" class="button special" value=" ยกเลิก " />
                   </form>
                 </div>
            </div>
           
</section>

<?php include_once 'footer.php'; ?>