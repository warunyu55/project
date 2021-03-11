<?php 
include("include/header.php");
?>
<title>Contact Us-Hotel</title>
  <body>
  	<!-- carousel -->
 <?php 
 include("include/navbar.php");
 ?>
    <!-- end navbar -->
    <!-- content -->
    <div class="jumbotron text-center">
    			<h1>ติดต่อเรา</h1>
    			<p>Contact Us</p>
    		</div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><img src="slide/img1.jpg" width="100%">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <h3><strong>Contact Us</strong></h3>
                <p>Responsive web design is about creating web sites which automatically adjust themselves to look good on all devices, from small phones to large desktops.</p>
                <p><strong>Address:</strong> 123/56 soi15 Ramkhamhaeng Rd.Huamak Bangkapi Bangkok 10240</p>
                <p><strong>Tel:</strong> 094-851-1253</p>
                <p><strong>Email:</strong> Test@hotel.com</p>
            </div>
        </div>
               
            <div class="row">
        		<form class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mt-5 mb-5" action="contact-db.php" method="post">
                    <div class="form-group row">
                        
                            <label class="col-3 col-form-label text-right"  style="font-weight: bold;">ชื่อ - สกุล <em class="text-danger">*</em> :</label>
                            <input class="col-8 form-control" type="text" required name="con_name" placeholder="ชื่อ - สกุล">
                    </div>
                    <div class="form-group row">
                            <label class="col-3 col-form-label" align="right" style="font-weight: bold;">เบอร์โทร <em class="text-danger">*</em> :</label>
                            <input class="col-8 form-control" type="text" required  name="con_tel" placeholder="เบอร์โทรศัพท์">
                    </div>
                     <div class="form-group row">
                            <label class="col-3 col-form-label" align="right" style="font-weight: bold;">Email <em class="text-danger">*</em> :</label>
                            <input class="col-8 form-control " type="text" required name="con_email" placeholder="อีเมล">
                    </div>
                    <div class="form-group row">
                            <label class="col-3 col-form-label" align="right" style="font-weight: bold;">รายละเอียด <em class="text-danger">*</em> :</label>
                            <textarea class="col-8 form-control" type="text" required name="con_detail" placeholder="รายละเอียด"></textarea>
                    </div>
                    <div class="row justify-content-center">
                        <input class="btn btn-primary" type="submit" name="" value="ยืนยัน">
                        <input class="btn btn-danger" type="reset" name="" value="ยกเลิก">
                    </div>
                </form>
                
                <div class="col-sm-12 col-md-5 col-lg-5" style="margin: 10px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.114294111639!2d100.40624714991019!3d13.711526901873649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e297c62d067bc3%3A0x5e673b8b1f892319!2z4LmA4LiU4Lit4Liw4Lih4Lit4Lil4Lil4LmMIOC4muC4suC4h-C5geC4hA!5e0!3m2!1sth!2sth!4v1603180532651!5m2!1sth!2sth" width="100%" height="90%"  frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                

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