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
            <div class="cart_inner">
                <a style="float: right;" href="<?php echo base_url(); ?>" class="btn btn-success">Kembali ke Home / Belanja Lagi</a>
                <h3>Silahkan klik <a href="<?php echo base_url('Bukti'); ?>" class="genric-btn success medium">DISINI</a> untuk upload Bukti Pembayaran</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Kode Pesan</td>
                                <td class="description">Tanggal pesan</td>
                                <td class="price">Pengiriman</td>
                                <td class="quantity">Total</td>
                                <td class="total">Status</td>
                                <td class="total">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pesan as $a) { ?>
                                <tr>
                                    <td class="cart_product">
                                        <h3 style="padding-left: 7px;"><?php echo $a->id_pesan; ?></h3>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a><?php echo date('d-m-Y H:i:s', strtotime($a->tanggal_pesan)); ?></a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $a->kabupaten; ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <h4>Rp <?php $format_indonesia = number_format($a->total_pesan, 0, ',', '.');
                                                echo $format_indonesia; ?></h4>
                                    </td>
                                    <td class="cart_total">
                                        <?php
                                        if ($a->status == 'Proses') {
                                            echo '<button type="button" class="btn">' . $a->status . '</button>';
                                        } elseif ($a->status == 'Batal') {
                                            echo '<button type="button" class="btn btn-danger">' . $a->status . '</button>';
                                        } else {
                                            echo '<button type="button" class="btn btn-success">' . $a->status . '</button>';
                                        }
                                        ?>

                                        <!-- <button type="button" class="btn"><?php echo $a->status; ?></button> -->
                                        <!-- <button type="button" class="btn btn-danger">Danger</button> -->
                                    </td>
                                    <td class="cart_total">
                                        <form target="_blank" action="<?php echo base_url('Transaksi/detail_transaksi/' . $a->id_kirim); ?>" method="post">
                                            <input type="hidden" name="idpesan" value="<?php echo $a->id_pesan; ?>">
                                            <input type="hidden" name="harga_kirim" value="<?php echo $a->harga_kirim; ?>">
                                            <input type="hidden" name="total_pesan" value="<?php echo $a->total_pesan; ?>">
                                            <input type="hidden" name="iduser" value="<?php echo $a->id_kostumer_id; ?>">
                                            <input type="hidden" name="kode_pos" value="<?php echo $a->kodepos; ?>">
                                            <input type="hidden" name="status" value="<?php echo $a->status; ?>">
                                            <button type="submit" class="btn btn-primary">Lihat detail transaksi</button>
                                        </form><br>
                                        <!-- <p><a target="_blank" href="<?php echo base_url('Transaksi/detail_transaksi/' . $a->keranjang_id_keranjang . '/' . $a->id_pesan . '/' . $a->total_pesan . '/' . $a->id_kirim); ?>">Lihat detail transaksi</a></p> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <p>*Daftar transaksi pemesanan yang anda lakukan,<br> lakukan pembayaran dalam jangka waktu 24 jam semenjak transaksi anda lakukan.</p>
                    </table>
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