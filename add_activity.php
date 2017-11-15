<?php
include_once 'config/config.php';

function insert_date($take_date_conv) {
            $take_date = explode("/", $take_date_conv);
            $take_date = $take_date[0]."-".$take_date[1]."-".$take_date[2];
            return $take_date;
        }

$act_name = $_POST['act_name'];echo '<br>';
$dateStart = insert_date($_POST['dateStart']);echo '<br>';
$dateEnd = insert_date($_POST['dateEnd']);echo '<br>';
$hour = $_POST['hour'];
$start_time = $_POST['take_hour'].':'.$_POST['take_minute'];echo '<br>';
$group = $_POST['group'];echo '<br>';
$date = date('Y-m-d');echo '<br>';
$year1 = isset($_POST ['year1'])?$_POST ['year1']:0;echo '<br>';
$year2 = isset($_POST ['year2'])?$_POST ['year2']:0;echo '<br>';
$year3 = isset($_POST ['year3'])?$_POST ['year3']:0;echo '<br>';
$year4 = isset($_POST ['year4'])?$_POST ['year4']:0;echo '<br>';
$location = $_POST ['location'];echo '<br>';
$teacher = $_POST['teacher'];

$method = isset($_POST['method'])?$_POST['method']:'';

if($method=='edit'){
    $nowYear = date('y')+43;
$year1 = ($year1=='1')?$nowYear:'';
$year2 = ($year2=='1')?($nowYear-1):'';
$year3 = ($year3=='1')?($nowYear-2):'';
$year4 = ($year4=='1')?($nowYear-3):'';
 $act_id=$_POST['act_id'];
 $aa = mysqli_query($conn, "select act_number from activity where act_id=$act_id");
 $aa = mysqli_fetch_array($aa);
    if(trim($aa['act_number']) != trim($group)){
      echo $act_id;
     mysqli_query($conn,"delete from code_activity where act_id=$act_id");
 }
 $sql=mysqli_query($conn,"update activity SET act_name='$act_name',
	act_datestart ='$dateStart',act_dateend='$dateEnd',act_hour='$hour',act_location='$location',
	act_number='$group',rec_date='$date',year1='$year1',year2='$year2',year3='$year3',year4='$year4',
	respon='$teacher',status_respon=2,start_time='$start_time' where act_id=$act_id");
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:table.php"); 
	}
}else{
    $nowYear = date('y')+43;
echo $year1 = ($year1=='1')?$nowYear:'';
echo $year2 = ($year2=='1')?($nowYear-1):'';
echo $year3 = ($year3=='1')?($nowYear-2):'';
echo $year4 = ($year4=='1')?($nowYear-3):'';
$sql=mysqli_query($conn,"insert into activity SET act_name='$act_name',
	act_datestart ='$dateStart',act_dateend='$dateEnd',act_hour='$hour',act_location='$location',
	act_number='$group',rec_date='$date',year1='$year1',year2='$year2',year3='$year3',year4='$year4',
	respon='$teacher',status_respon=2,start_time='$start_time'");
	if(!$sql){
		echo "Insert not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:table.php"); 
	}
}
?>
