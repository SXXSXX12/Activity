<?php include_once 'header.php'; ?>
<section id="main" class="container 75%">
    <div class="12u">
        <section class="box">
            
            <form name="addfolio" action="add_folio.php" method="post" enctype="multipart/form-data">
                <div class="alert alert-info">
                    <header>
                <font size="5" color="green">PortFolio </font><br><br>
                   </header>
                    <div id="loginbox">
                        ชื่อผลงาน <input type="text" name="projectname" ><br />             			
                        รายละเอียดผลงาน <textarea name="portfolio" id="portyear" placeholder="รายละเอียด" rows="6"></textarea>
                        ปีที่ทำผลงาน <input type="text" name="portyear" ><br />
                         <input type="hidden" name="std_code" value="<?=$_GET['std_code']?>">
                            <input type="submit" value=" submit ">
                    </div>
                </div>
            </form>
        </section>
    </div
</section>
</section>         
<?php include_once 'footer.php'; ?>