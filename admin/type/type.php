<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Type-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>ประเภทห้องพัก</h1>
            </div>
        </header>
            <div class="container">
                <table class="mytable table-hover">
                    <a href="type-add.php" class="btn btn-success"><i class="fas fa-plus"></i></a>
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ประเภท</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <?php
                        $sql="SELECT * FROM tb_type" or die ("EROR ".mysqli_error($con));
                        $result=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td width="30%"><?php echo $row['id'] ?></td>
                        <td width="30%"><?php echo $row['room_type'] ?></td>
                        <td width="20%"><a href="type-update.php?id=<?php echo $row[0] ?>" class="btn btn-warning"><i class='fas fa-edit'></a></td>
                        <td width="20%"><a href="type-del.php?id=<?php echo $row[0] ?>" class="btn btn-danger"><i class='fas fa-trash-alt'></a></td>
                    </tr>
                    <?php };?>
                </table>
            </div>
            <?php 
            include('../include/footer.php');
            include('../include/script.php');
            ?>
    </div>
</body>
</html>
        <?php } else{   
                    echo "<script>";
                    echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                    echo "window.location='../logout.php'";
                    echo "</script>";
                }
}else{ header("Location: ../dashboard/index.php");} ?>