
	<!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    	<a class="navbar-brand ml-3 mr-3" href="../index.php">ADMIN
    		</a>

		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1"
		    aria-controls="nav1" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		   </button>

		   <div class="collapse navbar-collapse" id="nav1">
		   	<ul class="navbar-nav mr-auto">
		   		<li class="nav-item">
		   			<a class="nav-link" href="../index.php">หน้าหลัก</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="../member/member.php">ระบบสมาชิก</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="../admin/admin.php">ระบบผู้ดูแลระบบ</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="../booking/booking.php">รายการจองห้องพัก</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="../room/room.php">ห้องพัก</a>
		   		</li>
		   		<li class="nav-item">
		   			<a class="nav-link" href="../type/type.php">ประเภทห้องพัก</a>
				</li>
				<li class="nav-item">
		   			<a class="nav-link" href="../gallery/gallery.php">แกลเลอรี่</a>
		   		</li>
		   	</ul>
		   	<?php 
		   	if (isset($_SESSION['mem_user'])) {
		   	
		   		echo "<ul class='navbar-nav ml-auto'>";
		   		echo 	"<li class='nav-item'>";
		   		echo 		"<a class='nav-link text-primary' href=''><i class='fas fa-user mr-1'></i>".$_SESSION["mem_name"]."</a>";
		   		echo 	"</li>";

		   		echo 	"<li class='nav-item'>";
		   		echo		"<a class='nav-link text-danger' href='../logout.php'><i class='fas fa-lock mr-1'></i>Logout</a>";
		   		echo 	"</li>";

		   		echo "</ul>";
		   	}else{
		   		echo "<ul class='navbar-nav ml-auto'>";
		   		echo "<li class='nav-item'>";
		   		echo	"<a class='nav-link text-success' data-toggle='modal' data-target='#modalLoginForm' href=''><i class='fas fa-lock mr-1'></i>Login</a>";
		   		echo "</li>";
		   		echo "</ul>";
		   	}
		   	?>
		   </div>
    </nav>
 <form action="login-db.php" method="post">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
		    <div class="modal-header text-center">
		        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
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
	        		<button class="btn btn-default">Login</button>
	      		</div>
    	</div>
  	</div>
</div>
</form>