<?php
include('../connection/conn.php');  
$id = $_REQUEST["id"];
$sql = "DELETE FROM tb_room WHERE id='$id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลเสร็จสิ้น');";
	echo "window.location = 'room.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error ทำการลบข้อมูลใหม่อีกครั้ง');";
	echo "window.location = 'room.php'; ";
	echo "</script>";
}
?>