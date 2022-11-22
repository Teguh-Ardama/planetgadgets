<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function add() {
		if($this->session->userdata('kodepromo')) {
			$this->session->unset_userdata('kodepromo');
			$this->session->unset_userdata('potongan');
			$this->session->unset_userdata('potonganprc');
			$this->session->unset_userdata('potongantitle');
			$this->session->unset_userdata('dibayar');
		}
		$id = $this->uri->segment(3);
		$cek = $this->calb($id);
		$data = array (
			'id'			=>   $cek['produk_id'],
			'name'			=>   $cek['produk_name'],
			'price'			=>   $cek['produk_price_diskon'],
			'image'			=>   $cek['produk_image'],
			'weight'		=>   $cek['produk_weight'],
			'stok'			=>   $cek['produk_stok'],
			'disc'			=>   $cek['produk_diskon'],
			'category'		=>   $cek['kategori'],
			'qty'			=>   1,
		);
	
		$this->cart->insert($data);
		redirect('pc/'.$cek['produk_id'].'/'.$cek['url'].'/'.$cek['produk_url']);
	}

	private function calb($id) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->where('produk_id', $id);
		$this->db->limit(8);
		return $this->db->get()->row_array();
	}

	public function add_cart() {
		if($this->session->userdata('kodepromo')) {
			$this->session->unset_userdata('kodepromo');
			$this->session->unset_userdata('potongan');
			$this->session->unset_userdata('potonganprc');
			$this->session->unset_userdata('potongantitle');
			$this->session->unset_userdata('dibayar');
		}
		$id = $this->input->post('id');
		$cek = $this->calb($id);
		$data = array (
			'id'			=>   $cek['produk_id'],
			'name'			=>   $cek['produk_name'],
			'price'			=>   $cek['produk_price_diskon'],
			'image'			=>   $cek['produk_image'],
			'weight'		=>   $cek['produk_weight'],
			'stok'			=>   $cek['produk_stok'],
			'disc'			=>   $cek['produk_diskon'],
			'category'		=>   $cek['kategori'],
			'qty'			=>   $this->input->post('quantity')
		);
	
		$this->cart->insert($data);
		redirect('pc/'.$cek['produk_id'].'/'.$cek['url'].'/'.$cek['produk_url']);
	}

	public function update() {
		$info = $_POST['cart'];
		foreach($info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$weight = $cart['weight'];
			$qty = $cart['qty'];
			$image = $cart['image'];
			$amount = $price * $qty;

			$data = array (
				'rowid'			=>	$rowid,
				'price'			=>	$price,
				'weight'		=>	$weight,
				'qty'			=>	$qty,
				'image'			=>	$image,
				'amount'		=>	$amount
			);

			$this->cart->update($data);
		}
		$this->session->set_flashdata('flash','Keranjang belanja berhasil diperbaharui');
		redirect('cart');
	}

	public function delete($id) {
		if($this->session->userdata('kodepromo')) {
			$this->session->unset_userdata('kodepromo');
			$this->session->unset_userdata('potongan');
			$this->session->unset_userdata('potonganprc');
			$this->session->unset_userdata('potongantitle');
			$this->session->unset_userdata('dibayar');
		}
		$this->cart->remove($id);
		redirect('');
	}

}