<?php include_once 'header.php'; ?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $rela_id = $_GET['rela_id'];
    $strsql = "SELECT * FROM relations_act WHERE rela_id='$rela_id'"; 
    $result = mysqli_query($conn,$strsql);
    $rs = mysqli_fetch_array($result);
}
?> 
<section id="main" class="container 75%"><header>
    <h2>เพิ่มข่าวประชาสัมพันธ์</h2>
</header>
<div class="12u">
    <form name="updatenew" method="POST" action="updatenew.php" enctype="multipart/form-data">
                <div class="alert alert-info">
            <div class="col-md-6" style="padding:0;padding-right: 10px;">
                วันเดือนปี <input readonly  type="text" id="dateStart" name="date" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method'])?$rs['date']:''?>">
                <script>
                    $('.datepicker').datepicker({
                        format: 'yyyy/mm/dd',
                        autoclose: true,
                    });
                </script>
            </div><br><br><br><br>
            <div>
                หัวข้อข่าว<input type="text" name="topic" value="<?= isset($_GET['method'])?$rs['topic']:''?>" >
            </div><br>
            รายละเอียดข่าว<div class="row uniform 50%">
                <div class="12u">
                    <textarea name="descrip" id="message" placeholder="รายละเอียดข่าว" rows="6"><?= isset($_GET['method'])?$rs['descrip']:''?></textarea>
                </div>
            </div>
             <h5>ผู้อัพเดทข่าว</h5>	
                    <select name="u_update" required>
                        <?php if(isset($_GET['method'])?$rs['Status_user']:''==1){
                        echo "<option value=>--กรุณาเลือก--</option>";
                        echo "<option value='1' selected>แอดมิน</option>";
                        echo "<option value='2'>อาจารย์</option>";
                        }elseif (isset($_GET['method'])?$rs['Status_user']:''==2) {
                        echo "<option value=>--กรุณาเลือก--</option>";
                        echo "<option value='1'>แอดมิน</option>";
                        echo "<option value='2' selected>อาจารย์</option>";    
                        }else{?>
                        <option value="">--กรุณาเลือก--</option>
                        <option value="1">แอดมิน</option>
                        <option value="2">อาจารย์</option>  
                        <?php }?>
                    </select><br/>
              <div class="form-group">
                อัพเดทรูปภาพ<input class="form-control" type="file" name="image" >
            </div>
            
            รายละเอียดรูปภาพ<div class="row uniform 50%">
                <div class="12u">
                    <textarea name="des_act" id="message" placeholder="รายละเอียดกิจกรรม" rows="6"><?= isset($_GET['method'])?$rs['des_act']:''?></textarea><br>
                </div>
                
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions">
                        <?php if(isset($_GET['method'])){?>
                        <input type="hidden" name="rela_id" value="<?= $rela_id?>">
                        <input type="hidden" name="method" value="edit">
                        <li><input type="submit" value="Save" /></li>
                        <li><input type="reset" value="Reset " class="special" /></li>
                        <?php }else{?>
                        <li><input type="submit" value="Save" /></li>
                        <li><input type="reset" value="Reset " class="special" /></li>
                        <?php }?>
                    </ul>
                </div>
            </div>           
            </div>
            </div>
    </form>
</div>

        
    </section>
</div>
<?php include_once 'footer.php'; ?>