<?php
include("../connection/conn.php");
$room_type=$_POST['room_type'];
$sql="INSERT into tb_type(room_type)
VALUES('$room_type')";
$result=mysqli_query($con,$sql) or die ("Error in query:".mysqli_error());
mysqli_close($con);
if($result){
    echo "<script>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');"; 
    echo "window.location='type.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('เพิ่มข้อมูลผิดพลาด');"; 
    echo "window.location='type-add.php'";
    echo "</script>";
}
?>