<?php
include("../connection/conn.php");
$mem_user=$_POST['mem_user'];
$mem_pass=$_POST['mem_pass'];
$mem_name=$_POST['mem_name'];
$mem_tel=$_POST['mem_tel'];
$mem_address=$_POST['mem_address'];
$sql="INSERT into tb_member(mem_user,mem_pass,mem_name,mem_tel,mem_address,mem_type)
VALUES('$mem_user','$mem_pass','$mem_name','$mem_tel','$mem_address','admin')";
$result=mysqli_query($con,$sql) or die ("Error in query:".mysqli_error());
mysqli_close($con);
if($result){
	echo "<script>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');"; 
    echo "window.location='admin.php'";
    echo "</script>";
}else{
	echo "<script>";
    echo "alert('เพิ่มข้อมูลผิดพลาด');"; 
    echo "window.location='admin-add.php'";
    echo "</script>";
}
?>