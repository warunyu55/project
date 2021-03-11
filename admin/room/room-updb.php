<?php
include("../connection/conn.php");
$upload=$_FILES['room_img']['name'];
$upload2=$_FILES['room_img2']['name'];
$upload3=$_FILES['room_img3']['name'];
// print_r($upload2);
// exit();
if(!empty($upload)) {   
$path="../../slide/";  
$remove_these = array(' ','`','"','\'','\\','/','_');
$newname = time().str_replace($remove_these,' ', $_FILES['room_img']['name']);
$path_copy=$path.$newname;
move_uploaded_file($_FILES['room_img']['tmp_name'],$path_copy);  	
}else{
    $newname = $_POST['de_img'];
}
if(!empty($upload2)) {   
$path="../../slide/";  
$remove_these = array(' ','`','"','\'','\\','/','_');
$newname2 = time().str_replace($remove_these,' ', $_FILES['room_img2']['name']);
$path_copy2=$path.$newname2;
move_uploaded_file($_FILES['room_img2']['tmp_name'],$path_copy2);  
}else{
    $newname2 = $_POST['de_img2'];
}
if(!empty($upload3)) {   
$path="../../slide/";  
$remove_these = array(' ','`','"','\'','\\','/','_');
$newname3 = time().str_replace($remove_these,' ', $_FILES['room_img3']['name']);
$path_copy3=$path.$newname3;
move_uploaded_file($_FILES['room_img3']['tmp_name'],$path_copy3);  
}else{
    $newname3 = $_POST['de_img3'];
}		
$id=$_POST['id'];
$room_name=$_POST['room_name'];
$room_detail=$_POST['room_detail'];
$room_price=$_POST['room_price'];
$room_type=$_POST['room_type'];
$room_status = 1;
$sql="UPDATE  tb_room SET room_name='$room_name',room_img='$newname',room_img2='$newname2',
						  room_img3='$newname3',room_detail='$room_detail',room_price='$room_price',room_type='$room_type'
						  WHERE id='$id'";
$result=mysqli_query($con,$sql) or die ("Error in query:".mysqli_error($con));
mysqli_close($con);
if($result){
	echo "<script>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');"; 
    echo "window.location='room.php'";
    echo "</script>";
}else{
	echo "<script>";
    echo "alert('เพิ่มข้อมูลผิดพลาด');"; 
    echo "window.location='room-add.php'";
    echo "</script>";
}
?>