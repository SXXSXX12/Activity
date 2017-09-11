<?php include_once 'header.php'; ?>
<section id="main" class="container 75%">
    <div class="12u">
        <section class="box">
            
            <form name="addfolio" action="#" method="post">
                <div class="alert alert-info">
                    <header>
                <font size="5" color="green">PortFolio </font><br><br>
                   </header>
                    <div id="loginbox">
                        รูปภาพสำหรับ ประวัตินักศึกษา <input class="form-control" type="file" name="imge" ><br />   
                        ชื่อผลงาน <input type="text" name="projectname" ><br />             			
                        รายละเอียดผลงาน <textarea name="portyear" id="portyear" placeholder="รายละเอียด" rows="6"></textarea>
                        ปีที่ทำผลงาน <input type="text" name="portyear" ><br />
                        <input type="submit" value=" submit "></a>
                    </div>
                </div>
                <input type="hidden" name="method" value="">
            </form>
        </section>
    </div
</section>
</section>         
<?php include_once 'footer.php'; ?>