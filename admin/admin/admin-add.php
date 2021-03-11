<?php 
session_start();
?>
<?php if (isset($_SESSION['mem_user'])) { 
        if ($_SESSION['mem_type']=="admin") {  
            include("../include/header.php");
?>
<title>Admin-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>เพิ่มข้อมูลแอดมิน</h1>
                <p>Register Admin</p>
            </div>
        </header>
        <div class="container">
            <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <form action="admin-adddb.php" method="post">
                    <label class="h6">Username :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mem_user" name="mem_user" required
                            placeholder="Username">
                    </div>
                    <label class="h6">Password :</label>
                    <div class="form-group">
                        <input type="password" class="form-control" id="mem_pass" name="mem_pass" required
                            placeholder="Password">
                    </div>
                    <label class="h6">ชื่อ-นามสกุล :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mem_name" name="mem_name" required
                            placeholder="ชื่อ-นามสกุล">
                    </div>
                    <label class="h6">เบอร์ติดต่อ :</label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mem_tel" name="mem_tel" required
                            placeholder="เบอร์ติดต่อ">
                    </div>
                    <label class="h6">ที่อยู่ :</label>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="mem_address" name="mem_address" required
                            placeholder="ที่อยู่"></textarea>
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
}else{header("Location: ../dashboard/index.php");} ?>