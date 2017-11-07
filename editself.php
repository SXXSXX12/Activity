<?php
include_once 'config/config.php';
$pname = $_POST['pname'];
echo $fname = $_POST['fname'];
echo $lname = $_POST['lname'];
echo $StudentID = $_POST['StudentID'];
echo $address = $_POST['address'];
echo $dateofbirth = $_POST['dateofbirth'];
echo $phone = $_POST['phone'];
echo $email =$_POST['email'];
echo $username = $_POST ['username'];
echo $password = $_POST ['password'];
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
     $std_code=$_POST['std_code'];
    if(empty($image)){
 $sql=mysqli_query($conn,"update student SET pname='$pname',fname='$fname',
	lname ='$lname',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',
	phone='$phone',email='$email' where std_code=$std_code");
 $sql1=mysqli_query($conn,"update user SET username='$username',password='$password',
	where std_code=$std_code");
 }else{ 
 $sql=mysqli_query($conn,"update student SET pname='$pname',fname='$fname',
	lname ='$lname',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',
	phone='$phone',email='$email',image='$image' where std_code=$std_code");
 $sql1=mysqli_query($conn,"update user SET username='$username',password='$password',
	where std_code=$std_code");
 }
	if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:student.php"); 
	}
}else{
$sql=mysqli_query($conn,"insert into student SET pname='$pname', fname='$fname ',
	lname ='$lname ',std_code='$StudentID',address='$address',dateofbirth='$dateofbirth',phone='$phone',email='$email'");
if(!$sql){
		echo "Update not complate ERROR : ".mysqli_error($conn)."";
	}else{
		header("location:student.php"); 
	}
}