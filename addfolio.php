<?php include_once 'header.php'; ?>
<?php if(isset($_GET['method'])){
    $method = $_GET['method'];
    $std_code = $_GET['std_code'];
    $portfolio_id = $_GET['portfolio_id'];
    $strsql = "SELECT *FROM portfolio WHERE  portfolio_id='$portfolio_id'"; 
    $result = mysqli_query($conn,$strsql);
    $rs = mysqli_fetch_array($result);
}
?>                						   

<section id="main" class="container 75%">
    <div class="12u">
           <form name="addfolio" action="add_folio.php" method="post" enctype="multipart/form-data">
                <div class="alert alert-info">
                    <header>
                        <font size="5" color="green">PortFolio </font><br><br>
                    </header>
                    <div id="loginbox">
                       
                        ชื่อผลงาน <input type="text" name="projectname" value=" <?= isset($_GET['method'])?$rs['projectname']:''?>"required><br />             			
                        รายละเอียดผลงาน <textarea name="portfolio" id="portyear" placeholder="รายละเอียด" rows="6" required><?= isset($_GET['method'])?$rs['portfolio']:''?></textarea>
                         ปีที่ทำผลงาน  (พ.ศ.)<br/>
                        <div class="6u ">
                            <select name ="portyear" id="portyear" value="<?= isset($_GET['method']) ? $rs['portyear'] : '' ?>" required>
                                <option value=""required>ปีที่ทำผลงาน</option>
                                <?php
                                for ($i = 2530; $i <= 2560; $i++) {
                                    if ($i == $rs['portyear']) {
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
                                    if(isset($_GET['method'])?$_GET['method']:''=='edit'){
                                        echo "<input type='hidden' name='method' value='edit'>";
                                        echo "<input type='hidden' name='portfolio_id' value='".$std_code."'>";
                                        echo "<input type='hidden' name='portfolio_id' value='".$portfolio_id."'>";
                                        echo "<input type='submit' name='submit' value='บันทึก'>";
                                    }else{
                         ?>
                                                        <h4><input type="submit" value=" บันทึก " />
                                                        <input type="reset" class="button special" value=" ยกเลิก " /></h4>
							
                                    <?php }?>		
                        <input type="hidden" name="std_code" value="<?= $_GET['std_code'] ?>">
                        <input type="hidden" name="portfolio_id" value="<?= $_GET['$portfolio_id'] ?>">
                        <input type="submit" value="submit">
                    </div>
                </div>
            </form>
        </div>
        </section>
            <?php include_once 'footer.php'; ?>