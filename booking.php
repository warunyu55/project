<?php 
include("include/header.php");
?>
<title>Booking-Hotel</title>

<body>
  <?php 
include("include/navbar.php");
$sql="SELECT * FROM tb_type" or die ("ERROR :".mysqli_error($con));
$query=mysqli_query($con,$sql);
?>
  <div class="jumbotron text-center">
    <h1>จองห้องพัก</h1>
    <p>Reservation</p>
  </div>
  <div class="container text-right">
    <form method="post" enctype="multipart/form-data" action="">
      <div class="row justify-content-center">
        <input type="text" class="daterange form-control col-10 col-md-4 mr-2 mt-2" autocomplete="off"
          placeholder="เลือกวันที่">
        <input type="hidden" id="start" name="bk_datefrom">
        <input type="hidden" id="end" name="bk_dateto">
        <select class="browser-default custom-select col-10 col-md-3 mt-2" id="room_type" name="room_type">
          <option active value="">กรุณาเลือกประเภทห้องพัก</option>
          <?php
            while ($result=mysqli_fetch_array($query)) {?>
          <option><?php echo $result['room_type'] ?></option>
          <?php }?>
        </select>
        <button type="submit" class="btn btn-primary">ค้นหา</button>
      </div>
    </form>
  </div>
  <br>
  <div class="container">
    <div class="row justify-content-center">
      <?php 
        if(isset($_POST['bk_datefrom'])&&$_POST['bk_datefrom'] != ''){
            $bk_datefrom = $_POST['bk_datefrom'];
            $bk_dateto = $_POST['bk_dateto'];
            $sql1= "SELECT * FROM tb_room WHERE id NOT IN (SELECT tb_room.id FROM tb_room LEFT JOIN tb_booking ON tb_room.id = tb_booking.room_id WHERE tb_booking.bk_datefrom >= '$bk_datefrom' AND tb_booking.bk_datefrom <= '$bk_dateto' OR tb_booking.bk_dateto >= '$bk_datefrom' AND tb_booking.bk_dateto <= '$bk_dateto') AND room_status = 1 ";
            $query2=mysqli_query($con,$sql1);
        }elseif (isset($_POST['room_type'])&&$_POST['room_type'] != ''){
              $type = $_POST['room_type'];
              $sql2="SELECT * FROM tb_room WHERE room_type = '$type' and room_status = 1 " or die ("ERROR :".mysqli_error($con));
              $query2=mysqli_query($con,$sql2);
        }else{ 
              $sql3="SELECT * FROM tb_room where room_status = 1 " or die ("ERROR :".mysqli_error($con));
              $query2=mysqli_query($con,$sql3);
        }  
            while ($result3=mysqli_fetch_array($query2)){
          ?>
      <div class="card mb-3 mt-2 col-12 col-md-3" style="margin-right:8%;">
        <img src="slide/<?php echo $result3['room_img'] ?>" height="200px" class="card-img-top mt-2" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title"><?php echo $result3['room_name'] ?></h5>
          <p class="card-text">
            <label>ราคา : </label> <?php echo number_format($result3['room_price'])?> บาท/คืน<br>
            <label>ประเภทห้องพัก : </label><?php echo $result3['room_type'] ?><br>
          </p>
          <a href="booking-detail.php?id=<?php echo $result3['0'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
        </div>
      </div>
      <?php 
            }
        ?>
    </div>
  </div>
  <?php 
include('include/footer.php');
?>
  <?php 
include('include/script.php');
?>
<script>
$(function() {
  var datetoday = new Date();
  $('.daterange').daterangepicker({
      opens: 'left',
      minDate: datetoday,
      autoApply:true,
      autoUpdateInput: false,
      maxSpan:{
        "days":7
      },
      locale:{
        format:'DD/MM/YYYY',
      }
  }, function(start, end, label) {
    $('#start').val(start.format('YYYY-MM-DD'));
    $('#end').val(end.format('YYYY-MM-DD'));
    console.log("date: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
  $('.daterange').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
  });
});

</script>
</body>

</html>