<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"> <img src="<?= base_url() ?>vendor/mebel/img/animate_icon/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('Dashboard/index'); ?>"">Home</a>
                                </li>
                                <li class=" nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kategori
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">

                                        <a class="dropdown-item" href="<?php echo base_url('Dashboard/kategori') ?>">All</a>
                                        <?php foreach ($kategori as $u) { ?>

                                            <a class="dropdown-item" href="<?php echo base_url('Dashboard/kategori/' . $u->id_kategori); ?>"><?php echo $u->nama_kategori; ?></a>

                                        <?php } ?>




                                    </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Transaksi
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="<?php echo base_url('Transaksi'); ?>">Transaksi Anda</a>
                                    <!-- <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a> -->
                                </div>
                            </li>
                            <!--  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('Dashboard/testimonial') ?>">Testimonial</a>
                                </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Info
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="<?php echo base_url('Dashboard/contact') ?>">contact</a>
                                    <a class="dropdown-item" href="<?php echo base_url('Dashboard/faq') ?>">FAQ</a>



                                </div>
                            </li>
                            <?php if ($this->session->userdata('status') == "login") { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hai, Aku <?php echo $this->session->userdata("namauser"); ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="<?php echo base_url('Logout'); ?>">Logout</a>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('Landing_controller/Login') ?>">Login</a>
                                </li>
                            <?php } ?>
                            <?php if ($this->session->userdata('status') == "login") { ?>
                            <li class="nav-item dropdown">
                                    <a style="margin-top: 25px;" type="button" class="dropdown-toggle btn badge-pill btn-danger" id="navbarDropdown_1" data-toggle="dropdown" aria-haspopup="true">
                                        <span class="badge badge-pill badge-light"></span> Voucher
                                        <span class="sr-only">unread messages</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <?php $date = date('Y-m-d');
                                        $tg = $this->db->query("SELECT * FROM voucher")->result(); ?>
                                        <?php foreach($tg as $g) { ?>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-edit<?= $g->id_voucher; ?>"><?php echo $g->nama_voucher ?></a>
                                    <!-- <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a> -->
                                        <?php }?>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                  
                        <!-- <a href=""><i class="ti-heart"></i></a> -->
                        <div class="btn badge-pill btn-warning">

                            <i style="margin-left: 10px; margin-top: 2px" class="fas fa-cart-plus"><a> Keranjang :
                                    <?php $keranjang = $this->cart->total_items()  ?>
                                    <?php echo anchor('Dashboard/detail_keranjang', $keranjang)  ?>
                                </a></i>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
   
</header>
<?php if ($this->session->userdata('status') == "login") { ?>
<?php $no=0; foreach($tg as $row): $no++; ?>
                <div class="row">
                 <div id="modal-edit<?=$row->id_voucher;?>" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Voucher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                           
                            <div class="modal-body">
                                
                                   
                                       <!--  <h4><?php echo $row->nama_voucher; ?></h4> -->
                                       Total Voucher<h4><?php echo $row->total_voucher; ?></h4> <br>
                                       Minimum Belanja : <h4><?php echo $row->minimum_belanja; ?></h4><br>
                                        
                                       Kode : <h3><?php echo $row->keterangan; ?></h3>
                                   
                            </div>
                            <div class="modal-footer">
                                <?php
                                $h = $row->id_voucher;
                                $k = $this->session->userdata('iduser');
                                $q = $this->db->query("SELECT * FROM kostumer_voucher WHERE id_voucher='$h' AND id_kostumer_id='$k'")->num_rows();
                                ?>
                                <?php if($q == 0) { ?>
                                <a class="btn btn-primary" href="<?php echo base_url('Dashboard/detail_keranjang')  ?>">Save changes</a>
                                <?php }else{ ?>
                                <a class="btn btn-primary" href="#" disabled>Voucher telah terpakai</a>
                                <?php } ?>
                            </div>
                           
                        </div>
                    </div>
                </div>
                </div>
                <?php endforeach; ?>
                                <?php } ?>