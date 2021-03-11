<?php
include('../connection/conn.php');
$id = $_GET['id'];
$sql_check = "SELECT * FROM tb_room WHERE id = '$id' and room_status = 0";
$query_check = mysqli_query($con,$sql_check);
if($num_row = mysqli_num_rows($query_check)>0){
        $room_status = 1;
        $sql = "UPDATE tb_room SET room_status = '$room_status' WHERE id = '$id'";
        $query = mysqli_query($con,$sql);
        if($query){
            echo "<script>";
            echo "alert('สถานะ : เปิดใช้งาน');";
            echo "window.history.back()";
            echo "</script>";
        }
}else{
    $room_status = 0;
    $sql = "UPDATE tb_room SET room_status = '$room_status' WHERE id = '$id'";
    $query = mysqli_query($con,$sql);
    if($query){
        echo "<script>";
        echo "alert('สถานะ : ปิดใช้งาน');";
        echo "window.history.back()";
        echo "</script>";
    }
}
?>