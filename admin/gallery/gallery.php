<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Gallery</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>แกลเลอรี่</h1>
            </div>
        </header>
        <div class="container">
            <table class="mytable table-hover text-center">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ภาพ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <?php
                        $sql="SELECT * FROM tb_gallery" or die ("EROR ".mysqli_error($con));
                        $result=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                        ?>
                <tr>
                    <td width="20%"><?php echo $row['id'] ?></td>
                    <td width="60%"><img src="upload/<?php echo $row['img_gallery'] ?>" height="300px" width="50%" alt="">
                    </td>
                    <td width="20%"><a href="update_gallery.php?id=<?php echo $row[0] ?>" class="btn btn-warning"><i
                                class='fas fa-edit'></a></td>
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
<?php }else{   
                    echo "<script>";
                    echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
                    echo "window.location='../logout.php'";
                    echo "</script>";
                }
}else{ header("Location: ../dashboard/index.php");} ?>