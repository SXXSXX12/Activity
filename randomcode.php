<?php include_once 'header.php'; ?>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>โค้ดกิจกรรม</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->

                <div class="table-wrapper">
                    <table>

                        <?php
                        $act_id=$_GET['act_id'];
                        $strsql = "SELECT act_number,act_id,act_datestart FROM activity
WHERE act_id=$act_id";
                        $result = mysqli_query($conn,$strsql);
                        $rs1 = mysqli_fetch_array($result);
                        $a = 0;
                        $i = 0;
                        $random;
                        $c = $rs1['act_id'];
                        $b = $rs1['act_number'];
                        $number = 1;
                        /*
                          $a คือ
                          $i คือ
                          $random คือ
                          $c คือ รหัสกิจกรรม
                          $b คือ อะไร จำนวนนักศึกษา
                         */
                        echo "รหัสกิจกรรม : " . $c . "<br>";
                        echo "จำนวนนักศึกษา : " . $b . "<br>";
                        $arr = array();
                        $strsql = "select act_id FROM code_activity where act_id=$c limit 1";
                        $result = mysqli_query($conn, $strsql);
                        $rs = mysqli_fetch_array($result);
                        if(count($rs)==0){
                        for ($i = 0; $i < $b; $i++) {
                            $random = $c . rand(10000, 99999);
                            echo $number . ". &nbsp;&nbsp;&nbsp;&nbsp;<b>" . $random . "</b><br>";
                            array_push($arr, $random);
                            $number++;
                        }
                        $values='';
                        foreach ($arr as $key => $as) {
                            if($key !=0){
                                $values.=', ';
                            }
                            $values.="('".$as."',$c,0,'".$rs1['act_datestart']."')";
                        }
                        $sql=mysqli_query($conn,"insert into code_activity (gencode,act_id,checkcode,gen_date) VALUES $values");
                            if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{?>
            alert('Insert complate!!!');
	<?php }
                        } else {
                            echo 'กิจกรรมนี้สร้างโค้ดไปแล้ว';
                            header("location:table.php"); 
                        }
                        ?>   
                    </table>
                </div>
        </div>
    </div>
</section>
        <div align='center'><a href='#'><input type='button' name='edit' value='Print'></a></div>
<?php include_once 'footer.php'; ?>
