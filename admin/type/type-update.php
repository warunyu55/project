<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Member-Hotel</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php include("../include/navbar.php");?>
            <div class="jumbotron text-center">
                <h1>แก้ไขข้อมูลประเภท</h1>
            </div>
        </header>
            <?php
                if ($_GET["id"]=='') { 
                    echo "<script type='text/javascript'>";
                    echo "alert ('ERROR');";
                    echo "window.location='member.php';";
                    echo "</script>";
                }
                $id=mysqli_real_escape_string($con,$_GET['id']);
                $sql="SELECT * FROM tb_type WHERE id='$id' ";
                $result=mysqli_query($con,$sql) or die ("ERROR ".mysqli_error());
                $row=mysqli_fetch_array($result);
                ?>
            <div class="container">
                <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                    <form action="type-updb.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" hidden
                                value="<?php echo $row['id'] ?>">
                        </div>
                        <label class="h6">Name :</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="room_type" name="room_type" required
                                placeholder="Username" value="<?php echo $row['room_type'] ?>">
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