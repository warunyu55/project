<?php 
session_start();
?>
<?php 
if (isset($_SESSION['mem_user'])) { 
    if ($_SESSION['mem_type']=="admin") {  
        include("../include/header.php");
?>
    <title>Home-Hotel</title>
        <div class="flex-column d-flex w-100 h-100">
            <header class="mb-auto">
                <?php include("../include/navbar.php");?>
                <div class="jumbotron text-center">
                    <h1>ยินดีตอนรับเข้า Admin Hotel</h1>
                    <p>Welcome to Admin Hotel</p>
                </div>
            </header>
            <div class="container">
                <div class="row justify-content-center">
                </div>

            </div>
            <?php 
            include('../include/footer.php');
            include('../include/script.php');
            ?>
        </div>
    </body>
</html>
<?php   }else{   
            echo "<script>";
            echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
            echo "window.location='logout.php'";
            echo "</script>";
            }
}else{ ?>
<?php 
include("../include/header.php");
?>
<title>Home-Hotel</title>
<div class='container'>
    <div class='row justify-content-center'>
        <div class="card mt-5" style="width:400px">
            <div class="card-body">
                <h4 class="text-center text-muted">Login Admin</h4>
                <form action='../login-db.php' method='post'>
                    <div class='md-form'>
                        <i class='fas fa-user prefix grey-text'></i>
                        <input type='text' id='mem_user' name='mem_user' class='form-control validate'>
                        <label data-error='wrong' data-success='right' for='mem_user'>Username</label>
                    </div>

                    <div class='md-form'>
                        <i class='fas fa-lock prefix grey-text'></i>
                        <input type='password' id='mem_pass' name='mem_pass' class='form-control validate'>
                        <label data-error='wrong' data-success='right' for='mem_pass'>Your password</label>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <button class="btn btn-default">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
include('../include/script.php');
?>
<?php } ?>