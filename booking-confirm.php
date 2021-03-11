
<?php 
include("include/header.php");
?>
<title>Room</title>
<body>
<?php 
include("include/navbar.php");
?>
<?php 
if(empty($_SESSION['m-mem_user'])){
    echo "<script>";
    echo "alert('กรุณาเข้าสู่ระบบ');";
    echo "window.history.back()";
    echo "</script>";
}

$daterange = $_POST['daterange'];
$m_id = $_POST['m_id'];
$room_id = $_POST['room_id'];
$bk_datefrom=$_POST['bk_datefrom'];
$bk_dateto=$_POST['bk_dateto'];
// sum price
$start = strtotime($bk_datefrom);
$end = strtotime($bk_dateto);
$sumdate = abs($end - $start);
$count = $sumdate/86400;
$bk_price = $_POST['bk_price'];
$totalprice = $bk_price*$count;
// 
$sql = "SELECT * FROM tb_room WHERE id = '$room_id'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_assoc($query);
?>
<div class="container">

    <div class="jumbotron mt-4" style="background-color:darksalmon;border-radius:10px">
    <h2 class="text-center font-weight-bold text-white mb-5">ยืนยันการจองห้องพัก</h2>
        <form action="booking-confirmdb.php" method="post">
            <div class="card">
                <div class="card-body font-weight-bold">
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-3"><label class="col-form-label">ชื่อ - นามสกุล :</label></div>
                        <div class="col-12 col-md-3"><label class="col-form-label"><?=$_SESSION['m-mem_name']?></label></div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-3"><label class="col-form-label">ห้อง :</label></div>
                        <div class="col-12 col-md-3"><label class="col-form-label"><?=$result['room_name']?></label></div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-3"><label class="col-form-label">ราคารวม :</label></div>
                        <div class="col-12 col-md-3"><label class="col-form-label"><?=number_format($totalprice)?> บาท</label></div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-12 col-md-3"><label class="col-form-label">วันที่เข้าพัก :</label></div>
                        <div class="col-12 col-md-3"><label class="col-form-label"><?=$daterange?></label></div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="m_id" value="<?=$m_id?>">
            <input type="hidden" name="room_id" value="<?=$room_id?>">
            <input type="hidden" name="bk_price" value="<?=$totalprice?>">
            <input type="hidden" name="bk_datefrom" value="<?=$bk_datefrom?>">
            <input type="hidden" name="bk_dateto" value="<?=$bk_dateto?>">
            <div class="form-group row justify-content-center mt-5">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
                <a href="booking.php" class="btn btn-danger" onclick="return confirm('ต้องการยกเลิกใช่หรือไม่ ?')">ยกเลิก</a>
            </div>
        </form>
    </div>
</div>
<?php 
include('include/footer.php');
?>
<?php 
include('include/script.php');
?>
</body>
</html>
