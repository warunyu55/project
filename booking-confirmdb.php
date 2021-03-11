<?php 
include('connection/conn.php');
// print_r($_POST);
// exit();
$room_id = $_POST['room_id'];
$m_id = $_POST['m_id'];
$bk_price = $_POST['bk_price'];
$bk_datefrom = date('Y-m-d',strtotime($_POST['bk_datefrom']));
$bk_dateto = date('Y-m-d',strtotime($_POST['bk_dateto']));
$sql = "INSERT into tb_booking(room_id,m_id,bk_price,bk_datefrom,bk_dateto)VALUES('$room_id','$m_id','$bk_price','$bk_datefrom','$bk_dateto')";
$query = mysqli_query($con,$sql);
if($query){
    echo "<script>";
    echo "alert('จองเรียบร้อยแล้ว');"; 
    echo "window.location='booking.php'";
    echo "</script>";
}else{
	echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');"; 
    echo "window.history.back()";
    echo "</script>";
}
?>