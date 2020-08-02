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
                        <h2 style="color: #1E7BCB;"> Neraca Saldo</h2><br>
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
                                            <td colspan="4" style="background-color: red; color:aliceblue" class="text-center"><b>TIDAK SEIMBANG</b></td>
                                        <?php } else { ?>
                                            <td colspan="4" style="background-color: #1E7BCB;color:aliceblue" class="text-center"><b>SEIMBANG</b></td>
                                        <?php } ?>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->

    <!-- Pop up -->
    <script type="text/javascript">
        function confirm_alert(node) {
            return confirm("Apakah anda yakin ingin menghapus kategori?");
        }
    </script>
    <!-- Script -->