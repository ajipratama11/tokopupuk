<!-- partial -->
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Pendapatan</p>
                      <div class="fluid-container">
                        
                      <?php foreach ($total as $a) { ?>
                        <h4 class="font-weight-medium text-right mb-0">Rp <?php
                          $format_indonesia = number_format ($a->totalMasuk, 0, ',', '.');
                          echo $format_indonesia;?>
                        </h4>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total pemasukan
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total pesanan</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?= $pemesanan ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Jumlah semua transaksi pesan
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Costumer</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?= $customer ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Jumlah total semua pengguna
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Admin</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?= $admin; ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Jumlah total semua pegawai
                  </p>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Daftar pesanan pelanggan 
                    <div style="float: right;margin-right: 30px;">
                      <form action="<?php echo base_url('Owner_controller/Beranda/cari'); ?>" method="post">
                        <input style="height: 25px;" type="text" name="cari" placeholder="#Kode pesan" required="required">
                        <button type="submit" style="height: 25px">Cari</button>
                      </form>
                    </div>
                  </h3>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID Pemesan
                          </th>
                          <th>
                            Nama Pemesan
                          </th>
                          <th>
                            Total Bayar
                          </th>
                           <th>
                            Status
                          </th>
                          <th>
                            Aksi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($pesan as $a) { ?>

                          <tr>
                          <td class="font-weight-medium">
                            <h4 style="padding-left: 7px;"><?php echo $a->id_pemesanan; ?></h4>
                          </td>
                          <td class="font-weight-medium">
                            <h4 style="padding-left: 7px;"><?php echo $a->nama; ?>
                            </h4>
                          </td>
                          <td>
                            <h4>Rp <?php $format_indonesia = number_format ($a->sub_total, 0, ',', '.');
                          echo $format_indonesia; ?></h4>
                          </td>
                          <td>
                    
                              <?php 
                              if ($a->status_pembayaran=='Belum Bayar') {
                                echo '<a  data-toggle="modal" data-target="#modalLihat'.$a->id_trans.'"><button type="button" class="btn">'.$a->status_pembayaran.'</button></a>';
                                
                              }else if ($a->status_pembayaran=='batal') {
                                echo '<button type="button" class="btn btn-danger">'.$a->status_pembayaran.'</button>';
                              }else{
                                echo '<button type="button" class="btn btn-success">'.$a->status_pembayaran.'</button>';
                              }
                              ?>
                          </td>
                          <td>
                            <a href="<?= base_url('Admin/Beranda/detailtransaksi/'.$a->id_pemesanan); ?>" type="button" class="btn btn-warning">Detail Transaksi</a>
                          </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
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

                        <table>
                            <thead>
                                <tr>
                                    <th>Tanggal Checkout</th>
                                    <th>Total Bayar</th>
                                    <th>Bank</th>
                                    <th >Bukti Transfer</th>
                                    <th >Alamat Pengiriman</th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                 <td><?= $k->tanggal_checkout ?></td>
                                 <td><?= $k->total_bayar ?></td>
                                 <td><?= $k->bank ?></td>
                                 <td><?= $k->bukti_transfer ?></td>
                                 <td><?= $k->alamat_pengiriman ?></td>
                               </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                    <?php 
                              if ($a->status_pembayaran=='Belum Bayar') {
                                echo '<a onclick="return confirm_alert(this);" href="'.base_url('Admin/Beranda/status/'.$a->id_pemesanan).'"><button type="button" class="btn">'.$a->status_pembayaran.'</button></a>';
                                
                              }else if ($a->status_pembayaran=='batal') {
                                echo '<button type="button" class="btn btn-danger">'.$a->status_pembayaran.'</button>';
                              }else{
                                echo '<button type="button" class="btn btn-success">'.$a->status_pembayaran.'</button>';
                              }
                              ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
        <!-- content-wrapper ends -->
        <script type="text/javascript">
    
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
 
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin mengganti status menjadi terbayar?");
  }
</script>