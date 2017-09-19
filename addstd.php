<?php
include_once 'config/config.php';
 $pname = $_POST['pname'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $StudentID = $_POST['StudentID'];
 $address = $_POST['address'];
 $dateofbirth = $_POST['dateofbirth'];
 $phone = $_POST['phone'];
 $email = $_POST ['email'];
 $image = $_POST ['image'];
$method = isset($_POST['method'])?$_POST['method']:'';
function removespecialchars($raw) {
    return preg_replace('#[^¡-ÎÐ-çè-ëìa-zA-Z0-9.-]#u', '', $raw);
}

if (trim($_FILES["image"]["name"] != "")) {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], "photo/" . removespecialchars(date("d-m-Y/") . "1" . $_FILES["image"]["name"]))) {
        $file1 = date("d-m-Y/") . "1" . $_FILES["image"]["name"];
        $image = removespecialchars($file1);
    }
}  else {
    $image ='';
}

if($method=='edit'){
 $std_id=$_POST['std_id'];
 if(empty($image)){
 $sql=mysqli_query($conn,"update student SET pname='$pname',fname='$fname',
	lname ='$lname',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',
	phone='$phone',email='$email' where std_id=$std_id");
 } else {
     $sql=mysqli_query($conn,"update student SET pname='$pname',fname='$fname',
	lname ='$lname',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',
	phone='$phone',email='$email',image='$image' where std_id=$std_id");
 }
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_student.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into student SET pname='$pname', fname='$fname ',
	lname ='$lname ',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',phone='$phone',email='$email',image='$image'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:data_student.php"); 
	}
}