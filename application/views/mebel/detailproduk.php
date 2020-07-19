<?php $this->load->view('template/head'); ?>
<body>
    <!--::header part start::-->
    <?php $this->load->view('template/header'); ?>
    <!-- Header part end-->

    <!-- banner part start-->
    <!-- Header part end-->

  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Shop Single</h2>
              <p>Home <span>-</span> Shop Single</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->
  <!--================End Home Banner Area =================-->

  <!--================Single Product Area =================-->
  <?php 
     foreach($produk as $a) : ?>
  <div class="product_image_area section_padding">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
        <div class="col-lg-7 col-xl-7">
          <div class="product_slider_img">
          <form action="<?php echo base_url('Dashboard/tambah_ke_keranjang'); ?>" method="post" accept-charset="utf-8">
            <div id="vertical">
              <div data-thumb="<?php echo base_url('./assets/images/depan/'.$a->gambar); ?>">
                <img height="450px" width="450px" src="<?php echo base_url('./assets/images/depan/'.$a->gambar); ?>" />
              </div>
              <div data-thumb="<?php echo base_url('./assets/images/samping2/'.$a->gambar2); ?>">
                <img height="450px" width="450px" src="<?php echo base_url('./assets/images/samping2/'.$a->gambar2); ?>" />
              </div>
              <div data-thumb="<?php echo base_url('./assets/images/samping3/'.$a->gambar3); ?>">
                <img height="450px" width="450px" src="<?php echo base_url('./assets/images/samping3/'.$a->gambar3); ?>" />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="s_product_text">
            <h5>previous <span>|</span> next</h5>
            <h3><?= $a->nama_produk ?></h3>
            <h2>Rp. <?php $format_indonesia = number_format ($a->harga, 0, ',', '.');
                                     echo $format_indonesia; ?>,00-</h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Category</span> : <?php echo $a->nama_kategori ?></a>
              </li>
              <li>
                <a href="#"> <span>Stok</span> : <?php echo $a->stok ?> Buah</a>
              </li>
            </ul>
            <p>
            <?php echo $a->keterangan ?>
            </p>
            <input type="checkbox" id="myCheck" onclick="myFunction()"><span style="margin-left: 10px" >Checklist Jika Ingin Custom Ukuran</span>
            <div class="card_area d-flex justify-content-between align-items-center">
              <span id="text4" style="display: none">Panjang</span>
              <input name="id_produk" value="<?php echo $a->id_produk ?>" readonly style="margin-left: 10px; margin-right: 10px" class="form-control" type="hidden" >
              <input name="nama_produk" value="<?php echo $a->nama_produk ?>" readonly style="margin-left: 10px; margin-right: 10px" class="form-control" type="hidden" >
              <input name="harga" value="<?php echo $a->harga ?>" readonly style="margin-left: 10px; margin-right: 10px" class="form-control" type="hidden" >
              <input id="text" name="panjang" value="<?php echo $a->panjang ?>"  style="margin-left: 10px; margin-right: 10px; display: none" class="form-control" type="text" >
              <span id="text5" style="display: none">Lebar</span>
              <input id="text2" name="tinggi" value="<?php echo $a->tinggi ?>"  style="margin-left: 10px; margin-right: 10px; display: none" class="form-control" type="text" >
              <span id="text6" style="display: none">Tinggi</span>
              <input id="text3" name="lebar" value="<?php echo $a->lebar ?>"  style="margin-left: 10px; display: none" class="form-control" type="text" >
            </div>
            <div class="card_area d-flex justify-content-between align-items-center">
              <div class="product_count"> 
                <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                <input name="stok" class="input-number" type="number" value="1" min="1" max="<?php echo $a->stok ?>">
                <span class="number-increment"> <i class="ti-plus"></i></span>
              </div>
              <button type="submit" class="btn_3">add to cart</button>
              <a href="#" class="like_us"> <i class="ti-heart"></i> </a>
            </div>
     </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?> 
  <!--================End Single Product Area =================-->

  <!--================Product Description Area =================-->
  <section class="product_description_area">
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Testimoni</a>
        </li>
   
        <li class="nav-item">
          <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
            aria-selected="false">Comments</a>
        </li>
      <!--   <li class="nav-item">
          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
            aria-selected="false">Reviews</a>
        </li> -->
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
        <div class="col-lg-6">
              <div class="comment_list"  >
              <?php 
     foreach($testimoni as $a) : ?>
                <div class="review_item">
                  <div class="media">
                    <div style="margin-bottom: 20px;" class="d-flex">
                      <img  src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body" id="show">
                      <h4><?php echo $a->nama_kostumer ?></h4>
                      <h5><?php echo $a->date ?></h5>
                    </div>
                  </div>
                  <a target="_blank" href="<?php echo base_url('./assets/images/'.$a->gambar); ?>"><img style="width: 400px; height: 250px; " src="<?php echo base_url('./assets/images/'.$a->gambar); ?>" alt="" /></a>
                  
                  <p>
                  <?php echo $a->keterangan ?>
                  </p>
                </div>
     <?php endforeach; ?>
              </div>
            </div>
            <?php  if($this->session->userdata('status') == "login") { ?>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post Testimoni</h4>
                <form class="row contact_form" action="<?php echo base_url('Dashboard/simpan_testimoni') ?>" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="name" name="id_kostumer_id" value="<?php echo $this->session->userdata("iduser"); ?>" placeholder="Your Full name" />
                    <input type="hidden" class="form-control" id="email" name="id_produk_id" value="<?php echo $this->uri->segment(3); ?>" placeholder="Email Address" />
                      <input type="hidden" class="form-control" id="number" name="date" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s') ?>" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="file" name="gambar"  required="required" placeholder="Upload gambar" style="padding-right:1px; margin-bottom: 20px;">
                      <textarea class="form-control" name="keterangan" rows="8" 
                        placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            <?php }?>
          
          </h3>
       
        </div>
     </div>
        
        <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="comment_list"  >
              <?php 
     foreach($komentar as $a) : ?>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body" id="show">
                      <h4><?php echo $a->nama_kostumer ?></h4>
                      <h5><?php echo $a->date ?></h5>
                      <a class="reply_btn" data-toggle="modal" data-target="#modal-edit<?= $a->id_komentar; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">Balas Komentar</a>
                    </div>
                  </div>
                  <p>
                  <?php echo $a->komentar ?>
                  </p>
                </div>
                <?php
                $komen_id=$a->id_komentar;
                $query= $this->db->query("SELECT * FROM komentar  WHERE komen_status='$komen_id'")->result();
               
                 foreach($query as $balas) : ?>
                <div class="review_item reply">
                  <div class="media">
                    <div class="d-flex">
                      <img src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-2.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4><?php 
                      $id=$balas->id_kostumer_id; 
                      $query2= $this->db->query("SELECT * FROM kostumer  WHERE id_kostumer='$id'")->num_rows();
                      $query3= $this->db->query("SELECT * FROM kostumer  WHERE id_kostumer='$id'")->result();
                      if($query2 === 0){
                          echo "Admin Lumintu Mebel";
                      }else{
                        foreach($query3 as $a){
                          echo $a->nama_kostumer;
                        }
                      }
                       ?></h4>
                      <h5><?php echo $balas->date; ?></h5>
                    </div>
                  </div>
                  <p>
                    <?php echo $balas->komentar ?>
                  </p>
                </div>
          <?php endforeach; ?>
        <?php endforeach; ?>
        <?php $no=0; foreach($komentar as $row): $no++; ?>
                <div class="row">
                 <div id="modal-edit<?=$row->id_komentar;?>" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Balas Komentar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                           
                            <div class="modal-body">
                                <form action="<?php echo base_url('Dashboard/simpan_komentar') ?>" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                        <input type="hidden" style="border-radius: 10px;" name="komen_status" class="form-control" id="id_login" value="<?php echo $row->id_komentar; ?>" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="id_produk_id" class="form-control" id="id_gtk" value="<?php echo $row->id_produk_id;  ?>" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="id_kostumer_id" class="form-control" id="id_gtk" value="<?php echo $this->session->userdata("iduser"); ?>" placeholder="Nama Penanggung Jawab" required>
                                        <input type="hidden" style="border-radius: 10px;" name="date" class="form-control" id="id_gtk" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s') ?>" placeholder="Nama Penanggung Jawab" required>
                                            
                                            <textarea  name="komentar" class="form-control"></textarea>
                                        </div>
                                    </div>
                                  
                                   
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" value="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php  if($this->session->userdata('status') == "login") { ?>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Post a comment</h4>
                <form class="row contact_form" action="<?php echo base_url('Dashboard/simpan_komentar') ?>" method="post" id="contactForm"
                  novalidate="novalidate">
                  
                    <div class="form-group">
                    <input type="hidden" class="form-control" id="name" name="id_kostumer_id" value="<?php echo $this->session->userdata("iduser"); ?>" placeholder="Your Full name" />
                    <input type="hidden" class="form-control" id="email" name="id_produk_id" value="<?php echo $this->uri->segment(3); ?>" placeholder="Email Address" />
                      <input type="hidden" class="form-control" id="number" name="date" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('d-m-Y H:i:s') ?>" placeholder="Phone Number" />
                      <input type="hidden" class="form-control" id="number" name="komen_status" value="0" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="komentar" rows="8" 
                        placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            <?php } ?>
            </div>
          </div>



          
        </div>
        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
          <div class="row">
            <div class="col-lg-6">
              <div class="row total_rate">
                <div class="col-6">
                  <div class="box_total">
                    <h5>Overall</h5>
                    <h4>4.0</h4>
                    <h6>(03 Reviews)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="rating_list">
                    <h3>Based on 3 Reviews</h3>
                    <ul class="list">
                      <li>
                        <a href="#">5 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">4 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">3 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">2 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                      <li>
                        <a href="#">1 Star
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i> 01</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="review_list">
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-2.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
                <div class="review_item">
                  <div class="media">
                    <div class="d-flex">
                      <img src="img/product/single-product/review-3.png" alt="" />
                    </div>
                    <div class="media-body">
                      <h4>Blake Ruiz</h4>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="review_box">
                <h4>Add a Review</h4>
                <p>Your Rating:</p>
                <ul class="list">
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-star"></i>
                    </a>
                  </li>
                </ul>
                <p>Outstanding</p>
                <form class="row contact_form" action="contact_process.php" method="post" novalidate="novalidate">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Your Full name" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email Address" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="number" placeholder="Phone Number" />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn_3">
                      Submit Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Product Description Area =================-->

  <!-- product_list part start-->
  <section class="product_list best_seller">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Best Sellers <span>shop</span></h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between">
        <div class="col-lg-12">
          <div class="best_product_slider owl-carousel">
            <div class="single_product_item">
              <img src="<?= base_url() ?>vendor/mebel/img/product/product_1.png" alt="">
              <div class="single_product_text">
                <h4>Quartz Belt Watch</h4>
                <h3>$150.00</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="<?= base_url() ?>vendor/mebel/img/product/product_2.png" alt="">
              <div class="single_product_text">
                <h4>Quartz Belt Watch</h4>
                <h3>$150.00</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="<?= base_url() ?>vendor/mebel/img/product/product_3.png" alt="">
              <div class="single_product_text">
                <h4>Quartz Belt Watch</h4>
                <h3>$150.00</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="<?= base_url() ?>vendor/mebel/img/product/product_4.png" alt="">
              <div class="single_product_text">
                <h4>Quartz Belt Watch</h4>
                <h3>$150.00</h3>
              </div>
            </div>
            <div class="single_product_item">
              <img src="<?= base_url() ?>vendor/mebel/img/product/product_5.png" alt="">
              <div class="single_product_text">
                <h4>Quartz Belt Watch</h4>
                <h3>$150.00</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- product_list part end-->

  <!--::footer_part start::-->
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
  if (checkBox.checked == true){
    text.style.display = "block";
    text2.style.display = "block";
    text3.style.display = "block";
    text4.style.display = "block";
    text5.style.display = "block";
    text6.style.display = "block";
  } else {
    text.style.display = "none";
    text2.style.display = "none";
    text3.style.display = "none";
    text4.style.display = "none";
    text5.style.display = "none";
    text6.style.display = "none";
  }
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_barang();	//pemanggilan fungsi tampil barang.
		
		$('#mydata').dataTable();
		 
		//fungsi tampil barang
		function tampil_data_barang(){
		    $.ajax({
		        type  : 'GET',
		        url   : '<?php echo base_url()?>index.php/Dashboard/data_komentar',
		        async : true,
		        dataType : 'json',
		        success : function(data){
		            var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<div class="review_item">'+
		                  		'<div class="media">'+
		                  		'<div class="d-flex">'+
		                        '<img src="<?= base_url() ?>vendor/mebel/img/product/single-product/review-1.png" alt="" />'+
		                        '</div>'+
		                        '<div class="media-body">'+
		                        '<h4>'+data[i].nama_kostumer+'</h4>'+
		                        '<h5>'+'12th Feb, 2017 at 05:56 pm'+'</h5>'+
		                        '</div>'+
		                        '</div>'+
                                '<p>'+' Lorem ipsum dolor sit amet, consectetur adipisicing elit'+'</p>'+
		                        '</div>';
		            }
		            $('#show_data').html(html);
		        }

		    });
		}

		//GET UPDATE
		$('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/barang/get_barang')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                	$.each(data,function(barang_kode, barang_nama, barang_harga){
                    	$('#ModalaEdit').modal('show');
            			$('[name="kobar_edit"]').val(data.barang_kode);
            			$('[name="nabar_edit"]').val(data.barang_nama);
            			$('[name="harga_edit"]').val(data.barang_harga);
            		});
                }
            });
            return false;
        });


		//GET HAPUS
		$('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });

		//Simpan Barang
		$('#btn_simpan').on('click',function(){
            var kobar=$('#kode_barang').val();
            var nabar=$('#nama_barang').val();
            var harga=$('#harga').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/simpan_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar"]').val("");
                    $('[name="nabar"]').val("");
                    $('[name="harga"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //Update Barang
		$('#btn_update').on('click',function(){
            var kobar=$('#kode_barang2').val();
            var nabar=$('#nama_barang2').val();
            var harga=$('#harga2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/barang/update_barang')?>",
                dataType : "JSON",
                data : {kobar:kobar , nabar:nabar, harga:harga},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="harga_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_barang();
                }
            });
            return false;
        });

        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/barang/hapus_barang')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            tampil_data_barang();
                    }
                });
                return false;
            });

	});

</script>

</html>