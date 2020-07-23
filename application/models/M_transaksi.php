<?php 
 
class M_transaksi extends CI_Model{
	function tampil_pesan($iduser){
		$query = $this->db->query("SELECT * FROM pesan JOIN pengiriman ON pesan.pengiriman_id_kirim=pengiriman.id_kirim WHERE id_kostumer_id='$iduser' ORDER BY id_pesan DESC");
		return $query->result();
	}
	function tampil_pesan2(){
		$query = $this->db->query("SELECT * FROM pemesanan  ORDER BY id_pemesanan DESC");
		return $query->result();
	}
	function tampil_keranjang($iduser,$keranjang){
		$query = $this->db->query("SELECT * FROM `pesan` JOIN keranjang ON pesan.id_pesan=keranjang.pesan_id_pesan JOIN produk ON produk.id_produk=keranjang.produk_id_produk WHERE pesan.id_kostumer_id='$iduser' AND pesan_id_pesan='$keranjang'");
		return $query->result();
	}
	function user($iduser){
		$query = $this->db->query("SELECT * FROM kostumer WHERE id_kostumer='$iduser'");
		return $query->result();
	}
	function tampil_pengiriman($idkirim){
		$query = $this->db->query("SELECT * FROM pengiriman WHERE id_kirim='$idkirim'");
		return $query->result();
	}
	function invoice($idpesan2,$iduser){
		$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan WHERE pesan_id_pesan='$idpesan2' AND keranjang.id_kostumer_id='$iduser'");
		return $query->result();
	}
	// function invoice2($id,$idpesan2,$iduser){
	// 	$query = $this->db->query("SELECT * FROM keranjang JOIN produk ON produk.id_produk=keranjang.produk_id_produk JOIN pesan ON keranjang.pesan_id_pesan=pesan.id_pesan JOIN user ON keranjang.user_id_user=user.id_user WHERE pesan_id_pesan='$idpesan2' AND produk_id_produk='$id' AND keranjang.user_id_user='$iduser'");
	// 	return $query->result();
	// }
	function totalPemasukan(){
		$query = $this->db->query("SELECT SUM(sub_total) AS totalMasuk FROM pemesanan");
		return $query->result();
	}
}
?>