<?php
include("../connection/conn.php");
// print_r($_POST);
// exit();
// $room_img=$_REQUEST['room_img'];
$upload=$_FILES['room_img'];
// $room_img2=$_REQUEST['room_img2'];
$upload2=$_FILES['room_img2'];
// $room_img3=$_REQUEST['room_img3'];
$upload3=$_FILES['room_img3'];

if($upload <> '') {   
$path="../../slide/";  

$remove_these = array(' ','`','"','\'','\\','/','_');
$newname = str_replace($remove_these, '', $_FILES['room_img']['name']);
$path_copy=$path.$newname;
move_uploaded_file($_FILES['room_img']['tmp_name'],$path_copy);  	
}
if($upload2 <> '') {   
$path="../../slide/";  

$remove_these = array(' ','`','"','\'','\\','/','_');
$newname2 = str_replace($remove_these, '', $_FILES['room_img2']['name']);
$path_copy2=$path.$newname2;
move_uploaded_file($_FILES['room_img2']['tmp_name'],$path_copy2);  
}
if($upload3 <> '') {   
$path="../../slide/";  

$remove_these = array(' ','`','"','\'','\\','/','_');
$newname3 = str_replace($remove_these, '', $_FILES['room_img3']['name']);
$path_copy3=$path.$newname3;
move_uploaded_file($_FILES['room_img3']['tmp_name'],$path_copy3);  
}
	



// }
// if ($_POST) {
// 	if (isset($_FILES['room_img1'])) {
// 		$name_file = $_FILES['room_img1']['name'];
// 		$tmp_name = $_FILES['room_img1']['tmp_name'];
// 		$location_img = "../../slide/";
// 		move_uploaded_file($tmp_name,$location_img.$name_file);
// 	printf($_FILES['room_img1']);
// 	exit();

// 	}
// }
	
	
		

$room_name=$_POST['room_name'];
// $room_img1=$_POST['room_img1'];
// $room_img2=$_POST['room_img2'];
// $room_img3=$_POST['room_img3'];
$room_detail=$_POST['room_detail'];
$room_price=$_POST['room_price'];
$room_type=$_POST['room_type'];

$sql="INSERT into tb_room(room_name,room_img,room_img2,room_img3,room_detail,room_price,room_type)
VALUES('$room_name','$newname','$newname2','$newname3','$room_detail','$room_price','$room_type')";

$result=mysqli_query($con,$sql) or die ("Error in query:".mysqli_error());

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