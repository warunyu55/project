<?php
include("../connection/conn.php");
if ($_POST["id"]=='') {
	echo "<script type='text/javascript'>";
	echo "alert('Error');";
	echo "window.location='member.php';";
	echo "</script>";
}
$id=$_POST["id"];
$mem_user=$_POST["mem_user"];
$mem_pass=$_POST["mem_pass"];
$mem_name=$_POST["mem_name"];
$mem_tel=$_POST["mem_tel"];
$mem_address=$_POST["mem_address"];
$sql="UPDATE tb_member Set mem_user = '$mem_user',mem_pass = '$mem_pass',
						mem_name ='$mem_name',mem_tel = '$mem_tel',mem_address = '$mem_address'
						Where id='$id'";
$result=mysqli_query($con,$sql) or die ("error query".mysqli_error());
mysqli_close($con);

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('อัปเดตข้อมูลเสร็จสิ้น');";
	echo "window.location='member.php';";
	echo "</script>";
}else{
	echo "<script type='text/javascript'>";
	echo "alert('อัปเดตข้อมูลผิดพลาด');";
	echo "window.location='member.php';";
	echo "</script>";
}
?>