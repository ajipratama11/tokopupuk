<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 style="color: #1E7BCB;"> Jurnal Umum</h2><br>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <form action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                            <div class="row">
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                            <!-- Name -->
                            <div class="col-md-2 ">
                                <h4></h4><br>

                            </div>
                        </div><br><br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id='userTable'>
                                <thead>
                                    <tr>
                                        <th>
                                            Tanggal
                                        </th>
                                        <th>
                                            Nama Akun
                                        </th>
                                        <th>
                                            Debit
                                        </th>
                                        <th>
                                            Kredit
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($jurnal as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td><?= $j->saldo ?></td>
                                                <td> 0</td>
                                            <?php } else { ?>
                                                <td> 0</td>
                                                <td><?= $j->saldo ?></td>
                                            <?php } ?>
                                            <td><button data-toggle="modal" data-target="#modalEdit<?= $j->id_transaksi ?>" class="btn btn-info">Edit</button>
                                                <button data-toggle="modal" data-target="#modalHapus<?= $j->id_transaksi ?>" class="btn btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <?php
                                        if ($debit->total != $kredit->total) {
                                        ?>
                                            <td colspan="5" style="background-color: red; color:aliceblue" class="text-center"><b>TIDAK SEIMBANG</b></td>
                                        <?php } else { ?>
                                            <td colspan="5" style="background-color: #1E7BCB;color:aliceblue" class="text-center"><b>SEIMBANG</b></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        foreach ($jurnal as $j) {
        ?>
            <div class="modal fade" id="modalHapus<?= $j->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Jurnal </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="<?= base_url() ?>Admin/Laporan/hapusJurnal">
                            <div class="modal-body">

                                <label>Hapus jurnal Id Transaksi <?= $j->id_transaksi ?></label>
                                <input name="id_transaksi" hidden value="<?= $j->id_transaksi ?>">

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger">Hapus</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <!-- content-wrapper ends -->

    <!-- Pop up -->
    <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#akun').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('Admin/Laporan/getJenis'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {

                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value=' + data[i].no_reff + '>' + data[i].nama_reff + '</option>';
                        }
                        $('#jenis_saldo').html(html);

                    }
                });
                return false;
            });

        });
    </script>
    <!-- Script -->