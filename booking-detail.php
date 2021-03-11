<?php 
include("include/header.php");
$id = $_GET['id'];
$sql = "SELECT * FROM tb_booking WHERE room_id = '$id'";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);
$datefrom = array();
$dateto = array();
foreach($query as $value){
    array_push($datefrom,$value['bk_datefrom']);
    array_push($dateto,$value['bk_dateto']);
}
?>
<title>Room</title>

<body>
  <?php 
include("include/navbar.php");
?>
  <?php 

$id = $_GET['id'];
if(isset($_SESSION['m-id'])&&!empty($_SESSION['m-id'])){
                $m_id = $_SESSION['m-id'];
}
$sql = "SELECT * FROM tb_room WHERE id = '$id'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
?>
  <link rel="stylesheet" href="css/cssbooking.css">
  <style>
    th.next.available,
    th.prev.available {
      position: unset;
      padding: 0;
    }
  </style>
  <div class="container">
    <div class="jumbotron mt-4 text-white" style="background-color:darksalmon;border-radius:10px">
      <div class="row">
        <div class="col-12 col-md-6 text-center">
          <div class="mySlides">
            <img src="slide/<?php echo $row['room_img'] ?>" style="height:250px;widht:100%;">
          </div>
          <div class="mySlides">
            <img src="slide/<?php echo $row['room_img2'] ?>" style="height:250px;widht:100%;">
          </div>
          <div class="mySlides">
            <img src="slide/<?php echo $row['room_img3'] ?>" style="height:250px;widht:100%;">
          </div>
          <a class="prev" onclick="plusSlides(-1)"><i class="fas fa-arrow-left"></i></a>
          <a class="next" onclick="plusSlides(1)"><i class="fas fa-arrow-right"></i></a>
          <div class="row mt-3">
            <div class="column">
              <img class="demo cursor" src="slide/<?php echo $row['room_img'] ?>" style="width:100%;height:150px"
                onclick="currentSlide(1)">
            </div>
            <div class="column">
              <img class="demo cursor" src="slide/<?php echo $row['room_img2'] ?>" style="width:100%;height:150px"
                onclick="currentSlide(2)">
            </div>
            <div class="column">
              <img class="demo cursor" src="slide/<?php echo $row['room_img3'] ?>" style="width:100%;height:150px"
                onclick="currentSlide(3)">
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6">
          <form action="booking-confirm.php" method="POST">
            <h3 class="text-center font-weight-bold"><label><?php echo $row['room_name'] ?></label></h3>
            <p><?php echo $row['room_detail'] ?></p>
            <div class="form-group row">
              <label class="col-12 col-md-4 col-form-label">ราคา : </label>
              <div class="col-12 col-md-8">
                <label class="col-form-label"><?php echo number_format($row['room_price']) ?> บาท/คืน</label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-4 col-form-label">ประเภทห้องพัก : </label>
              <div class="col-12 col-md-8">
                <label class="col-form-label"><?php echo $row['room_type'] ?></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-12 col-md-3 col-form-label">วันที่เข้าพัก : </label>
              <div class="col-12 col-md-6">
                <input type="text" placeholder="เลือกวันที่" value="" required class="form-control daterange"
                  name="daterange" autocomplete="off">
                <input type="hidden" id="start" value="" name="bk_datefrom">
                <input type="hidden" id="end" value="" name="bk_dateto">
              </div>
            </div>
            <div>
              <input type="hidden" name="bk_price" value="<?=$row['room_price']?>">
              <input type="hidden" name="m_id" value="<?=$m_id?>">
              <input type="hidden" name="room_id" value="<?=$id?>">
            </div>
            <div class="form-group text-center">
              <button class="btn btn-primary">จอง</button>
            </div>
          </form>
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
  <script>
    // function disdate(date){
    //   return date;
    // }
    $(function () {
      var datetoday = new Date();
      var datedis = [];
      datedis['from'] = <?php echo json_encode($datefrom); ?>;
      datedis['to'] = <?php echo json_encode($dateto); ?>;
      $('.daterange').daterangepicker({
        opens: 'left',
        minDate: datetoday,
        autoApply: true,
        autoUpdateInput: false,
          isInvalidDate: function (date) {
            for(var i = 0; i <= datedis['from'].length-1;i++){
              if(date.format('YYYY-MM-DD') >= datedis['from'][i] && date.format('YYYY-MM-DD') <= datedis['to'][i]){
                return true;
              }
            }
          },
        maxSpan: {
          "days": 7
        },
        locale: {
          format: 'DD/MM/YYYY',
        }
      },function (start, end, label) {
        $('#start').val(start.format('YYYY-MM-DD'));
        $('#end').val(end.format('YYYY-MM-DD'));
        console.log("date: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      $('.daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      });
    });
  </script>
</body>

</html>