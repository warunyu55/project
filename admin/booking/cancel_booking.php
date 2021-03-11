<?php 
include("../include/header.php");
session_start();
if ($_SESSION['mem_user'] == "") { 
    header("Location: ../dashboard/index.php");
}
if(isset($_POST['cancel'])&& !empty($_POST['cancel'])){
    $cancel_id = $_POST['id'];
    $status = 1;
    $cancel_detail = $_POST['cancel_detail'];
    $sql_cancel = "UPDATE tb_booking SET bk_status = '$status',cancel_detail = '$cancel_detail' WHERE id = '$cancel_id'";
    $query_cancel = mysqli_query($con,$sql_cancel);
    if($query_cancel){
      echo "<script>";
      echo "alert('ยกเลิกรายการเรียบร้อยแล้ว');";
      echo "window.location='ิbooking.php'";
      echo "</script>";
    }
    mysqli_close($con);
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
                <h1>ยกเลิกรายการที่# <?=$id?></h1>
            </div>
        </header>
            <div class="container-fluid">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="font-weight-bold">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="form-group row justify-content-center">
                                <h3>หมายเหตุ</h3>
                            </div>
                            <div class="form-group row justify-content-center">
                                <textarea class="form-control col-8" name='cancel_detail'placeholder="กรุณาระบุหมายเหตุที่ยกเลิกรายการนี้"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger" type="submit" name="cancel" value="cancel">ยืนยันการยกเลิกรายการ</button>
                                <a href="payment_booking.php?id=<?=$id?>" class="btn btn-primary">ย้อนกลับ</a>
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
