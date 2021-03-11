<?php 
include("include/header.php");
?>
<title>Home-Hotel</title>

<body>
    <!-- carousel -->
    <?php 
include("include/navbar.php");
$m_id = $_SESSION['m-id'];
$id = $_GET['id'];
$sql = "SELECT * FROM tb_booking LEFT JOIN tb_room ON tb_booking.room_id = tb_room.id LEFT JOIN tb_member ON tb_booking.m_id = tb_member.id WHERE tb_booking.id = '$id'";
$query=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="jumbotron text-center">
        <h1>รายการที่# <?=$id?></h1>
    </div>
    <div class="container-fluid">
        <div class="card-body">
            <?php if($row['bk_status'] == 0){ ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id?>">
                <div class="form-group row justify-content-center">
                    <img class="preview" width="250px" height="300px" src="upload/default.jpg">
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4 text-right">อัปโหลดรูป : </label>
                    <div class="col-7 col-md-4">
                        <input type="file" name="payment_pic" required class="custom-file-input"
                            onchange="preview(this);">
                        <label class="custom-file-label">เลือกรูป</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4 text-right">จำนวนเงิน : </label>
                    <input type="text" required class="form-control col-7 col-md-4" name="payment_price">
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-4 text-right">เวลาที่ชำระเงิน : </label>
                    <input type="datetime-local" required name="paymend_datetime"
                        class="form-control col-7 col-md-4">
                </div>
                <div class="row justify-content-center mb-2">
                    <input class="btn btn-primary" type="submit" name="payment" value="ยืนยัน">
                    <a href="info.php" class="btn btn-danger">ย้อนกลับ</i></a>
                </div>
            </form>
            <?php }elseif($row['bk_status'] == 1){  ?>
            <div class="form-group text-center">
                <div class="font-weight-bold">
                    <h2 class="text-danger">รายการถูกยกเลิก</h2><br>
                        <div class="form-group row">
                            <label class="col-form-label col-5 text-right">ชื่อ - นามสกุล :</label>
                            <p class="col-form-label col-7 col-md-3"><?=$row['mem_name']?></p>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-5 text-right">ห้อง :</label>
                            <p class="col-form-label col-7 col-md-3"><?=$row['room_name']?></p>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-5 text-right">จำนวนเงิน :</label>
                            <p class="col-form-label col-7 col-md-3"><?=number_format($row['bk_price'])?>
                                บาท</p>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-5 text-right">วันที่เข้าพัก :</label>
                            <p class="col-form-label col-7 col-md-3">
                                <?=date('d/m/Y',strtotime($row['bk_datefrom']))?> -
                                <?=date('d/m/Y',strtotime($row['bk_dateto']))?></p>
                        </div>
                        <hr>
                        <h2 class="text-danger">*หมายเหตุ*</h2><br>
                        <p class="col-form-label text-center"><?=$row['cancel_detail']?></p>
                        <a href="info.php" class="btn btn-danger">ย้อนกลับ</i></a>
                    </div>
                </div>
                <?php }elseif($row['bk_status'] == 2||$row['bk_status']==3){ ?>
                <div class="font-weight-bold">
                    <div class="form-group row justify-content-center">
                        <h3>รายละเอียดการชำระเงิน</h3>
                    </div>
                    <div class="form-group row justify-content-center">
                        <img class="preview" width="250px" height="300px" src="upload/<?=$row['payment_pic']?>">
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">จำนวนเงิน : </label>
                        <p class="col-form-label col-7 col-md-3"><?=number_format($row['payment_price'])?> บาท</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">เวลาที่ชำระเงิน : </label>
                        <p class="col-form-label col-7 col-md-3">
                            <?=date('d/m/Y H:i:s',strtotime($row['payment_datetime']))?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">สถานะ : </label>
                        <?=$row['bk_status'] == 2 ? "<p class='col-form-label col-7 col-md-3 text-warning'>กำลังตรวจสอบการชำระเงิน</p>" : "<p class='col-form-label col-7 col-md-3 text-success'>ชำระเงินแล้ว</p>"?>
                        </p>
                    </div>
                    <hr>

                    <div class="form-group row justify-content-center">
                        <h3>ข้อมูลการจอง</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">ชื่อ - นามสกุล :</label>
                        <p class="col-form-label col-7 col-md-3"><?=$row['mem_name']?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">ห้อง :</label>
                        <p class="col-form-label col-7 col-md-3"><?=$row['room_name']?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">จำนวนเงิน :</label>
                        <p class="col-form-label col-7 col-md-3"><?=number_format($row['bk_price'])?> บาท
                        </p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">วันที่เข้าพัก :</label>
                        <p class="col-form-label col-7 col-md-3">
                            <?=date('d/m/Y',strtotime($row['bk_datefrom']))?> -
                            <?=date('d/m/Y',strtotime($row['bk_dateto']))?></p>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <a href="info.php" class="btn btn-danger">ย้อนกลับ</i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- end content -->
        <!-- footer -->
        <script>
            function preview(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <?php 
include('include/footer.php');
include('include/script.php');
?>
</body>

</html>
<?php 
if(isset($_POST['payment'])&&!empty($_POST['payment'])){
    $id = $_POST['id'];
    $bk_status = 2;
    $payment_pic = $_FILES['payment_pic']['name'];
    $payment_price = $_POST['payment_price'];
    $payment_datetime = $_POST['paymend_datetime'];
    $filename = time('now').$payment_pic;
    $path = "upload/".$filename;
    move_uploaded_file($_FILES['payment_pic']['tmp_name'],$path);
    $sql_payment = "UPDATE tb_booking SET payment_pic='$filename',payment_price='$payment_price',payment_datetime='$payment_datetime',bk_status='$bk_status' WHERE id = '$id'";
    $query_payment = mysqli_query($con,$sql_payment) or die('ERROR :'.mysqli_error($con));
    if($query_payment){
        echo "<script>";
        echo "alert('ชำระเงินเสร็จสิ้น กรุณารอผู้ดูแลระบบตรวจสอบข้อมูล');";
        echo "window.location='info.php'";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('เกิดข้อผิดพลาด');";
        echo "</script>";
    }
}
?>