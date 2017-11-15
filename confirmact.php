<?php
include_once 'header.php';
//include_once 'config/config.php';
include_once 'funtion/function_date.php';
$act_id = $_POST['act_id'];
$gencode = trim($_POST['gencode']);
$_SESSION['std_code']; 

$chkgenc = strlen($gencode)-5;
$chkgenc = substr($gencode,0,$chkgenc);

if($act_id == $chkgenc){
$sql = mysqli_query($conn, "select code_id,gencode,gen_date from code_activity where gencode='$gencode'");
$chkcode = mysqli_fetch_array($sql);

$checkDate = $chkcode['gen_date'];
$check = date('Y-m-d', strtotime("$checkDate+14 days "));

if (date('Y-m-d') > $check) {
    echo "<script type='text/javascript'>alert('โค้ดกิจกรรมหมดอายุ');</script>";
    switch ($_SESSION['Status_user']) {
        case 1:
            echo "<script type='text/javascript'>alert('โค้ดกิจกรรมหมดอายุ');</script>";

            header("location:admin.php");
            break;
        case 3:
            echo "<script type='text/javascript'>alert('โค้ดกิจกรรมหมดอายุ');</script>";
            header("location:student.php");
            break;
        default:
            break;
    }
    exit();
}

$sql2 = mysqli_query($conn, "select code_id  from history_act where code_id='" . $chkcode['code_id'] . "'");
$chkcode2 = mysqli_fetch_array($sql2);
if (count($chkcode2) != 0) {
    echo 'มีการลงทะเบียนโค้ดนี้ไปแล้วค่ะ';
    exit();
}

if (count($chkcode) != 0) {
    $update_code = mysqli_query($conn, "update code_activity set checkcode='1',std_code='" . $_SESSION['std_code'] . "' where gencode='$gencode'");
    $update_his = mysqli_query($conn, "update history_act set code_id='" . $chkcode['code_id'] . "',status_regis=2 where std_code='" . $_SESSION['std_code'] . "' and act_id=$act_id");
    $sel_his = mysqli_query($conn, "select his_id from history_act where code_id='" . $chkcode['code_id'] . "' and status_regis=2");
    $his_id = mysqli_fetch_assoc($sel_his);
    $his_id['his_id'];
    if (!$update_his) {
        echo "Update not complate ERROR : " . mysqli_error($conn) . "";
    } else {
        switch ($_SESSION['Status_user']) {
            case 1:
                echo "<script>alert('ยืนยันการเข้ากิจกรรมเรียบร้อยแล้วค่ะ');</script>";
                echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=admin.php?his_id=".$his_id['his_id']."'>";
                //header("location:admin.php?his_id=".$his_id['his_id']."");
                break;
            case 3:
                echo "<script>alert('ยืนยันการเข้ากิจกรรมเรียบร้อยแล้วค่ะ');</script>";
                header("location:student.php?his_id=".$his_id['his_id']."");
                break;
            default:
                break;
        }
    }
} else {
    echo 'โค้ดกิจกรรมไม่ตรง';
}
}else{
    echo "<script>alert('คนละกิจกรรมโว้ย!!!');</script>";
    echo" <META HTTP-EQUIV='Refresh' CONTENT='2;URL=confirm_act.php?act_id=$act_id'>";
}