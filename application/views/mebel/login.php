<?php $this->load->view('template/head'); ?>

<body>
    <!--::header part start::-->
    <?php $this->load->view('template/header'); ?>
    <!-- Header part end-->
    <!-- breadcrumb start-->
    <!-- <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Tracking Order</h2>
                            <p>Home <span>-</span> Tracking Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Pelanggan Baru?</h2>
                            <p>Jika belum mempunyai akun silahkan klik "Buat akun baru" untuk
                            membuat akun baru</p>
                            <a href="<?php echo base_url('Landing_controller/Login/regis') ?>" class="btn_3">Buat akun baru</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Selamat Datang ! <br>
                                Punya akun, Silahkan Login disini</h3>
                            <form class="row contact_form" action="<?php echo base_url('Landing_controller/Login/login') ?>" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="show-password" onclick="myFunction()" name="selector">
                                        <label for="f-option">Show Password</label>
                                    </div>
                                    <button type="submit" class="btn_3">
                                        log in
                                    </button>

                                    <a class="lost_pass" href="#" data-toggle="modal" data-target="#newMenuModal">Lupa password?</a>

                                </div>
                                <a class="lost_pass" href="<?php echo base_url('Owner_controller/A_login') ?>">Anda Admin? klik disini</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMenuModalLabel">Perbarui Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Landing_controller/Login/ubahpassword') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_kostumer" name="nama_kostumer" placeholder="Nama">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telp">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="password1" name="password1" placeholder="Password Baru">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Perbarui Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('Landing_controller/Login/ubahpassword') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kostumer" name="nama_kostumer" placeholder="Nama">
					</div>
					<br>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
					</div>
					<br>
					<div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Telp">
					</div>
					<br>
					<div class="form-group">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password Baru">
					</div>
					<br>
					<div class="form-group">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah Password</button>
                </div>
            </form> -->
        </div>
    </div>
</div> 
    <!--================login_part end =================-->

    <script type="text/javascript">
        function myFunction() {
            // Get the checkbox
            var checkBox = document.getElementById("show-password");
            // Get the output text
            var password = document.getElementById("password");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
    <!--::footer_part start::-->
    <?php $this->load->view('template/footer'); ?>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <?php $this->load->view('template/foot'); ?>
</body>

</html>