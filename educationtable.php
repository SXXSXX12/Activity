<?php include_once 'header.php'; ?>
    
            <!-- Table -->
            <section class="box">
                <div>
                        <div class="row uniform 100%">
                            <header>
        <h2>ประวัติการศึกษา</h2>
        <?php
        if(isset($_GET['method'])){
         $method = $_GET['method'];
          $edu_id = $_GET['edu_id'];
         $strsql = "delete FROM education WHERE edu_id=$edu_id"; 
                    $result = mysqli_query($conn,$strsql) or die(mysqli_error($conn));
           }
         $std_code = $_GET['std_code'];
         $strsql = "SELECT * FROM student WHERE std_code=$std_code";
        
         $result = mysqli_query($conn, $strsql);
         $rs = mysqli_fetch_array($result);
        echo "<h4>ชื่อ นามสกุล : " . $rs ['fname'] . " " . $rs ['lname'] . "<br><br>";
        echo "รหัสนักศึกษา :" . $rs['std_code'] . "<br><br>";
        ?>
    </header>
                            <table width='100%' align='center'>
                                <thead>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>สาขาวิชา</td>
                                    <td align='center'>วุฒิการศึกษา</td>
                                    <td align='center'>สถาบันที่จบ</td>
                                    <td align='center'>ปีที่จบการศึกษา</td>
                                    <td align='center'>แก้ไข</td>
                                    <td align='center'>ลบ</td>
                                    
                            </thead>
                                <?php
                                $std_code = $_GET['std_code'];
                                $strsql = "SELECT e1.edu_id,e1.major,e2.educate_name,e1.intiute,e1.endyear
                                           FROM education e1 
                                           INNER JOIN educate e2 on e2.educate_id=e1.edu_level
                                           WHERE e1.std_code='$std_code'";
                                $result = mysqli_query($conn, $strsql);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($result)) {
                                    $row_no++;
                                    ?>
                                    <tr>
                                        <td align='center'><?= $row_no ?></td>
                                         <td align='center'><?php echo $rs ['major']; ?></td>
                                        <td align='center'><?php echo $rs ['educate_name']; ?></td>
                                        <td align='center'><?php echo $rs ['intiute'] ; ?></td>
                                        <td align='center'><?php echo $rs ['endyear'] ; ?></td>
                                        <td align='center'><a href='buildresumeadmin.php?std_code=<?= $std_code?>&edu_id=<?= $rs['edu_id']?>&method=edit' class='#'><img src="images/din.png" width="40" height="40"></a></td>
                                        <td align='center'><a href='educationtable.php?std_code=<?= $std_code?>&edu_id=<?= $rs['edu_id'];?>&method=delete' onclick="return confirm('คุณต้องการลบ?')" class='#'><img src="images/2.png" width="40" height="40"></a></td>
                                    </tr>
                                <?php } ?>
                                    <input type="hidden" name="edu_id" value="<?=$edu_id?>">
                            </table>
                        </div>
                </div>
            </section>
                            <?php include_once 'footer.php'; ?>
