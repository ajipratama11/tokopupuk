<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h2 style="color: #1E7BCB;">Detail Pesanan</h2><br>




            <div class="row">
              <div class="col-md-12">
                <table class="table">

                  <?php foreach ($pesan as $a) { ?>

                    <tr>
                      <th>Id pesanan</th>
                      <td> <?= $a->id_pemesanan ?> </td>
                    </tr>
                    <tr>
                      <th>Nama Pemesan</th>
                      <td><?= $a->nama ?> </td>
                    </tr>
                    <tr>
                      <th>Barang</th>
                      <td><?= $a->nama_barang ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Barang</th>
                      <td><?= $a->jumlah_barang ?></td>
                    </tr>
                    <tr>
                      <th>Jumlah Bayar</th>
                      <td><?= $a->sub_total ?></td>
                    </tr>
                    <tr>
                      <th>Tgl Pemesanan</th>
                      <td><?= $a->tgl_pemesanan ?></td>
                    </tr>
                    <tr>
                      <th>Status Pembayaran</th>
                      <td><?= $a->status_pembayaran ?></td>
                    </tr>

                    <tr>
                      <th>Alamat Kirim</th>
                      <td><?= $a->alamat_pengiriman ?></td>
                    </tr>
                    <tr>
                      <th>Gambar</th>
                      <td><a target="_blank" href="<?php echo base_url('./assets/images/' . $a->gambar); ?>"><img style="width: 200px; height:200px;" src="<?php echo base_url('./upload/' . $a->gambar); ?>"></a></td>
                    </tr>


                </table>

              <?php } ?>







              <br><br>

              <!-- content-wrapper ends -->
              </div>
            </div>
          </div>
        </div>