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
            <h2 class="text-gray">Tambah Barang</h2><br><br>
            <?= form_open_multipart('Admin/Barang/insert_barang'); ?>
			
				<div class="form-group col-md-6">
					Nama produk :
					<input type="text" name="nama_barang" class="form-control" required="required" placeholder="Nama produk anda">
				</div>
				
				<div class="form-group col-md-6">
					Harga produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="7" name="harga_barang" min="1" class="form-control" required="required" placeholder="Harga produk">
				</div>
				<div class="form-group col-md-6">
					Stok produk:
					<input onkeypress="return hanyaAngka(event)" maxlength="4" name="stok_barang" min="1" class="form-control" required="required" placeholder="Stok produk">
				</div> 
				<div class="form-group col-md-6">
					Tanggal Masuk:
					<input type="date"  name="tgl_masuk_barang" min="1" class="form-control" required="required" >
				</div>
				<div class="form-group col-md-6">
					Upload gambar  :<br><br>
					<input type="file" name="gambar"  required="required" placeholder="Upload gambar" style="padding-right:1px;">
                </div> 
				<?php foreach($kategori as $a){?> 
				<input type="hidden" name="id_kategori" value="<?php echo $a->id_kategori; ?>">
				<?php } ?>
				<div class="form-group col-md-6">
					Kategori :
					<select name="kategori" class="form-control">
						<?php foreach($kategori as $av){?>
						<?php echo "<option>".$a->nama_kategori_brg."</option>"; ?>
						<?php } ?>
					</select>
				</div>      
				<?php foreach($suplier as $ac){?> 
				<input type="hidden" name="id_suplier" value="<?php echo $ac->id_suplier; ?>">
				<?php } ?>
				<div class="form-group col-md-6">
					Suplier :
					<select name="suplier" class="form-control">
						<?php foreach($suplier as $ab){?>
						<?php echo "<option>".$ab->nama_suplier."</option>"; ?>
						<?php } ?>
					</select>
				</div>         
				<div class="form-group col-md-12">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					<a href="<?php echo base_url('Barang'); ?>"><button type="button" value="batal" class="btn btn-primary">Batal</button></a>
				</div>
			<?php form_close(); ?>
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
