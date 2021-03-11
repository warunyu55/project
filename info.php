<?php 
include("include/header.php");
?>
<title>Home-Hotel</title>
  <body>
    <!-- carousel -->
 <?php 
 $id = $_SESSION['m-id'];
 include("include/navbar.php");
 $sql = "SELECT * FROM tb_member WHERE id ='$id' ";
 $query = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($query);
 extract($row);
 ?>
 <style>
 .list-group-item.active{
   background-color:peru;
   border-color:peru;
 }
 .btn-sm{
   border-radius: 30px;
 }
 </style>
    <!-- end navbar -->
    <!-- content -->
    <div class="jumbotron text-center">
                <h1>ข้อมูลส่วนตัว</h1>
    </div>
    <div class="container-fluid">
      <div class="row mb-5">
        <div class="col-12 col-md-2">
          <div class="list-group" id="list-tab">
            <!-- <a class="list-group-item list-group-item-action active" data-toggle="list" href="#list-home">Home</a> -->
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#list-profile">บัญชีของฉัน</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-booking">รายการจอง</a>
            <!-- <a class="list-group-item list-group-item-action" data-toggle="list" href="#list-settings">แจ้งการชำระเงิน</a> -->
          </div>
        </div>
          <div class="col-12 col-md-10">
            <div class="tab-content">
                <!-- <div class="tab-pane fade show" id="list-home">
                </div> -->
                <div class="tab-pane fade show active" id="list-profile">
                  <form action="updateinfo.php" method="post">
                                  <input type="hidden" name="id" id="id" value="<?php echo $id ; ?>">
                      <div class="form-group row">
                                  <label class="col-form-label col-4 text-right" >Username : </label>
                                  <input type="text" class="form-control col-7 col-md-4 ml-3" name="mem_user" id="mem_user" value="<?php echo $mem_user ; ?>">
                      </div>
                      <div class="form-group row">
                                  <label class="col-form-label col-4 text-right">Password : </label>
                                  <input type="Password" class="form-control col-7 col-md-4 ml-3" name="mem_pass" id="mem_pass" value="<?php echo $mem_pass ; ?>">
                      </div>
                      <div class="form-group row">
                                  <label class="col-form-label col-4 text-right">Name : </label>
                                  <input type="text" class="form-control col-7 col-md-4 ml-3" name="mem_name" id="mem_name" value="<?php echo $mem_name ; ?>">
                      </div>
                      <div class="form-group row">
                                  <label class="col-form-label col-4 text-right">Tel : </label> 
                                  <input type="text" class="form-control col-7 col-md-4 ml-3" name="mem_tel" value="<?php echo $mem_tel ; ?>">    
                      </div>
                      <div class="form-group row">
                                  <label class="col-form-label col-4 text-right">Address : </label> 
                                  <textarea type="text" class="form-control col-7 col-md-4 ml-3" name="mem_address" ><?php echo $mem_address ; ?></textarea></td> 
                      </div>
                      <div class="row justify-content-center mb-2">
                                  <input class="btn btn-primary" type="submit" name="" value="ยืนยัน">
                                  <input class="btn btn-danger" type="reset" name="" value="ยกเลิก">
                      </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="list-booking">
                <?php
                $sql_room = "SELECT *,tb_booking.id FROM tb_booking LEFT JOIN tb_room ON tb_booking.room_id = tb_room.id WHERE m_id = '$id'";
                $query_room = mysqli_query($con,$sql_room);
                ?>
                  <div class="table-responsive">
                    <table class="mytable">
                      <thead>
                      <tr class="text-center">
                        <th>ลำดับ</th>
                        <th>ห้อง</th>
                        <th>ราคา</th>
                        <th>วันที่เข้าพัก</th>
                        <th>วันที่เช็คเอ้า</th>
                        <th>สถานะ</th>
                        <!-- <th>ยกเลิก</th> -->
                        <th>รายละเอียด</th>
                      </tr>
                      </thead>
                      <?php foreach($query_room as $result){ ?>
                      <tr class="text-center">
                        <td><?=$result['id']?></td>
                        <td><?=$result['room_name']?></td>
                        <td><?=number_format($result['bk_price'])?></td>
                        <td><?=date("d-m-Y",strtotime($result['bk_datefrom']))?></td>
                        <td><?=date("d-m-Y",strtotime($result['bk_dateto']))?></td>
                        <?php if($result['bk_status'] == 0){
                          echo "<td class='text-primary'>รอชำระเงิน</td>"; 
                        }elseif($result['bk_status'] == 1){
                          echo "<td class='text-danger'>ยกเลิกรายการ</td>";
                        }elseif($result['bk_status'] == 2){
                          echo "<td class='text-warning'>รอตรวจสอบการชำระเงิน</td>";
                        }elseif($result['bk_status'] == 3){
                          echo "<td class='text-success'>ชำระเงินแล้ว</td>";
                        }
                        ?>
                        <?=$result['bk_status'] == 0 ?"<td><a href='manage-booking.php?id=".$result['id']."' class='btn btn-outline-info'>ชำระเงิน</a><a href='?cancel=".$result['id']."' class='btn btn-outline-danger' onclick='return confirm(\"ต้องการยกเลิกใช่หรือไม่\")'>ยกเลิก</i></a></td>":"<td><a href='manage-booking.php?id=".$result['id']."' class='btn btn-outline-info'>รายละเอียด</a></td>"?>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="list-settings">
                
                </div>
            </div>
          </div>
      </div>
    </div>
    <!-- end content -->
    <!-- footer -->
<script>
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
<?php 
include('include/footer.php');
include('include/script.php');
?>
  </body>
</html>
<!-- function del booking
 -->
<?php 
// print_r(isset($_GET['cancel']));
// exit();
if(isset($_GET['cancel'])&& !empty($_GET['cancel'])){
  $cancel_id = $_GET['cancel'];
  $cancel_detail = "คุณได้ทำการยกเลิกรายการจองนี้";
  $status = 1;
  $sql_cancel = "UPDATE tb_booking SET cancel_detail='$cancel_detail' ,bk_status = '$status' WHERE id = '$cancel_id'";
  $query_cancel = mysqli_query($con,$sql_cancel);
  if($query_cancel){
    echo "<script>";
    echo "alert('ยกเลิกรายการเรียบร้อยแล้ว');";
    echo "window.location='info.php'";
    echo "</script>";
  }
  mysqli_close($con);
}
?>