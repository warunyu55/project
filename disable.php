<?php 
include('connection/conn.php');
$id = $_POST['id'];
$sql = "SELECT * FROM tb_booking WHERE room_id = '$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
$datefrom = array();
// $dateto = array();
// print_r($_POST['date']);
// exit();
foreach($query as $value){
    // echo $_POST['date'];
    // echo $_POST['date'].' >= '.$value['bk_datefrom'] .'&&'.$_POST['date'].'<='.$value['bk_dateto'];
    // if($_POST['date'] >= $value['bk_datefrom'] && $_POST['date'] <= $value['bk_dateto']){
        // echo "disabled";

    // }
    // array_push($datefrom,$value['bk_datefrom']);
    // array_push($dateto,$value['bk_dateto']);
}
echo 't';
// echo json_encode(array("datefrom"=>$datefrom,"dateto"=>$dateto));
exit();

?>