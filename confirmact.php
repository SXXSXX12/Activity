<?php

session_start();
include_once 'header.php';
//include_once 'config/config.php';
include_once 'funtion/function_date.php';
echo $act_id = $_POST['act_id'];
echo $gencode = $_POST['gencode'];

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

    if (!$update_his) {
        echo "Update not complate ERROR : " . mysqli_error($conn) . "";
    } else {
        switch ($_SESSION['Status_user']) {
            case 1:
                header("location:admin.php");
                break;
            case 3:
                header("location:student.php");
                break;
            default:
                break;
        }
    }
} else {
    echo 'โค้ดบ่ตรงเด้อ';
}
