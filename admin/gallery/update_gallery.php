<?php 
session_start();
if (isset($_SESSION['mem_user'])) { 
     if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
<title>Gallery</title>
    <div class="flex-column d-flex w-100 h-100">
        <header class="mb-auto">
            <?php 
            include("../include/navbar.php");
            $id = $_GET['id'];
            ?>
            <div class="jumbotron text-center mt-1">
                <H1>Gallery</H1>
            </div>
        </header>
        <div class="container text-center pb-5">
            <div class="card">
                <div class="card-body">
                    <form action="update_gallerydb.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$id?>">
                        </div>
                        <div class="form-group">
                            <label for="">ภาพตัวอย่าง</label>
                        </div>
                        <div class="form-group">
                            <img class="preview" width="400px" class="form-control" height="350px" src="upload/demo.png"alt="">
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-md-center">
                                <div class="col-6">
                                    <input type="file" name="img_gallery" required onchange="preview(this);"
                                        class="custom-file-input">
                                    <label class="custom-file-label">เลือกรูปภาพ</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" style="border-radius: 20px;">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <?php 
            include('../include/footer.php');
            include('../include/script.php');
            ?>
            <script type="text/javascript">
                function preview(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('.preview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
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