<?php $this->load->view('template/head'); ?>

<body>
    <!--::header part start::-->
    <?php $this->load->view('template/header'); ?>
    <!-- Header part end-->
    <?php
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/basic/province?id=$destination",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
        ),
    ));



    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //echo $response;

        $data = json_decode($response, true);
        //echo json_encode($k['rajaongkir']['results']);


        //   for ($i=0; $i < count($data['rajaongkir']['results']); $i++){


        //     echo "<option value='".$data['rajaongkir']['results'][10]['province_id']."'>".$data['rajaongkir']['results'][10]['province']."</option>";

        //   }
        //   for ($j=0; $j < count($data['rajaongkir']['results']); $j++){


        //     echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";


        //   }

    }
    ?>
    <?php
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/basic/city?id=$origin&province=$destination",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
        ),
    ));



    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //echo $response;

        $data = json_decode($response, true);
        //echo json_encode($k['rajaongkir']['results']);


        //   for ($i=0; $i < count($data['rajaongkir']['results']); $i++){


        //     echo "<option value='".$data['rajaongkir']['results'][10]['province_id']."'>".$data['rajaongkir']['results'][10]['province']."</option>";

        //   }
        //   for ($j=0; $j < count($data['rajaongkir']['results']); $j++){


        //     echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";


        //   }

    }
    ?>

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

    <!--================Checkout Area =================-->
    <section class="checkout_area padding_top">
        <div class="container">


            <div class="billing_details">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li>
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
                                                    <td><?php echo $items['id'] ?></td>
                                                    <td><?php echo $items['name'] ?></td>

                                                    <td>Rp. <?php $format_indonesia = number_format($items['price'], 0, ',', '.');
                                                            echo $format_indonesia ?>,00-</td>
                                                    <td><?php echo $items['qty'] ?></td>
                                                    <td>Rp. <?php $format_indonesia = number_format($items['subtotal'], 0, ',', '.');
                                                            echo $format_indonesia ?>,00-</td>
                                                </tr>
                                    </table>
                                <?php endforeach; ?>
                                </li>
                                <h2>Alamat Pengiriman</h2>
                                <li>
                                    <a href="#">Nama Penerima
                                        <span><?php echo $namapengirim; ?></span>
                                    </a>
                                </li>
                                <?php $provinsi = $data['rajaongkir']['results']['province'];
                                    $kab = $data['rajaongkir']['results']['city_name']; ?>
                                <li>
                                    <a href="#">Provinsi
                                        <span><?php echo $provinsi  ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Kabupaten/kota
                                        <span><?php echo $kab  ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">kecamatan
                                        <span><?php echo $kecamatan; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Desa
                                        <span><?php echo $desa; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Rt
                                        <span><?php echo $rt; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Rw
                                        <span><?php echo $rw; ?></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Ongkir
                                        <?php $dalamkota = 200000;
                                        $luarkota = 300000;
                                        $luarjatim = 700000;
                                        $luarjawa = 1000000;
                                        $totalpesan = $this->cart->total();
                                        if ($origin == 160) {
                                            $ongkir = $dalamkota;
                                            $totalbayar = $totalpesan + $dalamkota;
                                        } else if($destination == 11 && $origin != 160) {
                                            $ongkir = $luarkota;
                                            $totalbayar = $totalpesan + $luarkota;
                                        } else if($destination == 3 || $destination == 5 || $destination == 6 || $destination == 9 || $destination == 10 || $destination == 11 ) {
                                            $ongkir = $luarjatim;
                                            $totalbayar = $totalpesan + $luarjatim;
                                        }else{
                                            $ongkir = $luarjawa;
                                            $totalbayar = $totalpesan + $luarjawa;
                                        }
                                        ?>
                                       
                                            <span>Rp.<?php $format_indonesia = number_format($ongkir, 0, ',', '.');
                                                        echo $format_indonesia;  ?>,00-</span>
                                       
                                            
                                       
                                    </a>
                                </li>
                                <li>
                                <a href="#">Total Bayar

                                       
                                            <span>Rp.<?php $format_indonesia = number_format($totalbayar, 0, ',', '.');
                                                echo $format_indonesia;  ?>,00-</span>
                                       
                                            
                                       
                                    </a>
                                </li>
                                <li>
                                <a href="#">Diskon

                                       
                                            <span>Rp.<?php $format_indonesia = number_format($diskon, 0, ',', '.');
                                                echo $format_indonesia;  ?>,00-</span>
                                       
                                            
                                       
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <?php $finalbayar = $totalbayar-$diskon; ?>
                                        <h2>Total Bayar</h2>
                                        <h2>Rp.<?php $format_indonesia = number_format($finalbayar, 0, ',', '.');
                                                echo $format_indonesia;  ?>,00-</h2>
                                    </a>
                                </li>
                                <li>
                                <li
                                </li>
                            </ul>
                            <form action="<?php echo base_url('Pesanan/insert_pesan') ; ?>" method="post">
                                <input type="hidden" name="namapengirim" value="<?php echo $namapengirim; ?>">
                                <input type="hidden" name="provinsi" value="<?php echo $provinsi; ?>">
                                <input type="hidden" name="kota" value="<?php echo $kab; ?>">
                                <input type="hidden" name="kecamatan" value="<?php echo $kecamatan; ?>">
                                <input type="hidden" name="desa" value="<?php echo $desa; ?>">
                                <input type="hidden" name="rt" value="<?php echo $rt; ?>">
                                <input type="hidden" name="rw" value="<?php echo $rw; ?>">
                                <input type="hidden" name="kodepos" value="<?php echo $kodepos; ?>">
                                <input type="hidden" name="telp" value="<?php echo $telp; ?>">
                                <input type="hidden" name="idpesan" value="<?php echo $idpesan; ?>">
                                <input type="hidden" name="harga_kirim" value="<?php echo $ongkir; ?>">
                                <input type="hidden" name="total_pesan" value="<?php echo $finalbayar; ?>">
                                <!-- <input type="hidden" name="idpesanx" value="<?php echo $idpesanx; ?>"> -->

                                <button type="submit" class="btn_3" href="#">Proceed to Paypal</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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