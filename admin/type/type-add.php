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
                <h1>เพิ่มข้อมูลห้องพัก</h1>
            </div>
        </header>
        <div class="container">
            <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <form action="type-adddb.php" method="post">
                    <label class="h6">Name :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="room_type" name="room_type" required
                            placeholder="typename">
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
            echo "window.location='../logout.php'";
            echo "</script>";
            }
}else{ header("Location: ../dashboard/index.php");} ?>