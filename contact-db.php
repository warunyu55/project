<?php
include("connection/conn.php");
$con_name = $_POST['con_name'];
$con_tel = $_POST['con_tel'];
$con_email = $_POST['con_email'];
$con_detail = $_POST['con_detail'];
$sql = "INSERT into tb_contact(con_name,con_tel,con_email,con_detail)
VALUES ('$con_name','$con_tel','$con_email','$con_detail') ";
$result = mysqli_query($con,$sql) or die ("ERROR : ". mysqli_error());
mysqli_close($con);
if ($result) {
	echo "<script>";
	echo "alert('ส่งข้อมูลสำเร็จ');";
	echo "window.location='contact.php'";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert('ส่งข้อมูลไม่สำเร็จ');";
	echo "window.location='contact.php'";
	echo "</script>";
}
?>