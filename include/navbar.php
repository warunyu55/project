<nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
    	<a class="navbar-brand ml-3 mr-3 font-weight-bold" href="index.php">Hotel</a>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1"
		    aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		   </button>

		   <div class="collapse navbar-collapse" id="nav1">
		   	<ul class="navbar-nav mr-auto">
		   		<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="about-us.php">About Us</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="booking.php">Booking</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="contact.php">Contact Us</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="register.php">Register</a>
		   		</li>
		   	</ul>
		   	<?php 
		   	if (isset($_SESSION['m-mem_user'])) {
		   		if ($_SESSION['m-mem_type']=="member") {
		   			$mem_name = $_SESSION['m-mem_name'];
		   		echo "<ul class='navbar-nav ml-auto'>";
		   		echo 	"<li class='nav-item'>";
		   		echo 		"<a class='nav-link text-white' href='info.php'><i class='fas fa-user mr-1'></i>$mem_name</a>";
		   		echo 	"</li>";

		   		echo 	"<li class='nav-item'>";
		   		echo		"<a class='nav-link text-white' href='logout.php'><i class='fas fa-unlock mr-1'></i>Logout</a>";
		   		echo 	"</li>";

		   		echo "</ul>";
		   		}else{
		   			echo "<script>";
        			echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
        			echo "window.location='logout.php'";
        			echo "</script>";
		   		}
		   	}else{
		   		echo "<ul class='navbar-nav ml-auto'>";
		   		echo "<li class='nav-item'>";
		   		echo	"<a class='nav-link text-white' data-toggle='modal' data-target='#modalLoginForm' href=''><i class='fas fa-lock mr-1'></i>Login</a>";
		   		echo "</li>";
		   		echo "</ul>";
		   	}
		   	?>
		   </div>
</nav> 	
<!-- หน้าต่างสไลด์ -->
	 <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
		  <ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
		  </ul>

  <!-- The slideshow -->
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="slide/img1.jpg" alt="hotel">
		    </div>
		    <div class="carousel-item">
		      <img src="slide/img1.jpg" alt="Chicago">
		    </div>
		    <div class="carousel-item">
		      <img src="slide/img1.jpg" alt="New York">
		    </div>
		  </div>

  <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#demo" data-slide="prev">
		    <span class="carousel-control-prev-icon"></span>
		  </a>
		  <a class="carousel-control-next" href="#demo" data-slide="next">
		    <span class="carousel-control-next-icon"></span>
		  </a>

	</div>
	<!-- end carousel -->
	<!-- navbar -->
    
<form action="login-db.php" method="post">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
		    <div class="modal-header text-center">
		        <h4 class="modal-title w-100 font-weight-bold">Login</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		    </div>
	      	<div class="modal-body mx-3">
		        <div class="md-form mb-5">
		          <i class="fas fa-user prefix grey-text"></i>
		          <input type="text" id="mem_user" name="mem_user" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="mem_user">Username</label>
		        </div>

		        <div class="md-form mb-4">
		          <i class="fas fa-lock prefix grey-text"></i>
		          <input type="password" id="mem_pass" name="mem_pass" class="form-control validate">
		          <label data-error="wrong" data-success="right" for="mem_pass">Your password</label>
		        </div>

	      	</div>
	      		<div class="modal-footer d-flex justify-content-center">
	        		<button class="btn btn-primary">Login</button>
	      		</div>
    	</div>
  	</div>
</div>
</form>