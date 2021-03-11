<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
        ?>
<title>Room-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php 
            include("../include/navbar.php");
            $sql="SELECT * FROM tb_type";
            $query=mysqli_query($con,$sql);
            ?>
            <div class="jumbotron text-center">
                <h1>เพิ่มข้อมูลห้องพัก</h1>
            </div>
        </header>
        <div class="container">
            <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <form action="room-adddb.php" method="post" enctype="multipart/form-data">
                    <label class="h6">Name :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="room_name" name="room_name" required
                            placeholder="name">
                    </div>
                    <label class="h6">Image 1 :</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="room_img" name="room_img">
                    </div>
                    <label class="h6">Image 2 :</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="room_img2" name="room_img2">
                    </div>
                    <label class="h6">Image 3 :</label>
                    <div class="form-group">
                        <input type="file" class="form-control" id="room_img3" name="room_img3">
                    </div>
                    <label class="h6">Detail :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="room_detail" name="room_detail" required
                            placeholder="Detail">
                    </div>
                    <label class="h6">Price :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="room_price" name="room_price" required
                            placeholder="Price">
                    </div>
                    <label class="h6">Type :</label>
                    <div class="form-group">
                        <select id="room_type" class="form-control" name="room_type">
                            <?php while ($row=mysqli_fetch_array($query)) { ?>
                            <option id="room_type" name="room_type" required>
                                <?php echo $row['room_type'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="">
                        <input class="btn btn-outline-primary" type="submit" name="" value="ยืนยัน">
                        <input class="btn btn-outline-danger" type="reset" name="" value="ยกเลิก">
                    </div>
                    <br>
                </form>
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
                    echo "window.location='logout.php'";
                    echo "</script>";
                }
}else{ header("Location: ../dashboard/index.php");} ?>