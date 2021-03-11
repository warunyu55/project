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
                <h1>แก้ไขข้อมูลสมาชิก</h1>
                <p>Edit member</p>
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
                $sql="SELECT * FROM tb_room WHERE id='$id' ";
                $result=mysqli_query($con,$sql) or die ("ERROR ".mysqli_error($con));
                $row=mysqli_fetch_array($result);
                extract($row);
                ?>
            <div class="container">
                <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                    <form action="room-updb.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id" name="id" hidden value="<?php echo $id ?>">
                        </div>
                        <label class="h6">Name :</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="room_name" name="room_name" required
                                placeholder="Name" value="<?php echo $room_name ?>">
                        </div>
                        <label class="h6">Image1 :</label>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $room_img ?>" name="de_img">
                            <img src="../../slide/<?php echo $room_img ?>" width="100%">
                            <input type="file" class="form-control" id="room_img" name="room_img"
                                placeholder="Password" value="<?php echo $room_img ?>" width="100%">
                        </div>
                        <label class="h6">Image2 :</label>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $room_img2 ?>" name="de_img2">
                            <img src="../../slide/<?php echo $room_img2 ?>" width="100%">
                            <input type="file" class="form-control" id="room_img2" name="room_img2"
                                placeholder="Password" value="<?php echo $room_img2 ?>">
                        </div>
                        <label class="h6">Image3 :</label>
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $room_img3 ?>" name="de_img3">
                            <img src="../../slide/<?php echo $room_img3 ?>" width="100%">
                            <input type="file" class="form-control" id="room_img3" name="room_img3"
                                placeholder="Password" value="<?php echo $room_img3 ?>">
                        </div>
                        <label class="h6">Detail :</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="room_detail" name="room_detail" required
                                placeholder="Detail" value="<?php echo $room_detail ?>">
                        </div>
                        <label class="h6">Price :</label>
                        <div class="form-group">
                            <input type="text" class="form-control" id="room_price" name="room_price" required
                                placeholder="Price" value="<?php echo $room_price ?>">
                        </div>
                        <label class="h6">Type :</label>
                        <div class="form-group">
                            <select id="room_type" name="room_type" required class="form-control">
                                <option name="room_type" value="">กรุณาระบุประเภทห้อง</option>
                                <?php 
                                $sql2="SELECT * FROM tb_type";
                                $result2=mysqli_query($con,$sql2);
                                while ($row2 = mysqli_fetch_array($result2)) { ?>
                                <option id="room_type" name="room_type"
                                    value="<?php echo $row2['room_type'] ?>"><?php echo $row2['room_type'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="row justify-content-center">
                            <input class="btn btn-primary" type="submit" name="" value="ยืนยัน">
                            <input class="btn btn-danger" type="reset" name="" value="ยกเลิก">
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