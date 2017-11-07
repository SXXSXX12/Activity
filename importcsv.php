<?php include_once 'header.php'; ?>
<section id="main" class="container 75%">
    <header>
        <h2>เพิ่มข้อมูลนักศึกษา</h2>
    </header>
    <div class="row">
        <div class="12u">
            <form method="POST" action="all_Import.php" enctype="multipart/form-data">
                <div class="alert alert-info">
                    <div id="loginbox">
                        <h3>เลือกไฟล์ import(.csv)</h3><br>    
                        <input type="file" name="file"> <br><br>    
                        <input type="submit" value=" บันทึก " />
                        <input type="reset" class="special" value=" ยกเลิก " />
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include_once 'footer.php'; ?>

