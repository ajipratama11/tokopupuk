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
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $total_berat = 0;
              foreach ($this->cart->contents() as $items) :  ?>
                <tr>
                  <td>
                    <div class="media">
                      <!-- <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/cart-1.jpg" alt="" />
                    </div> -->
                      <div class="media-body">
                        <p><?php echo $items['id'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="media">
                      <!-- <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/cart-1.jpg" alt="" />
                    </div> -->
                      <div class="media-body">
                        <p><?php echo $items['name'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>Rp. <?php $format_indonesia = number_format($items['price'], 0, ',', '.');
                            echo $format_indonesia ?>,00-</h5>
                  </td>
                  <td>
                    <div class="product_count">
                      <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                      <h5><?php echo $items['qty'] ?><h5>
                          <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                    </div>
                  </td>
                  <td>
                    <h5>Rp. <?php $format_indonesia = number_format($items['subtotal'], 0, ',', '.');
                            echo $format_indonesia ?>,00-</h5>
                  </td>
                </tr>
              <?php endforeach; ?>
              <!-- <tr class="bottom_button">
                <td>
                  <a class="btn_1" href="#">Update Cart</a>
                </td>
                <td></td>
                <td></td>
                <td>
                  <div class="cupon_text float-right">
                    <a class="btn_1" href="#">Close Coupon</a>
                  </div>
                </td>
              </tr> -->
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <h5>Rp. <?php $format_indonesia = number_format(($this->cart->total()), 0, ',', '.');
                          echo $format_indonesia  ?>,00-</h5>
                </td>
              </tr>
          
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="<?php echo base_url('Dashboard') ?>">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="<?php echo base_url('Dashboard/hapus_keranjang') ?>">Hapus Keranjang</a>
          </div>

        </div>
      </div>
      <?php
      foreach ($this->cart->contents() as $items) {
				$idpesan = $items['idpesan'];
      }
      $cek2 = $this->db->query("SELECT * FROM kostumer_voucher JOIN voucher ON kostumer_voucher.id_voucher=voucher.id_voucher WHERE kostumer_voucher.id_voucher='1' AND kostumer_voucher.id_kostumer_id=5")->num_rows(); echo $cek2 ?>
      <h3><input type="checkbox" id="myCheck" onclick="myFunction()"> Masukkan Kode Voucher (Jika ada)</h3>
      <div style="display: none; margin-left: 4px;" id="text" class="row contact_form">
        <input type="text" class="form-group" id="kodevoucher" name="kodevoucher">
        <!-- <input type="text" class="form-group" id="totalbelanja" value="<?php $this->cart->total(); ?>" name="totalbelanja"> -->
        <button class="btn btn-sm btn-success" type="button" onclick="tampil_data('data')">Check Kode Voucher</button>
      </div>
      <div id="hasil">
      </div>
      <!--/register-req-->

      <?php foreach ($pelanggan as $a) { ?>
        <div style="margin-top: 20px;;" class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3>Alamat Pengiriman</h3>
              <form class="row contact_form" action="<?php echo base_url('Pesanan/pembayaran') ?>" method="post" novalidate="novalidate">

                <div class="col-md-12 form-group">
                  <h5>Nama Penerima : </h5>
                  <input type="text" class="form-control" id="company" name="namapengirim" placeholder="nama Anda" value="<?php echo $a->nama_kostumer ?>" />
                </div>
                <div class="col-md-12 form-group p_star">
                  <h5>Provinsi Tujuan : </h5>
                  <select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan">
                    <option value="" selected="" disabled="">Pilih Provinsi</option>
                    <?php $this->load->view('rajaongkir/GetProvince'); ?>
                  </select>
                </div>
                <div class="col-md-12 form-group p_star">
                  <h5>Kabupaten/Kota Tujuan : </h5>
                  <select class="form-control" name="destination" id="destination">
                    <option value="" selected="" disabled="">Pilih Kota</option>
                  </select>
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Kecamatan : </h5>
                  <input type="text" class="form-control" id="number" name="kecamatan" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Desa/Dusun : </h5>
                  <input type="text" class="form-control" id="email" name="desa" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Rt : </h5>
                  <input type="text" class="form-control" id="number" name="rt" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Rw : </h5>
                  <input type="text" class="form-control" id="email" name="rw" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Nomor Telpon Penerima : </h5>
                  <input type="text" class="form-control" id="number" name="no_telp" />
                </div>
                <div class="col-md-6 form-group p_star">
                  <h5>Kode Pos : </h5>
                  <input type="text" class="form-control" id="email" name="kodepos" />
                </div>
                <!-- <p>Alamat asal default jember</p> -->
                
                <button type="submit" style="width: 300px; height:60px;" class="btn btn-lg btn-success">Selesaikan pesanan</button>
            </div>
          </div>
        </div>
        </form>
    </div>
  <?php } ?>
  </section>
  <!--====== FOOTER PART START ======-->

  <!--================End Cart Area =================-->

  <!--::footer_part start::-->
  <?php $this->load->view('template/footer'); ?>
  <!--::footer_part end::-->

  <!-- jquery plugins here-->
  <?php $this->load->view('template/foot'); ?>
</body>
<script type="text/javascript">
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("text");
    var text2 = document.getElementById("text2");
    var text3 = document.getElementById("text3");
    var text4 = document.getElementById("text4");
    var text5 = document.getElementById("text5");
    var text6 = document.getElementById("text6");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      text.style.display = "block";
      text2.style.display = "block";
    } else {
      text.style.display = "none";
      text2.style.display = "none";
    }
  }
</script>

<script>
  function tampil_data(act) {
    var w = $('#kodevoucher').val();

    $.ajax({
      url: "../Dashboard/voucher",
      type: "GET",
      data: {
        kodevoucher: w
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