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
                                                                      $format_indonesia = number_format($a->totalMasuk, 0, ',', '.');
                                                                      echo $format_indonesia; ?>
                    </h4>
                  <?php } ?>
                </div>
              </div>
            </div>
            <a href="<?= base_url() ?>Admin/Laporan/penjualan" style="float: right; font-size:12px;">Lihat</a>
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
                <p class="mb-0 text-right">Kas Anda</p>
                <div class="fluid-container">
                  <h4 class="font-weight-medium text-right mb-0"> Rp.<?= number_format($adm->kas, 0, ',', '.')  ?></h4>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Jumlah kas saat ini
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
          <div class="card-body">
            <div class="clearfix">
              <div class="float-left">
                <i class="mdi mdi-account-location text-info icon-lg"></i>
              </div>
              <div class="float-right">
                <p class="mb-0 text-right">Total Pengeluaran</p>
                <div class="fluid-container">
                  <h4 class="font-weight-medium text-right mb-0"> Rp.<?= number_format($pengeluaran->total, 0, ',', '.')  ?></h4>

                </div>

              </div>

            </div>
            <a href="<?= base_url() ?>Admin/Laporan/pengeluaran" style="float: right; font-size:12px;">Lihat</a>
            <p class="text-muted mt-3 mb-0">
              <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total pengeluaran sampai <?= formatHariTanggal(date('Y-m-d')) ?>
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
              <form action="<?php echo base_url('Owner_controller/Beranda/cari'); ?>" method="post">
                <div class="row mb-3" style="float: right;">
                  <input class="form-control col-md-6" type="text" name="cari" placeholder="#Kode pesan" required="required">
                  <button class="btn btn-success" type="submit">Cari</button>
                </div>

              </form>
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
                  <?php foreach ($pesan2 as $a) { ?>

                    <tr>
                      <td class="font-weight-medium">
                        <h4 style="padding-left: 7px; font-size:10px;"><?php echo $a->id_trans; ?></h4>
                      </td>
                      <td class="font-weight-medium">
                        <h4 style="padding-left: 7px;"><?php echo $a->nama; ?>
                        </h4>
                      </td>
                      <td>
                        <h4>Rp <?php $format_indonesia = number_format($a->total_bayar, 0, ',', '.');
                                echo $format_indonesia; ?></h4>
                      </td>
                      <td>

                        <?php
                        if ($a->status_pembayaran == 'Belum Bayar') {
                          echo '<a  data-toggle="modal" data-target="#modalLihat' . $a->id_trans . '"><button type="button" class="btn">' . $a->status_pembayaran . '</button></a>';
                        } else if ($a->status == 'Proses Kirim') {
                          echo '<a  onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/statusterkirim/' . $a->id_pemesanan) . '"><button type="button" class="btn btn-warning">' . $a->status_pembayaran . '</button></a>';
                        } else if ($a->status == 'Sudah Checkout') {
                          echo '<a  onclick="return confirm_alert(this);" href="' . base_url('Admin/Beranda/status/' . $a->id_trans) . '"><button type="button" class="btn btn-warning">' . $a->status . '</button></a>';
                        } else {
                          echo '<button type="button" class="btn btn-success">' . $a->status . '</button>';
                        }
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url('Admin/Beranda/detailtransaksi/' . $a->id_trans); ?>" type="button" class="btn btn-warning">Detail Transaksi</a>
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
  <!-- content-wrapper ends -->
  <script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
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