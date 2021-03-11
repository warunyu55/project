<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Room-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>รายการห้องพัก</h1>
                <p>Manage Room</p>
            </div>
        </header>
        <div class="container">
            <a href="room-add.php" class="btn btn-success ml-2 mb-4"><i class="fas fa-plus"></i></a>
            <table class="mytable text-center">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อห้อง</th>
                        <th>รูปภาพ</th>
                        <th>ข้อมูล</th>
                        <th>ราคา</th>
                        <th>ประเภท</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <?php
                    $sql="SELECT * FROM tb_room" or die ("ERROR ".mysqli_error($con));
                    $result=mysqli_query($con,$sql);
                    while ($row=mysqli_fetch_assoc($result)) {
                    ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['room_name'] ?></td>
                    <td class="text-center" width="20%"><img src="../../slide/<?php echo $row['room_img'] ?>"
                            width="100%"></td>
                    <td><?php echo $row['room_detail'] ?></td>
                    <td><?php echo number_format($row['room_price']) ?></td>
                    <td><?php echo $row['room_type'] ?></td>
                    <?php echo $row['room_status'] == 0 ? "<td width='15%'><a href='room-statusdb.php?id=$row[id]' style='color:red;' >ปิดการใช้งาน</a></td>" : "<td><a href='room-statusdb.php?id=$row[id]' style='color:green;'>เปิดการใช้งาน</a></td>"?>
                    <td>
                        <a href="room-up.php?id=<?php echo $row['id']?>" class="btn btn-warning"><i
                                class='fas fa-edit'></i></a>
                        <a href="room-del.php?id=<?php echo $row['id']?>" class="btn btn-danger"
                            onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่')"><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>
                <?php }?>
            </table>
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