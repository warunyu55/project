<?php
include("../connection/conn.php");
if ($_POST["id"]=='') {
	echo "<script type='text/javascript'>";
	echo "alert('Error');";
	echo "window.location='member.php';";
	echo "</script>";
}
$id=$_POST["id"];
$room_type=$_POST["room_type"];
$sql="UPDATE tb_type Set room_type = '$room_type'
						Where id='$id'";
$result=mysqli_query($con,$sql) or die ("error query".mysqli_error());
mysqli_close($con);

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('อัปเดตข้อมูลเสร็จสิ้น');";
	echo "window.location='type.php';";
	echo "</script>";
}else{
	echo "<script type='text/javascript'>";
	echo "alert('อัปเดตข้อมูลผิดพลาด');";
	echo "window.location='type.php';";
	echo "</script>";
}
?>