<?php $this->load->view('template/head'); ?>

<body>
    <!--::header part start::-->
    <?php $this->load->view('template/header'); ?>
    <!-- Header part end-->
  

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Producta Checkout</h2>
                            <p>Home <span>-</span> Shop Single</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->
    <section class="cart_area padding_top">
    <div class="container">
<div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <form class="row contact_form" action="<?php echo base_url('Bukti/upload_image'); ?>" method="post" novalidate="novalidate" enctype="multipart/form-data">
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="kode_pesan" placeholder="Masukkan Kode Pesan Anda" />
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="company" name="nama" placeholder="Nama Nomor Rekening Anda" />
              </div>
              
              <div class="col-md-12 form-group p_star">
                <select name="bank" class="form-control">
                        <option selected disabled>Silahkan Pilih BANK</option>
                        <option value="BRI">BRI</option>
					            	<option value="BCA">BCA</option>
					            	<option value="MANDIRI">BNI</option>
					          	  <option value="BNI">MANDIRI</option>
						            <option value="BANK JATIM">BANK JATIM</option>
                </select>
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="file" class="" id="add1" name="filefoto" />
              </div>
              <button type="submit" style="margin-left: 15px" class="genric-btn success">Upload</button>             
            </form>
          </div   >
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              
              <div class="payment_item">
              <label for="f-option5">Bukti pembayaran merupakan bukti transfer bank transaksi pemesanan yang anda lakukan, caranya :</label>
                  <div class="check"></div>
                <p>
                1. Masukkan kode pesan transaksi anda
                </p>
              </div>
              <div class="payment_item">
                <p>
                2. Jangan lupa nama pemilik si nomor rekening
                </p>
              </div>
              <div class="payment_item">
                <p>
                3. Bank transfer, misal: BRI, BCA, dan lain sebagainya
                </p>
              </div>
              <div class="payment_item">
                <p>
                4. Terakhir scan atau foto bukti transfer yaa...
                </p>
              </div>
             
             
                <label for="f-option4">*ukuran file max 1 mb. </label>
               
           
            </div>
          </div>
        </div>
      </div>
      </section>

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
       
    </section>
    <!--====== FOOTER PART START ======-->

    <!--================End Cart Area =================-->

    <!--::footer_part start::-->
    <?php $this->load->view('template/footer'); ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <?php $this->load->view('template/foot'); ?>
</body>

<script>
    function tampil_data(act) {
        var w = $('#origin').val();
        var x = $('#destination').val();
        var y = $('#berat').val();
        var z = $('#courier').val();
        var a = $('#namapengirim').val();
        var b = $('#kecamatan').val();
        var c = $('#desa').val();
        var d = $('#kodepos').val();
        var e = $('#telp').val();

        $.ajax({
            url: "../Rajaongkir/getCost",
            type: "GET",
            data: {
                origin: w,
                destination: x,
                berat: y,
                courier: z,
                namapengirim: a,
                kecamatan: b,
                desa: c,
                kodepos: d,
                telp: e
            },
            success: function(ajaxData) {
                //$('#tombol_export').show();
                //$('#hasilReport').show();
                $("#hasil").html(ajaxData);
            }
        });
    };
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

<script>
    $(document).ready(function() {

        $("#propinsi_asal").click(function() {
            $.post("<?php echo base_url(); ?>index.php/Landing/getCity/" + $('#propinsi_asal').val(), function(obj) {
                $('#origin').html(obj);
            });

        });

        $("#propinsi_tujuan").click(function() {
            $.post("<?php echo base_url(); ?>index.php/Landing/getCity/" + $('#propinsi_tujuan').val(), function(obj) {
                $('#destination').html(obj);
            });

        });

        /*
        $("#cari").click(function(){
        	$.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
        		$('#hasil').html(obj);
        	});
        });

        */


    });
</script>

</html>