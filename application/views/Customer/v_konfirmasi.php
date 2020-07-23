<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_serv_shopping_cart it_checkout checkout_page">
    <!-- loader -->
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
                                <h1 class="page-title">Checkout</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Checkout</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 checkout_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">
                        <div class="tab-info login-section">
                            <p>Returning customer? <a href="#login" class="" data-toggle="collapse">Click here to login</a></p>
                        </div>
                        <div id="login" class="collapse">
                            <div class="login-form-checkout">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="username">Username or email <span class="required">*</span></label>
                                                <input class="input-text" name="username" id="username" required="" type="text">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="password">Password <span class="required">*</span></label>
                                                <input class="input-text" name="password" id="password" required="" type="password">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                                <button class="bt_main">Login</button>
                                                <span class="remeber">
                                                    <input type="checkbox">
                                                    Remember me</span> </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tab-info coupon-section">
                            <p>Have a coupon? <a href="#cupon" class="" data-toggle="collapse">Click here to enter your code</a></p>
                        </div>
                        <div id="cupon" class="collapse">
                            <div class="coupen-form">
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input class="input-text" name="coupon" placeholder="Coupon code" id="coupon" required="" type="text">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <button class="bt_main">Login</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="<?= base_url() ?>Customer/Shop/bayar" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout-form">
                            <form action="#">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <input name="id_cus" value="<?= $user->id_cus ?>">
                                                <label>Nama <span class="red">*</span></label>
                                                <input readonly name="nama" value="<?= $user->nama ?>" type="text">
                                                <input readonly name="total_bayar" value="<?= $total->total ?>" type="hidden">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Alamat Pengiriman <span class="red">*</span></label>
                                                <textarea name="alamat_pengiriman"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-field">
                                                <label>Kode pos <span class="red">*</span></label>
                                                <input readonly value="<?= $user->kode_pos ?>" name="pz" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-field">
                                                <label>No hp <span class="red">*</span></label>
                                                <input readonly value="<?= $user->no_hp ?>" name="ph" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-field">
                                                <label>Email address <span class="red">*</span></label>
                                                <input readonly value="<?= $user->email ?>" name="em" type="email">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="shopping-cart-cart">
                            <table>
                                <tbody>
                                    <tr class="head-table">
                                        <td>
                                            <h5>Keranjang Total</h5>
                                        </td>
                                        <td class="text-right"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3 class="mt-5">Total bayar:</h3>
                                        </td>
                                        <td class="text-right">
                                            <h4 class="mt-5">Rp.<?= number_format($total->total, 0, ',', '.') ?></h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 25px;">
                            <label class="mt-5" style=" color:red;">Cara Pembayaran <span class="red">*</span></label>
                            <label>- Mentransfer total yang harus dibayar pada no rekening di bawah</label>
                            <label>- Mengupload bukti pembayaran</label>
                            <label>- Pihak kami akan memverifikasi bukti pembayaran</label>
                            <label>- Jika valid barang akan dikirim sesuai alamat yang dicantumkan</label>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="payment-form">
                            <div class="col-xs-12 col-md-12">
                                <!-- CREDIT CARD FORM STARTS HERE -->
                                <div class="panel panel-default credit-card-box">
                                    <div class="panel-heading display-table">
                                        <div class="display-tr">
                                            <h3 class="panel-title display-td">Detail Pembayaran</h3>
                                            <div class="display-td"> <img class=" pull-right" src="<?= base_url() ?>assets/customer/images/it_service/accepted.png" alt="#"> </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row" id="payment-form">
                                            <div class="col-md-12">
                                                <div class="form-field">
                                                    <label>No Rekening</label>
                                                    <div class="form-field cardNumber">
                                                        <input name="cardNumber" value="0700 000 899 992" readonly required="" type="tel">
                                                        <span class="input-group-addon"><i class="fa fa-credit-card"></i></span> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-7">
                                                <div class="form-field">
                                                    <label><span class="hidden-xs">Tanggal Konfirmasi</span></label>
                                                    <input readonly name="tanggal_checkout" value="<?= $waktu ?>" placeholder="MM / YY" required="" type="tel">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-5 pull-right">
                                                <div class="form-field">
                                                    <label>BANK</label>
                                                    <select name="bank">
                                                        <option value="BRI">BRI</option>
                                                        <option value="BNI">BNI</option>
                                                        <option value="BCA">BCA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <div class="form-field">
                                                    <label>Upload Bukti Transfer</label>
                                                    <input type="file" name="bukti_transfer" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 payment-bt">
                                                <div class="center">
                                                    <button class="bt_main" type="submit">Checkout</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- CREDIT CARD FORM ENDS HERE -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>