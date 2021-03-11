<?php 
include("include/header.php");
?>
<link rel="stylesheet" href="css/cssbooking.css"> 
<title>Home-Hotel</title>
  <body>
  	<!-- carousel -->
 <?php 
 include("include/navbar.php");
 $sql = "SELECT * FROM tb_room where room_status = 1 ORDER BY rand() limit 3 ";
 $result = mysqli_query($con,$sql);
 $sql2 = "SELECT * FROM tb_gallery";
 $result_gallery = mysqli_query($con,$sql2);
 ?>
 <?php 
  ?>
	<div class="jumbotron text-center text-white" style="background-color:peru;">
		<div class="row">
			<div class="col-12 col-md-6">
				<img src="slide/ภาพวิว11.jpg" width="100%">
			</div>
			<div class="col-12 col-md-6">
    			<h1>ยินดีตอนรับเข้าสู่ Hotel</h1>
				<p>Welcome to Hotel</p>
				<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
				<a href="about-us.php" class="btn btn-primary" style="border-radius:30px;">อ่านต่อเพื่มเติม</a>
			</div>
		</div>
	</div>
	<div class="container">
		<h1 class="font-weight-bold">Rooms & Suites</h1>
			<div class="row justify-content-center">
				<?php
				while($row = mysqli_fetch_assoc($result)){
				?>
					<div class="card my-3 mx-4 col-12 col-md-3">
							<img src="slide/<?php echo $row['room_img'] ?>" height="200px" class="card-img-top mt-2" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title"><?php echo $row['room_name'] ?></h5>
							<p class="card-text">
								<label>ราคา : </label> <?php echo number_format($row['room_price'])?> บาท/คืน<br>
								<label>ประเภทห้องพัก : </label> <?php echo $row['room_type'] ?><br>
							</p>
							<a href="booking-detail.php?id=<?=$row['id']?>" class="btn btn-primary" style="border-radius: 30px;">ดูรายละเอียด</a>
						</div>
					</div>
				<?php }; ?>
			</div>
	</div>
	<div class="jumbotron" style="background-color:peru;">
				<h1 class="display-3 text-center text-white font-weight-bold">Gallery</h1>
		<div class="container page-top jumbotron" style="background-color:whitesmoke;border-radius:10px;">
			<div class="row">
					<?php
						while($row2 = mysqli_fetch_assoc($result_gallery)){
					?>
				<div class="col-lg-4 col-md-4 col-12 thumb">
					<a href="admin/gallery/upload/<?php echo $row2['img_gallery'] ?>" class="fancybox"  rel="ligthbox">
					<img src="admin/gallery/upload/<?php echo $row2['img_gallery'] ?>" class="zoom img-fluid "  alt="">
					</a>
				</div>
						<?php }; ?>
			</div>
		</div>
	</div>
    </div>
<?php 
include('include/footer.php');
?>
<?php 
include('include/script.php');
?>
</body>
</html>