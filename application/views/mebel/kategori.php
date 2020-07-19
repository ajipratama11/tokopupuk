
<?php $this->load->view('template/head'); ?>


<body>
    
<?php $this->load->view('template/header'); ?>


<section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Shop Category</h2>
                            <p>Home <span>-</span> Shop Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <br>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3><b> Kategori </b></h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                    <a href="<?php echo base_url('Dashboard/kategori/'); ?>">All</a>
                                    </li>
                                <?php foreach($data as $u){?>
                                    <li>
                                    <a href="<?php echo base_url('Dashboard/kategori/'.$u->id_kategori); ?>"><?php echo $u->nama_kategori ; ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </aside>

                    </div>
                </div>
                <div class="col-lg-9">
                

                    <div class="row align-items-center latest_product_inner">
                    <?php foreach($produk as $b){ ?>
                    <div class="col-lg-4 col-sm-6">
                                    <div class="single_product_item">
                                        <img height="250px" width="250px" src="<?php echo base_url('./assets/images/depan/'.$b->gambar); ?>" alt="">
                                        <div class="single_product_text">
                                            <h4><?php echo $b->nama_produk ?></h4>
                                            <h3>Rp. <?php $format_indonesia = number_format ($b->harga, 0, ',', '.');
                                     echo $format_indonesia; ?>,00-</h3>
                                            <a href="<?php echo base_url('Dashboard/detailproduk/'.$b->id_produk); ?>" class="add_cart">Detail Product <i class="ti-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                        
                                <?php } ?>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

    <!-- product_list part start-->
   

    <!-- product_list part end-->




   <?php $this->load->view('template/footer'); ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <?php $this->load->view('template/foot'); ?>
</body>
