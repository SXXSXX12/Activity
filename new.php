<?php include_once 'header.php'; ?>
<br> 
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
<section id="main" class="container">
    <header>
        <h2>จัดการข่าวประชาสัมพันธ์</h2>
    </header>
    <div class="row">
        <div class="12u">
            <!-- Table -->
            <div class="table-wrapper">
                <table>
                    <thead>
                    <div class="row uniform 1000%">
                        <table width='600' align='center' id="example3">
                            <tr>
                                    <td align='center'>ลำดับ</td>
                                    <td align='center'>หัวเรื่อง</td>
                                    <td align='center'>รายละเอียด</td>
                                    <td align='center'>รูปภาพ</td>
                                    <td align='center'>วันที่อัพเดต</td>
                                    <td align='center'>เพิ่ม</td>
                                    <td align='center'>แก้ไข</td>
                                    <td align='center'>ลบ</td>
                                </tr>
                                <?php
                                include_once 'funtion/funcDateThai.php';
                                if (isset($_GET['method1'])) {
                                    //$method = $_GET['method'];
                                    //$teach_id = $_GET['teach_id'];
                                    $rela_id = $_GET['rela_id'];
                                    $strsql = "delete FROM relations_act WHERE rela_id=$rela_id";
                                    $result = mysqli_query($conn, $strsql) or die(mysqli_error($conn));
                                }
                                $q = "SELECT * FROM relations_act";
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
                                        <td align='center'><?=($chk_page*$e_page)+ $row_no ?></td>
                                        <td align='center'><?= $rs['topic']; ?></td>
                                        <td align='center'><?= $rs['descrip']; ?></td>
                                        <td align='center'><img src="post/<?= $rs['image']; ?>" width="100px"></td>
                                        <td align='center'><?= DateThai1($rs['date']) ?></td>
                                        <td align='center'><a href='update_new.php' title="เพิ่มกิจกรรม"><img src="images/save.ico" width="40" height="45"></a></td>
                                        <td align='center'><a href='update_new.php?rela_id=<?= $rs['rela_id'] ?>&method=edit' title="แก้ไขกิจกรรม"><img src="images/din.png" width="35" height="35"></a></td>
                                        <td align='center'><a href='new.php?rela_id=<?=  $rs['rela_id'] ?>&method1=delete' onclick="return confirm('คุณต้องการลบ?')" title="ลบกิจกรรม"><img src="images/2.png" width="35" height="35"></a></td>
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
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
    <?php include_once 'footer.php'; ?>