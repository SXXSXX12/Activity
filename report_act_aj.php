<?php include_once 'header.php'; ?>
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
        <h2>รายงานการเข้ากิจกรรม</h2>
    </header>

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">รายงานการเข้ากิจกรรม</div>
        <div class="panel-body">
            <div class="alert alert-info col-lg-12">
                <form class="navbar-form navbar-right" action="" method="POST">
                    <div class="form-group">
                        <div class="col-md-3" style="padding:0;padding-left: 10px;">
                            วันเริ่มกิจกรรม <input readonly  type="text" id="dateStart" name="dateStart" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_datestart'] : '' ?>">
                        </div>
                        <div class="col-md-3" style="padding:0;padding-left: 10px;">
                            วันสิ้นสุดกิจกรรม   <input readonly  type="text" id="dateStart" name="dateEnd" class='datepicker' data-date-format="yyyy/mm/dd" required value="<?= isset($_GET['method']) ? $rs['act_dateend'] : '' ?>"> 
                        </div>

                        <script>
                            $('.datepicker').datepicker({
                                format: 'yyyy/mm/dd',
                                autoclose: true,
                            });
                        </script>
                        <div class="col-lg-4">ค้นหารหัส 
                            <select name="year">
                                <option value="">กรุณาเลือกรหัส</option>
                                <option value="57">57</option>
                                <option value="58">58</option>
                                <option value="59">59</option>
                                <option value="60">60</option>
                            </select><br/>
                            <input type="hidden" name="method" value="search">
                           <input type="submit" value=" ค้นหา"> 
                        </div>
                    </div>
                </form>
                <?php
                include_once 'funtion/funcDateThai.php';
                if(isset($_POST['method']) and $_POST['dateStart'] !=''and $_POST['dateEnd'] !='' and $_POST['year']!='' ){
                    include_once 'funtion/funcDateThai.php';
                $dateStart=$_POST['dateStart'];
                $dateEnd =$_POST['dateEnd'];
                $year =$_POST['year'];
                $code = "WHERE (a.act_datestart BETWEEN '$dateStart' AND '$dateEnd') AND (a.act_dateend BETWEEN '$dateStart' AND '$dateEnd')
AND (a.year1='$year' OR a.year2='$year' OR a.year3='$year' OR a.year4='$year')";
                echo "วันที่เริ่มต้น :".DateThai1($dateStart). "<br><br>";
                echo "วันที่สิ้นสุด :".DateThai1($dateEnd)."<br><br>";
                echo "รหัส :".$year;
                } else {
                $code ="";    
                }
                if($_SESSION['Status_user']=='2'){
                                    $wherecode = "WHERE t.teach_id=".$_SESSION['std_code']."";
                                } else {
                                    $wherecode = "";
}
                $q = "SELECT a.act_id, a.act_name, a.act_datestart, a.act_dateend, a.start_time, a.act_hour, a.act_location,
                CONCAT(t.teach_name, t.teach_lname) AS respon_name
                FROM activity a
                INNER JOIN teacher t ON t.teach_id = a.respon 
                $code $wherecode
                ORDER BY a.act_id DESC";
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
                
                ?>
            </div><p>
            <div class="alert alert-success col-lg-12">
                <table width='100%' align='center' id="example3">
                    <tr>
                        <td align='center'>ลำดับ</td>
                        <td align='center'>ชื่อกิจกรรม</td>
                        <td align='center'>วันเริ่มกิจกรรม</td>
                        <td align='center'>วันที่สิ้นสุดกิจกรรม</td>
                        <td align='center'>อาจารย์ที่รับผิดชอบ</td>
                        <td align='center'>รายละเอียดการเข้ากิจกรรม</td>
                    </tr>
                    <?php
                    
                    $row_no = 0;
                    while ($rs = mysqli_fetch_array($qr)) {
                        $row_no++;
                        ?>
                        <tr>
                            <td align='center'><?=($chk_page*$e_page)+$row_no ?></td>
                            <td align='center'><?php echo $rs['act_name']; ?></td>
                            <td align='center'><?php echo DateThai1($rs['act_datestart']) ?></td>
                            <td align='center'><?php echo DateThai1($rs['act_dateend']) ?></td>
                            <td align='center'><?php echo $rs['respon_name']; ?></td>
                            <td align='center'><a href='report_act1_aj.php?act_id=<?= $rs['act_id']?>&year=<?= isset($year)?$year:''?>' title="ดูรายละเอียด"><img src="images/do.png" width="35" height="35"></a></td>

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
        </div>
    </div>


</section>

<?php include_once 'footer.php'; ?>