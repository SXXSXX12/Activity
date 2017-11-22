<?php
include_once 'config/config.php';
function insert_date($take_date_conv) {
            $take_date = explode("/", $take_date_conv);
            $take_date = $take_date[0]."-".$take_date[1]."-".$take_date[2];
            return $take_date;
        }
$rela_id = $_POST ['rela_id'];       
$date = insert_date($_POST['date']);
$topic = $_POST['topic'];
$descrip = $_POST['descrip'];
$u_update = $_POST['u_update'];
$des_act = $_POST['des_act'];
$method = isset($_POST['method'])?$_POST['method']:'';

function removespecialchars($raw) {
    return preg_replace('#[^¡-ÎÐ-çè-ëìa-zA-Z0-9.-]#u', '', $raw);
}

if (!empty($_FILES["image"]["name"])) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "photo/" . removespecialchars(date("d-m-Y/") . "1" . $_FILES["image"]["name"]))) {
        $file1 = date("d-m-Y/") . "1" . $_FILES["image"]["name"];
        $image = removespecialchars($file1);
    }
}  else {
    $image ='';
}

if($method=='edit'){
    if(empty($image)){
 $sql=mysqli_query($conn,"update relations_act SET date='$date',topic='$topic',descrip='$descrip',"
        . "Status_user='$u_update',des_act='$des_act' where rela_id=$rela_id");
  }else{ 
 $sql=mysqli_query($conn,"update relations_act SET date='$date',topic='$topic',descrip='$descrip',"
        . "Status_user='$u_update',image='$image',des_act='$des_act' where rela_id=$rela_id");
  }
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:new.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into relations_act SET date='$date',topic='$topic',descrip='$descrip',"
        . "Status_user='$u_update',image='$image',des_act='$des_act'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:new.php"); 
	}
}
?>
