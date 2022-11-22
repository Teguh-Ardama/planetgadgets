<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_model extends CI_Model {
	public function all_produk_forhome() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}
}