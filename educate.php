<?php include_once 'header.php'; ?>
<br>
<center><ul class="actions">
        <li><a href="admin.php" class="button"  title="คอนเฟิร์มกิจกรรม">Confirm Activity</a></li>
        <li><a href="educate.php" class="button special"  title="สร้างประวัติส่วนตัว">Build Resume</a></li>
        <li><a href="data_aj.php" class="button" title="ข้อมูลอาจารย์">Lecturer Data</a></li>
        <li><a href="data_student.php" class="button" title="ข้อมูลนักศึกษา">Student Data</a></li>
        <li><a href="table.php" class="button" title="ข้อมูลกิจกรรม">Activity Data</a></li>
    </ul></center>
<?php  
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
	global $e_page;
	global $querystr;
	$urlfile=""; // ส่วนของไฟล์เรียกใช้งาน ด้วย ajax (ajax_dat.php)
	$per_page=20;
	$num_per_page=floor($chk_page/$per_page);
	$total_end_p=($num_per_page+1)*$per_page;
	$total_start_p=$total_end_p-$per_page;
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='$urlfile?s_page=$pPrev".$querystr."' class='naviPN'>Prev</a>";
	}
	for($i=$total_start_p;$i<$total_end_p;$i++){  
		$nClass=($chk_page==$i)?"class='selectPage'":"";
		if($e_page*$i<=$total){
		echo "<a href='$urlfile?s_page=$i".$querystr."' $nClass  >".intval($i+1)."</a> ";   
		}
	}		
	if($chk_page<$total_p-1){
		echo "<a href='$urlfile?s_page=$pNext".$querystr."'  class='naviPN'>Next</a>";
	}
}   
?>
<!-- Main -->
<section id="main" class="container">
    <header>
        <h2>ประวัติการศึกษา</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
                <div class="table-wrapper">
                    <table>
                        <thead>
                        <div class="row uniform 100%">
                            <table width='100%' align='center' id="example3">
                                <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>รหัสนักศึกษา</td>
                                    <td align='center'>ชื่อ-สกุล</td>
                                    <td align='center'>เพิ่มประวัติการศึกษา</td>
                                    <td align='center'>เพิ่มผลงาน</td>
                                </tr>
                                <?php
                                //$std_code = $_GET['std_code'];
                                $q = "SELECT * FROM student";
                                //$result = mysqli_query($conn, $strsql);
                                $qr=mysqli_query($conn,$q);
if($qr==''){exit();}
$total=mysqli_num_rows($qr);
$chk_page=''; 
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysqli_query($conn,$q);
if(mysqli_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;  
echo mysqli_error($conn);
                                $row_no = 0;
                                while ($rs = mysqli_fetch_array($qr)) {
                                    $row_no++;
                                    ?>
                                    <tr>
                                        <td align='center'><?= ($chk_page*$e_page)+$row_no ?></td>
                                        <td align='center'><?php echo $rs['std_code']; ?></td>
                                        <td align='center'><a href="educationtable.php?std_code=<?= $rs['std_code'] ?>"><?php echo $rs ['fname'] . $rs ['lname']; ?></a></td>
                                        <td align='center'><a href='buildresumeadmin.php?std_code=<?= $rs['std_code'] ?>'title="เพิ่มประวัติการศึกษา"><img src="images/save.ico" width="40" height="45"></a></td>
                                        <td align='center'><a href='addfolio.php?std_code=<?= $rs['std_code']?>' title="เพิ่มผลงาน"><img src="images/book.svg" width="45" height="45"></a></td>
                                    </tr>
                                <?php } ?>

                            </table>
                            <?php if($total>0){
echo mysqli_error($conn);
?><BR><BR>
<div class="browse_page">
 
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size='2'>มีจำนวนทั้งหมด  <B>$total รายการ</B> จำนวนหน้าทั้งหมด ";
  echo  $count=ceil($total/10)."&nbsp;<B>หน้า</B></font>" ;
}
  ?> 
</div>
                        </div>
                    </table>
                </div>
            </section>
        </div>
    </div>


    <?php include_once 'footer.php'; ?>
