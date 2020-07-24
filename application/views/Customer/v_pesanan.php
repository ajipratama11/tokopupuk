<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('Customer/v_style_head') ?>

<body id="default_theme" class="it_serv_shopping_cart shopping-cart">
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
                                <h1 class="page-title">Pesanan Anda</h1>
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Beranda</a></li>
                                    <li class="active">Shopping Cart</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1 Shopping_cart_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="product-table">
                        <form action="<?= base_url('Customer/Shop/update_cart') ?>" method="post">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Data Pemesan</th>
                                        <th class="text-center">Total Bayar</th>
                                        <th class="text-center">Status</th>
                                        <th> Lihat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($trans as $t) {
                                    ?>
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <div class="media"> <a class="thumbnail pull-left" href="#"> </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#"><?= $t->tanggal_checkout ?></a></h4>
                                                        <span>Alamat: </span><span class="text-success"><?= $t->alamat_pengiriman ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                                <p class="price_table">Rp.<?= number_format($t->total_bayar, 0, ',', '.')  ?></p>
                                            </td>
                                            <td class="col-sm-1 col-md-1 text-center">
                                                <p class="price_table"><?= $t->status_pembayaran ?></p>
                                            </td>

                                            <td class="col-sm-1 col-md-1"><button type="button" data-toggle="modal" data-target="#modalLihat<?= $t->id_trans ?>" class="bt_main"><i class="fa fa-edit"></i> Remove</button></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($trans as $k) {
    ?>
        <div class="modal fade" id="modalLihat<?= $k->id_trans ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Barang Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Pupuk</th>
                                    <th>Jumlah</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->join('barang', 'pemesanan.id_barang=barang.id_barang');
                                $this->db->where('id_trans', $k->id_trans);
                                $ker = $this->db->get('pemesanan')->result();
                                foreach ($ker as $c) {
                                ?>
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media"> <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?= base_url('assets/customer/images/it_service/' . $c->gambar) ?>" alt="#"></a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#"><?= $c->nama_barang ?></a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center; ">
                                            <p class="price_table"><?= $c->jumlah_barang ?></p>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center">
                                            <p class="price_table">Rp.<?= number_format($c->harga_barang, 0, ',', '.')  ?></p>
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center">
                                            <p class="price_table">Rp.<?= number_format($c->sub_total, 0, ',', '.') ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- footer -->
    <?php $this->load->view('Customer/v_footer') ?>
    <!-- end footer -->
    <?php $this->load->view('Customer/v_style_foot') ?>
</body>

</html>