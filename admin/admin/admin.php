<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Admin-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>ยินดีตอนรับเข้าสู่ระบบแอดมิน</h1>
                <p>Welcome to Manage admin</p>
            </div>
        </header>
        <div class="container">
            <a href="admin-add.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
            <div class="table-responsive">
                <table class="mytable table table-hover" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>ชื่อ - นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ที่อยู่</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                        $sql="SELECT * FROM tb_member Where mem_type='admin' Order by id  asc " or die ("Error".mysqli_error($con));
                        $result = mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tbody>
                        <tr>
                            <td class="align-middle"><?php echo $row['id'];?></td>
                            <td class="align-middle"><?php echo $row['mem_user'];?></td>
                            <td class="align-middle"><?php echo $row['mem_pass'];?></td>
                            <td class="align-middle"><?php echo $row['mem_name'];?></td>
                            <td class="align-middle"><?php echo $row['mem_tel'];?></td>
                            <td class="align-middle"><?php echo $row['mem_address'];?></td>
                            <td class="align-middle">
                                <a href='admin-up.php?id=<?php echo $row[0]?>' class='btn btn-warning' style='color:white'><i
                                        class='fas fa-edit'></i></a>
                            </td>
                            <td class="align-middle">
                                <a href="admin-del.php?id=<?php echo $row[0]?>" class='btn btn-danger'
                                    onclick="return confirm('ต้องการลบข้อมูลใช่หรือไม่? !!!')"><i
                                        class='fas fa-trash-alt'></i></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
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
}else{header("Location: ../dashboard/index.php");} ?>