<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<?php
    if(isset($_GET['cancel'])&&!empty($_GET['cancel'])){
    $cancel_id = $_GET['cancel'];
    $sql_del = "DELETE FROM tb_booking WHERE id = '$cancel_id'";
    $query = mysqli_query($con,$sql_del);
        if($query){
        echo "<script>";
        echo "alert('ลบข้อมูลเสร็จสิ้น');";
        echo "window.location='booking.php'";
        echo "</script>";
        }
    }
?>
<title>Booking</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>รายการจองห้องพัก</h1>
            </div>
        </header>
        <div class="table-responsive">
            <div class="container">
                <table class="mytable table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>ลำดับ</th>
                            <th>ชื่อผู้จอง</th>
                            <th>ห้อง</th>
                            <th>ราคา</th>
                            <th>วันที่เช็คอิน</th>
                            <th>วันที่เช็คเอ้า</th>
                            <th>สถานะ</th>
                        </tr>
                    </thead>
                    <?php
                        $sql="SELECT *,tb_booking.id FROM tb_booking LEFT JOIN tb_member ON tb_booking.m_id = tb_member.id LEFT JOIN tb_room ON tb_booking.room_id = tb_room.id"  or die ("EROR ".mysqli_error($con));
                        $result=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                    ?>
                    <tr class="text-center">
                        <td class="align-middle"><?php echo $row['id'] ?></td>
                        <td class="align-middle"><?php echo $row['mem_name'] ?></td>
                        <td class="align-middle"><?php echo $row['room_name'] ?></td>
                        <td class="align-middle"><?php echo number_format($row['bk_price']) ?></td>
                        <td class="align-middle"><?php echo date('d-m-Y',strtotime($row['bk_datefrom'])) ?></td>
                        <td class="align-middle"><?php echo date('d-m-Y',strtotime($row['bk_dateto'])) ?></td>
                        <?php 
                            if($row['bk_status'] == 0) { 
                                echo "<td class='text-warning'>รอชำระเงิน</td>";
                            }elseif($row['bk_status'] == 2){
                                echo "<td><a href='payment_booking.php?id=".$row['id']."' class='text-info'>ตรวจสอบการชำระเงิน</a></td>";
                            }elseif($row['bk_status'] == 3){
                                echo "<td class='text-success'>จองสำเร็จแล้ว</td>";
                            }else{
                                echo "<td class='text-danger'><a href='?cancel=".$row['id']."'class='text-danger' onclick='return confirm(\"ต้องการลบข้อมูลใช่หรือไม่\")'>ลบรายการจองที่ถูกยกเลิก</a></td>";
                            }
                        ?>
                    </tr>
                    <?php };?>
                </table>
            </div>
        </div>
        <?php 
        include('../include/footer.php');
        include('../include/script.php');
        ?>
    </div>
</body>
</html>
<?php }else{   
        echo "<script>";
        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
        echo "window.location='../logout.php'";
        echo "</script>";
        }
}else{ header("Location: ../dashboard/index.php");} ?>