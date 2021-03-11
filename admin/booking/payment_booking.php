<?php 
include("../include/header.php");
session_start();
if ($_SESSION['mem_user'] == "") { 
    header("Location: ../dashboard/index.php");
}
?>
<title>Home-Hotel</title>
<div class="flex-column d-flex w-100 h-100">
    <header class="mb-auto">
        <?php 
        include("../include/navbar.php");
            $id = $_GET['id'];
            $sql_detail = "SELECT * FROM tb_booking LEFT JOIN tb_room ON tb_booking.room_id = tb_room.id LEFT JOIN tb_member ON tb_booking.m_id = tb_member.id WHERE tb_booking.id = '$id'";
            $query_detail = mysqli_query($con,$sql_detail);
            $row_detail = mysqli_fetch_assoc($query_detail);  
        ?>
        <div class="jumbotron text-center">
            <h1>รายการที่# <?=$id?></h1>
        </div>
    </header>
    <div class="container-fluid">
        <div class="card-body">
            <form action="" method="POST">
                <div class="font-weight-bold">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <div class="form-group row justify-content-center">
                        <h3>รายละเอียดการชำระเงิน</h3>
                    </div>
                    <div class="form-group row justify-content-center">
                        <img class="preview" width="250px" height="300px"
                            src="../../upload/<?=$row_detail['payment_pic']?>">
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">จำนวนเงิน : </label>
                        <p class="col-form-label col-7 col-md-3 ml-3"><?=number_format($row_detail['payment_price'])?>
                            บาท</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">เวลาที่ชำระเงิน : </label>
                        <p class="col-form-label col-7 col-md-3 ml-3">
                            <?=date('d/m/Y H:i:s',strtotime($row_detail['payment_datetime']))?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">สถานะ : </label>
                        <?=$row_detail['bk_status'] == 2 ? "<p class='col-form-label col-7 col-md-3 ml-3 text-warning'>กำลังตรวจสอบการชำระเงิน</p>" : "<p class='col-form-label col-7 col-md-3 ml-3'>ชำระเงินแล้ว</p>"?>
                        </p>
                    </div>
                    <div class="form-group text-center">
                        <a href="cancel_booking.php?id=<?=$id?>" class="btn btn-danger">ยกเลิกรายการ</i></a>
                    </div>
                    <hr>

                    <div class="form-group row justify-content-center">
                        <h3>ข้อมูลการจอง</h3>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">ชื่อ - นามสกุล :</label>
                        <p class="col-form-label col-7 col-md-3 ml-3"><?=$row_detail['mem_name']?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">ห้อง :</label>
                        <p class="col-form-label col-7 col-md-3 ml-3"><?=$row_detail['room_name']?></p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">จำนวนเงิน :</label>
                        <p class="col-form-label col-7 col-md-3 ml-3"><?=number_format($row_detail['bk_price'])?> บาท
                        </p>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-5 text-right">วันที่เข้าพัก :</label>
                        <p class="col-form-label col-7 col-md-3 ml-3">
                            <?=date('d/m/Y',strtotime($row_detail['bk_datefrom']))?> -
                            <?=date('d/m/Y',strtotime($row_detail['bk_dateto']))?></p>
                    </div>
                    <div class="row justify-content-center mb-2">
                        <input type="submit" class="btn btn-primary" name="payment" value="ยืนยันการชำระเงิน">
                        <a href="booking.php" class="btn btn-danger">ย้อนกลับ</i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
include('../include/footer.php');
include('../include/script.php');
?>
</div>
</body>
</html>
    <?php
if(isset($_GET['cancel'])&& !empty($_GET['cancel'])){
    $cancel_id = $_GET['cancel'];
    $status = 4;
    $sql_cancel = "UPDATE tb_booking SET bk_status = '$status' WHERE id = '$cancel_id'";
    $query_cancel = mysqli_query($con,$sql_cancel);
    if($query_cancel){
      echo "<script>";
      echo "alert('ยกเลิกรายการเรียบร้อยแล้ว');";
      echo "window.location='info.php'";
      echo "</script>";
    }
    mysqli_close($con);
  }

if(isset($_POST['payment'])&& !empty($_POST['payment'])){
    $id = $_POST['id'];
    $status = 3;
    $sql_cancel = "UPDATE tb_booking SET bk_status = '$status' WHERE id = '$id'";
    $query_cancel = mysqli_query($con,$sql_cancel);
    if($query_cancel){
      echo "<script>";
      echo "alert('ยืนยันการชำระเงินแล้ว');";
      echo "window.location='booking.php'";
      echo "</script>";
    }
    mysqli_close($con);
}
?>