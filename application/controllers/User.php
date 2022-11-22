<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Home_model');
		if($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') {
			redirect('login');
		}
	}

	public function index() {
		$data = array (
			'title'				=>	'Dashboard user',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/orders', $data);
	}

	public function detailmodal() {
		$data = array (
			'title'				=>	'Dashboard user',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/detailmodal', $data);
	}


	public function uplod_bukti_transfer($id) {
		if($id == '') {
			redirect('user/panel');
		}
		$data = array (
			'title'				=>	'Upload bukti transfer',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
			'trxid'				=>	$this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
		);
		$this->form_validation->set_rules('id', 'id', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/upload_bukti', $data);
		}else {
			$this->User_model->upload_bukti($id);
			$this->ns_pay_success();
			$this->session->set_flashdata('flash', 'Bukti pembayaran berhasil diupload, transaksi anda akan segera diproses.');
			redirect('user/panel');
		}
	}

	private function ns_pay_success() {
		$data = array (
			'ns_id'			=>   md5(rand()),
			'ns_dari'		=>   $this->session->userdata('userid'),
			'ns_perihal'	=>   'Baru saja mengirimkan bukti pembayaran',
			'ns_status'		=>   0,
		);
	
		$this->db->insert('tb_notif_sistem', $data);
	}

	public function send_review($id) {
		if($id == '') {
			redirect('user/panel');
		}
		$data = array (
			'title'				=>	'Beri penilaian',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
			'trxid'				=>	$this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
		);
		$this->form_validation->set_rules('bintang', 'bintang', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('produk', 'produk', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/kirim_reviews', $data);
		}else {
			$this->User_model->kirim_reviews($id);
			$this->session->set_flashdata('flash', 'Ulasan berhasil dikirim');
			redirect('user/panel');
		}
	}

	public function wishlist() {
		$data = array (
			'title'				=>	'Wishlist',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
			'wishlist'			=>	$this->User_model->data_wishlist(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
		);
		$this->load->view('mobile/wishlist', $data);
	}

	public function delete_wishlist($id) {
		$this->db->where('list_id', $id);
		$this->db->delete('tb_wishlist');
		redirect('user/wishlist');
	}

	public function notifikasi() {
		$data = array (
			'title'				=>	'Notifikasi',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/notifikasi', $data);
	}

	public function notifikasi_r($id) {
		$this->db->set('notif_status', 2);
		$this->db->where('notif_id', $id);
		$this->db->update('tb_notifikasi');
		redirect('user/notifikasi');
	}

	public function akun() {
		$data = array (
			'title'				=>	'Akun',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/akun', $data);
	}

	public function akun_profil() {
		$data = array (
			'title'				=>	'Profil',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('telp', 'telp', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/profil', $data);
		}else {
			$this->User_model->simpan_profil();
		}
	}

	public function akun_password() {
		$data = array (
			'title'				=>	'Password',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password2', 'password2', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/password', $data);
		}else {
			$this->User_model->simpan_password();
		}
	}
}