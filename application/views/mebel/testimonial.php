
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
              <h2>TESTIMONI</h2>
              <p>Home <span>-</span> TESTIMONI Produk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
<br>
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
   

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Testimoni</h2>
        </div>

        <div class="col-lg-12">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="form-group col-md-12">
          Upload gambar <br><br>
          <input type="file" name="filefoto"  required="required" placeholder="Upload gambar" style="padding-right:1px;">
                </div> 
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              
             
            </div>
            <div class="form-group mt-3">
              <a href="#" class="btn_3 button-contactForm">Send Testimoni</a>
            </div>
          </form>
        </div>
        
      </div>
    </div>

  <!-- ================ contact section end ================= -->
    <?php $this->load->view('template/footer'); ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <?php $this->load->view('template/foot'); ?>
</body>