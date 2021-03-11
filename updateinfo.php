<?php
include("connection/conn.php");
// print_r($_POST);
// exit();
if ($_POST["id"]=='') {
	echo "<script type='text/javascript'>";
	echo "alert('Error');";
	echo "window.location='info.php';";
	echo "</script>";
}
$id=$_POST["id"];
$mem_user=$_POST["mem_user"];
$mem_pass=$_POST["mem_pass"];
$mem_name=$_POST["mem_name"];
$mem_tel=$_POST["mem_tel"];
$mem_address=$_POST["mem_address"];
$sql_check_user ="SELECT * FROM tb_member Where mem_user = '$mem_user'";
$query_check = mysqli_query($con,$sql_check_user);
if($row_check = mysqli_num_rows($query_check)>0){
	echo "<script type='text/javascript'>";
	echo "alert('มีชื่อผู้ใช้งานแล้ว');";
	echo "window.location='info.php'";
	echo "</script>";
}else{
	$sql="UPDATE tb_member Set mem_user = '$mem_user',mem_pass = '$mem_pass',
							mem_name ='$mem_name',mem_tel = '$mem_tel',mem_address = '$mem_address'
							Where id='$id'";
	$result=mysqli_query($con,$sql) or die ("error query".mysqli_error($con));
	mysqli_close($con);

	if ($result) {
		echo "<script type='text/javascript'>";
		echo "alert('อัปเดตข้อมูลเสร็จสิ้น');";
		echo "window.location='info.php';";
		echo "</script>";
	}else{
		echo "<script type='text/javascript'>";
		echo "alert('อัปเดตข้อมูลผิดพลาด');";
		echo "window.location='info.php';";
		echo "</script>";
	}
}
?>