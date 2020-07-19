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
              <h2>FAQ</h2>
              <p>Home <span>-</span> FAQ</p>
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
          <h2 class="contact-title">Pesan</h2>
        </div>
        <div class="col-lg-12">

          <form class="form-contact contact_form" action="<?php echo base_url('Dashboard/tambah_faq2'); ?>" method="post"  >
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input class="form-control" name="nama" id="nama" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder='Enter your name'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="kritik" id="kritik" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder='Enter Message'></textarea>
                </div>
              </div>

            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn_3 button-contactForm" href="#">Send Message </button>
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