<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h2 style="color: #1E7BCB;">Daftar Admin</h2><br>
                  <div class="table-responsive"><br>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #Id User
                          </th>
                          <th>
                           Username
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($admin as $a) {?>
                        <tr>
                          <td class="font-weight-medium">
                            <?php echo $a->id_admin; ?>
                          </td>
                          <td>
                            <?php echo $a->username; ?>
                          </td>
                          <td>
                            <center><a href="<?php echo base_url('Owner_controller/O_user/edituser/'.$a->id_admin); ?>"><button type="button" class="btn btn-warning"><i class="menu-icon mdi mdi-pen"></i> Edit</button></a>
                              <a onclick="return confirm_alert(this);" href="<?php echo base_url('Owner_controller/O_user/hapus_user/'.$a->id_admin); ?>"><button type="button" class="btn btn-danger"><i class="menu-icon mdi mdi-delete"></i> Hapus</button></a>
                            </center>

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

<!-- Pop up -->
<script type="text/javascript">
  function confirm_alert(node) {
      return confirm("Apakah anda yakin ingin menghapus user?");
  }
</script>