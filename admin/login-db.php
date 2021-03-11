<?php
session_start();
if (isset($_POST['mem_user'],($_POST['mem_pass']))) {
    include("../connection/conn.php");
    $mem_user = $_POST['mem_user'];
    $mem_pass = $_POST['mem_pass'];
     $sql="SELECT * FROM tb_member WHERE mem_user='".$mem_user."' AND mem_pass='".$mem_pass."' ";
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_array($result);
        $_SESSION["id"] = $row["id"];
        $_SESSION["mem_user"] = $row["mem_user"];
        $_SESSION["mem_pass"] = $row["mem_pass"];
        $_SESSION["mem_name"] = $row["mem_name"];
        $_SESSION["mem_type"] = $row["mem_type"];
        Header("location:index.php");

        
    }else{

        echo "<script>";
        echo "alert(\" username หรือ  password ไม่ถูกต้อง\");"; 
        echo "window.history.back()";
        echo "</script>";
    }
    
}
?>
