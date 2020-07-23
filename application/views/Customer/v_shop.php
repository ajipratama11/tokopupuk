<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_shop_list">
    <!-- loader -->

    <!-- end loader -->
    <!-- header -->
    <?php $this->load->view('Customer/v_header') ?>
    <!-- end header -->
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title"><?= $nama->nama_kategori_brg ?></h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Beranda</a></li>
                                    <li class="active">Produk Pupuk</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <!-- section -->
    <div class="section padding_layout_1 product_list_main">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($pupuk as $p) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <div class="product_img"> <img class="img-responsive" src="<?= base_url() ?>assets/customer/images/it_service/pupuk.png" alt=""> </div>
                                    <div class="product_detail_btm">
                                        <div class="center">
                                            <h4><a href="<?= base_url('Customer/Produk/detail_produk/' . $p->id_barang) ?>"><?= $p->nama_barang ?></a></h4>
                                        </div>

                                        <div class="product_price">
                                            <p><span class="new_price">Rp. <?= number_format($p->harga_barang, 0, ',', '.') ?></span></p>

                                        </div>
                                        <div style="margin-top:10px;" class="center">
                                            <p style="text-align: center; font-size:12px;"><span>Stok : <?= $p->stok_barang ?> pcs</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <h4>SEARCH</h4>
                            <div class="side_bar_search">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </span> </div>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>Kategori Pupuk</h4>
                            <div class="categary">
                                <ul>
                                    <?php
                                    $data = $this->db->get('kategori_barang')->result();
                                    foreach ($data as $d) { ?>
                                        <li><a href="<?= base_url("Customer/Produk/kategori/$d->id_kategori") ?>"><i class="fa fa-angle-right"></i><?= $d->nama_kategori_brg ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section padding_layout_1 testmonial_section white_fonts">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_left">
                            <h2 style="text-transform: none;">What Clients Say?</h2>
                            <p class="large">Here are testimonials from clients..</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <div class="full">
                        <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#testimonial_slider" data-slide-to="0" class="active"></li>
                                <li data-target="#testimonial_slider" data-slide-to="1"></li>
                                <li data-target="#testimonial_slider" data-slide-to="2"></li>
                            </ul>
                            <!-- The slideshow -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="testimonial-container">
                                        <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                            I am really satisfied with my first laptop service. </div>
                                        <div class="testimonial-photo"> <img src="images/it_service/client1.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                        <div class="testimonial-meta">
                                            <h4>Maria Anderson</h4>
                                            <span class="testimonial-position">CFO, Tech NY</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="testimonial-container">
                                        <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                            I am really satisfied with my first laptop service. </div>
                                        <div class="testimonial-photo"> <img src="images/it_service/client2.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                        <div class="testimonial-meta">
                                            <h4>Maria Anderson</h4>
                                            <span class="testimonial-position">CFO, Tech NY</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="testimonial-container">
                                        <div class="testimonial-content"> You guys rock! Thank you for making it painless, pleasant and most of all hassle free! I wish I would have thought of it first.
                                            I am really satisfied with my first laptop service. </div>
                                        <div class="testimonial-photo"> <img src="images/it_service/client3.jpg" class="img-responsive" alt="#" width="150" height="150"> </div>
                                        <div class="testimonial-meta">
                                            <h4>Maria Anderson</h4>
                                            <span class="testimonial-position">CFO, Tech NY</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="full"> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="contact_us_section">
                            <div class="call_icon"> <img src="images/it_service/phone_icon.png" alt="#" /> </div>
                            <div class="inner_cont">
                                <h2>REQUEST A FREE QUOTE</h2>
                                <p>Get answers and advice from people you want it from.</p>
                            </div>
                            <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="it_contact.html">Contact us</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section padding_layout_1" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <ul class="brand_list">
                            <li><img src="images/it_service/brand_icon1.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon2.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon3.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon4.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon5.png" alt="#" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- Modal -->
    <div class="modal fade" id="search_bar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                            <div class="navbar-search">
                                <form action="#" method="get" id="search-global-form" class="search-global">
                                    <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                                    <button class="search-global__btn"><i class="fa fa-search"></i></button>
                                    <div class="search-global__note">Begin typing your search above and press return to search.</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model search bar -->
    <?php $this->load->view('Customer/v_footer') ?>
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>