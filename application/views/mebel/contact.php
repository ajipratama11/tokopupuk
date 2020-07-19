
<?php $this->load->view('template/head'); ?>
<body>
    <!--::header part start::-->
    <?php $this->load->view('template/header'); ?>
  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>contact us</h2>
              <p>Home <span>-</span> contact us</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
 <br>
 <br>
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        
       
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>

      </div>


      <div class="row">
       
        <div class="col-lg-4">
       <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Jember, Ambulu</h3>
              <p>Jl. MAnggar No.71 68172</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
        
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>(0336) 881174</h3>
              <p>Buka setiap hari Pukul 08.00 sampai 20.00</p>
            </div>
          </div>
        </div>
         <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>@LumintuMebel</h3>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- ================ contact section end ================= -->
    <?php $this->load->view('template/footer'); ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <?php $this->load->view('template/foot'); ?>
</body>