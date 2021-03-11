<?php 
include('../connection/conn.php');
$id = $_POST['id'];
$img = $_FILES['img_gallery']['name'];
$path_img = "upload/".$img;
move_uploaded_file($_FILES['img_gallery']['tmp_name'],$path_img);
$sql = "UPDATE tb_gallery SET img_gallery = '$img' WHERE id = '$id'";
$query = mysqli_query($con,$sql);
if($query){
    echo "<script>";
    echo "alert('อัปเดตรูปภาพสำเร็จ');";
    echo "window.location='gallery.php'";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.history.back()'";
    echo "</script>";
}
?>