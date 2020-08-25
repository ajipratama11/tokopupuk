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
                        <h2 style="color: #1E7BCB;"> Buku Besar</h2><br>
                        <?php echo $this->session->flashdata('sukses'); ?>
                        <!-- <div class="col-md-12 row">
                            <form class="col-md-4" action="<?= base_url() ?>Admin/Laporan/laporan_suplier" method="POST">
                                <div class="">
                                    <select class="form-control" name="nama_suplier" id="sel_reff">
                                        <?php
                                        $this->db->group_by('akun.no_reff');
                                        $this->db->join('transaksi', 'transaksi.no_reff=akun.no_reff', 'right');
                                        $data = $this->db->get('akun')->result();
                                        foreach ($data as $j) {

                                        ?>
                                            <option value="<?= $j->no_reff ?>"> <?= $j->nama_reff ?> </option><?php } ?>
                                    </select>
                                </div>
                            </form>
                        </div> -->


                        <div class="form-group col-md-12">
                            <!-- Name -->
                            <div class="col-md-2 ">
                                <h4></h4><br>

                            </div>
                        </div><br><br>
                        <div class="table-responsive">
                            <h1>Kas</h1>
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
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
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
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit->total - $kredit->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Persediaan</h1>
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
                                    foreach ($persediaan as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_p->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_p->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit_p->total - $kredit_p->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Penjualan</h1>
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
                                    foreach ($penjualan as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_pen->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_pen->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($kredit_pen->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Peralatan</h1>
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
                                    foreach ($peralatan as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_per->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_per->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit_per->total - $kredit_per->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Beban Gaji</h1>
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
                                    foreach ($beban as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_beban->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_beban->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit_beban->total - $kredit_beban->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Prive</h1>
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
                                    foreach ($prive as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_prive->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_prive->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit_prive->total - $kredit_prive->total)  ?></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <div class="table-responsive">
                            <h1>Modal</h1>
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
                                    foreach ($modal as $j) {
                                    ?>
                                        <tr>
                                            <td><?= formatHariTanggal($j->tgl_transaksi) ?></td>
                                            <td><?= $j->nama_reff ?></td>
                                            <?php
                                            if ($j->jenis_saldo == '1') {
                                            ?>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                                <td>Rp. 0</td>
                                            <?php } else { ?>
                                                <td>Rp. 0</td>
                                                <td>Rp. <?= number_format($j->saldo, 0, ',', '.') ?></td>
                                            <?php } ?>

                                        </tr>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="2" class="text-center"><b>Jumlah Total</b></td>
                                        <td><b>
                                                Rp. <?= number_format($debit_modal->total)  ?>
                                        </td> </b>

                                        <td><b>
                                                Rp. <?= number_format($kredit_modal->total)  ?>
                                        </td> </b>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-center"> Rp. <?= number_format($debit_modal->total - $kredit_modal->total)  ?></td>
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
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            var userDataTable = $('#userTable').DataTable({
                //   'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                //'searching': false, // Remove default Search Control
                'ajax': {
                    'url': '<?= base_url() ?>Admin/Laporan/reffList',
                    'data': function(data) {
                        data.searchReff = $('#sel_reff').val();
                        // data.searchBulan = $('#sel_bulan').val();
                        console.log(data);
                    }

                },
                'columns': [{
                        data: 'tanggal'
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'debit'
                    },
                    {
                        data: 'kredit'
                    },
                    {
                        data: 'total'
                    }

                ]
            });

            $('#sel_reff').change(function() {
                userDataTable.draw();
            });
            $('#searchName').keyup(function() {
                userDataTable.draw();
            });
        });
    </script> -->