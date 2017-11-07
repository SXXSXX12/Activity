<?php
$dbname = "activity";
$connect = new mysqli("localhost","root","",$dbname,"3306");
$connect->set_charset('utf8');
if(! $connect)
	die('connect Failed! :'.mysqli_connect_error());
 //mysqli_query ("SET NAMES utf-8")
//header('Content-Type: text/csv; charset=utf-8');
//if(isset($_POST["submit"]))
//{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {        echo $data[1];
                $item1 = mysqli_real_escape_string($connect, $data[0]);
                $item2 = mysqli_real_escape_string($connect, $data[1]);
                $item3 = mysqli_real_escape_string($connect, $data[2]);
                $item4 = mysqli_real_escape_string($connect, $data[3]);
                $item5 = mysqli_real_escape_string($connect, $data[4]);
                $item6 = mysqli_real_escape_string($connect, $data[5]);
                $item7 = mysqli_real_escape_string($connect, $data[6]);
                $item8 = mysqli_real_escape_string($connect, $data[7]);
                //$item9 = mysqli_real_escape_string($connect, $data[8]);
//                $item10 = mysqli_real_escape_string($connect, $data[9]);
//                $item11 = mysqli_real_escape_string($connect, $data[10]);
//                $item12 = mysqli_real_escape_string($connect, $data[11]);
//                $item13 = mysqli_real_escape_string($connect, $data[12]);
                //$item12 = mysqli_real_escape_string($connect, $data[11]);
                //$query = "INSERT into tb_test (excel_name, excel_email, tb_user) values('$item1','$item2','$item3')";
                $query = "INSERT into student (pname, fname, lname, std_code, address, phone, dateofbirth, email) 
                values('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8')";
                mysqli_query ($connect, $query);
                mysqli_set_charset($connect, "utf8");
               //mysqli_query ("SET NAMES utf-8");
   }
   fclose($handle);
        echo "<script>alert('เพิ่มข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='data_student.php'</script>";
  }
 }
//}
