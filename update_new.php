<?php include_once 'header.php'; ?>

<section id="main" class="container 75%"><header>
    <h2>เพิ่มข่าวประชาสัมพันธ์</h2>
</header>
<div class="12u">
            <form name="updatenew" method="POST" action="">
                <div class="alert alert-info">
            <div class="col-md-6" style="padding:0;padding-right: 10px;">
                วันเดือนปี <input readonly  type="text" id="dateStart" name="date" class='datepicker' data-date-format="yyyy/mm/dd" required value="">
                <script>
                    $('.datepicker').datepicker({
                        format: 'yyyy/mm/dd',
                        autoclose: true,
                    });
                </script>
            </div><br><br><br><br>
            <div>
                หัวข้อข่าว<input type="text" name="update_new" >
            </div><br>
            รายละเอียดข่าว<div class="row uniform 50%">
                <div class="12u">
                    <textarea name="message" id="message" placeholder="รายละเอียดข่าว" rows="6"></textarea>
                </div>
            </div>
                
            <div class="row uniform">
                <div class="12u">
                    <ul class="actions">
                        <li><input type="submit" value="Save" /></li>
                        <li><input type="reset" value="Reset " class="special" /></li>
                    </ul>
                </div>
            </div>
            </div>
                </form>
    <form name="form2" action="" enctype="" method="post">
                <div class="alert alert-info">
            <div class="form-group">
                อัพเดทรูปภาพ<input class="form-control" type="file" name="imge" >
            </div>
            
            รายละเอียดกิจกรรม<div class="row uniform 50%">
                <div class="12u">
                    <textarea name="message" id="message" placeholder="รายละเอียดกิจกรรม" rows="6"></textarea><br>
                    <input type="submit" value="Upload" />
                </div>
            </div>
            </div>
    </form>
</div>

        
    </section>
</div>
<?php include_once 'footer.php'; ?>