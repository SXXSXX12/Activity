<?php
include_once 'config/config.php';
function insert_date($take_date_conv) {
            $take_date = explode("/", $take_date_conv);
            $take_date = $take_date[0]."-".$take_date[1]."-".$take_date[2];
            return $take_date;
        }
$date = insert_date($_POST['date']);
$topic = $_POST['topic'];
$descrip = $_POST['descrip'];
$u_update = $_POST['Status_user '];
$
$sql=mysqli_query($conn,"insert into relations_act SET date='$date',topic='$topic',descrip='$descrip',Status_user='$u_update'");
?>