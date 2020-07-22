<style>
  /* The Modal (background) */
.modal {
  
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
<!-- fungsi input hanya admin -->
<script>
  function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }
</script>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="container">
	<div class="row">
		
		<div class="col-sm-12 col-sm-offset-1" style="background-color: white;padding:20px;">
			<h2 style="color: #1E7BCB;">Daftar Produk</h2><br>
      <button class="btn btn-warning" id="myBtn">+ Tambah Stok</button>
      <a href="<?php echo base_url('Admin/Barang/tambah_barang') ?>" class="btn btn-primary" >+ Tambah Produk</a> 
      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form action="<?php echo base_url('Owner_controller/Beranda/tambahstok') ?>" method="post">
            <input type="text" name="id_produk" placeholder="#Id Produk" required="required">
            <input type="number" min="1" name="tambahstok" placeholder="Jumlah stok" required="required">
          <button class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
			<div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                           <th>
                            
                          </th>     
                          <th>
                            Aksi
                          </th> 
                          <th>
                            Gambar
                          </th>
                          <th>
                            Id Produk
                          </th>
                          <th>
                            Nama Produk
                          </th>
                          <th>
                            Stok
                          </th>
                          <th>
                            Kategori
                          </th>
                          </th>
                          
                          <th>
                            Harga
                          </th>
                           
                          <th>
                            Keterangan
                          </th>  
                                           
                        </tr>
                      </thead>
                      <tbody>
                      	
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
      return confirm("Apakah anda yakin ingin menghapus produk?");
  }
</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
