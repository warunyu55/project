<?php 
include("include/header.php");
?>
<title>Register-Hotel</title>
  <body>
  	<!-- carousel -->
 <?php 
 include("include/navbar.php");
 ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="jumbotron text-center">
    			<h1>สมัครสมาชิก</h1>
    			<p>Register Here</p>
    		</div>
    <div class="container" >
        <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3" >
            <form action="register-db.php" method="post">
                <label class="h6">Username <em class="text-danger">*</em> :</label>
                <div class="form-group text-center">
                    <input type="text" class="form-control" id="mem_user" name="mem_user" required placeholder="Username">
                </div>
                <label class="h6">Password <em class="text-danger">*</em> :</label>
                <div class="form-group text-center">
                    <input type="password" class="form-control" id="mem_pass" name="mem_pass" required placeholder="Password">
                </div>
                <label class="h6">ชื่อ-นามสกุล <em class="text-danger">*</em> :</label>
                <div class="form-group text-center">
                    <input type="text" class="form-control" id="mem_name" name="mem_name" required placeholder="ชื่อ-นามสกุล">
                </div>
                <label class="h6">เบอร์ติดต่อ <em class="text-danger">*</em> :</label>
                <div class="form-group text-center">
                    <input type="text" class="form-control" id="mem_tel" name="mem_tel" required placeholder="เบอร์ติดต่อ">
                </div>
                <label class="h6">ที่อยู่ <em class="text-danger">*</em> :</label>
                <div class="form-group text-center">
                    <textarea type="text" class="form-control" id="mem_address" name="mem_address" required placeholder="ที่อยู่"></textarea>
                </div>
                <div class="form-group text-center">
                    <input class="btn btn-primary" type="submit" name="" value="ยืนยัน">
                    <input class="btn btn-danger" type="reset" name="" value="ยกเลิก">
                </div>
                <br>
            </form>
            </div>
    </div>
    	
	<!-- end content -->
	<!-- footer -->
<?php 
include('include/footer.php');
?>
	<!-- end footer -->
<?php 
include('include/script.php');
?>
    
  </body>
</html>