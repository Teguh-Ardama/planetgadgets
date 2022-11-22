<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Laporan_model');
		if($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
	}

	public function index() {
		$this->session->set_userdata('kesini', 'admin/dashboard');
		$datarow = $this->Admin_model->graph();
		$data = array (
			'title'					=>	'Dashboard admin',
			'profit'				=>	$this->Laporan_model->hasil(),
			'totalproduk'			=>	$this->db->get('tb_produk')->num_rows(),
			'totaluser'				=>	$this->db->get('tb_users')->num_rows(),
			'totaltrx'				=>	$this->db->get('tb_transaksi')->num_rows(),
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'trxpending'			=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'belum'])->num_rows(),
			'trxdibayar'			=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'dibayar'])->num_rows(),
			'trxsukses'				=>	$this->db->get_where('tb_transaksi',['transaksi_status' => 'diproses'])->num_rows(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'transaksi'				=>	$this->Admin_model->data_transaksi_index(),
			'prolar'				=>	$this->Admin_model->produk_terlaris(),
			'listmember'			=>	$this->Admin_model->data_member_index(),
			'dstatik'				=>	json_encode($datarow),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('admin/footer');
	}

	public function produk() {
		$this->session->set_userdata('kesini', 'admin/master/produk');
		$data = array (
			'title'					=>	'Produk',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'produk'				=>	$this->Admin_model->data_produk(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('admin/footer');
	}

	public function add_produk() {
		$this->session->set_userdata('kesini', 'admin/master/produk/new');
		$data = array (
			'title'					=>	'Input produk',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'kat'					=>	$this->Admin_model->data_kategori(),
			'rk'					=>	'',
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harga harus berupa angka']);
		$this->form_validation->set_rules('stok', 'stok', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('berat', 'berat', 'required|numeric', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'numeric'	=>	'Harus berupa angka']);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_produk', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_produk();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/produk');
		}
	}

	public function edit_produk($id) {
		$this->session->set_userdata('kesini', 'admin/master/produk/edit/'.$id);
		$table = "tb_rkategori rk JOIN tb_kategori k ON (rk.id_kategori_r = k.id_kategori)";
		$rk = $this->db->get_where($table, ['rk.id_item' => $id]);

		$value = '';
		foreach ($rk->result() as $k) {
			$value .= ', '.$k->kategori;
		}
		$data = array (
			'title'				=>	'Edit produk',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'kat'				=>	$this->Admin_model->data_kategori(),
			'kategori'			=>	trim($value, ', '),
			'rk'				=>	$rk,
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'produkid'			=>	$this->db->get_where('tb_produk', ['produk_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('harga', 'harga', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harga harus berupa angka']);
		$this->form_validation->set_rules('stok', 'stok', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('berat', 'berat', 'required|numeric', [
				'required'	=>	'Kolom ini tidak boleh kosong',
				'numeric'	=>	'Harus berupa angka']);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_produk', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->ubah_produk($id);
			$this->session->set_flashdata('flash', 'Produk berhasil diperbaharui');
			redirect('admin/master/produk');
		}
	}

	public function hapus_produk($id) {
		$cek = $this->db->get_where('tb_produk', ['produk_id' => $id])->row_array();
		$this->Admin_model->cek_aks();
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_produk');
		$this->db->where('id_item', $id);
		$this->db->delete('tb_rkategori');
		unlink('wp-content/img/product/'.$cek['produk_image']);
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/produk');
	}

	public function add_photos($id) {
		$this->session->set_userdata('kesini', 'admin/master/produk/image/'.$id);
		$cek = $this->db->get_where('tb_produk', ['produk_id' => $id])->row_array();
		$data = array (
			'title'					=>	'Tambahkan gambar lainnya untuk '.$cek['produk_name'],
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('id', 'id', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/produk_photos', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_photos($id);
			$this->session->set_flashdata('flash', 'Gambar lainnya berhasil ditambahkan');
			redirect('admin/master/produk');
		}
	}

	public function kategori() {
		$this->session->set_userdata('kesini', 'admin/master/kategori');
		$data = array (
			'title'				=>	'Kategori',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'kategori'			=>	$this->Admin_model->data_kategori(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('admin/footer');
	}

	public function add_kategori() {
		$this->session->set_userdata('kesini', 'admin/master/kategori/new');
		$data = array (
			'title'					=>	'Input kategori',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_kategori', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_kategori();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/kategori');
		}
	}

	public function edit_kategori($id) {
		$this->session->set_userdata('kesini', 'admin/master/kategori/edit/'.$id);
		$data = array (
			'title'					=>	'Edit kategori',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'katid'					=>	$this->db->get_where('tb_kategori',['id_kategori' => $id])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_kategori', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_kategori($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/kategori');
		}
	}

	public function hapus_kategori($id) {
		$cek = $this->db->get_where('tb_kategori',['id_kategori' => $id])->row_array();
		$this->Admin_model->cek_aks();
		$this->db->where('id_kategori', $id);
		$this->db->delete('tb_kategori');
		unlink('wp-content/img/category/'.$cek['kat_image']);
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/kategori');
	}

	public function slider() {
		$this->session->set_userdata('kesini', 'admin/master/slider');
		$data = array (
			'title'					=>	'Slider',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'slider'				=>	$this->Admin_model->data_slider(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/slider', $data);
		$this->load->view('admin/footer');
	}

	public function add_slider() {
		$this->session->set_userdata('kesini', 'admin/master/slider/new');
		$data = array (
			'title'					=>	'Input slider',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('teks1', 'teks1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_slider', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_slider();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/slider');
		}
	}

	public function edit_slider($id) {
		$this->session->set_userdata('kesini', 'admin/master/slider/edit/'.$id);
		$data = array (
			'title'					=>	'Edit slider',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'slideid'				=>	$this->db->get_where('tb_slider',['slider_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('teks1', 'teks1', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_slider', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_slider($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/slider');
		}
	}

	public function hapus_slider($id) {
		$cek = $this->db->get_where('tb_slider',['slider_id' => $id])->row_array();
		$this->Admin_model->cek_aks();
		$this->db->where('slider_id', $id);
		$this->db->delete('tb_slider');
		unlink('wp-content/img/slider/'.$cek['slider_gambar']);
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/slider');
	}

	public function email() {
		$this->session->set_userdata('kesini', 'admin/master/email');
		$data = array (
			'title'					=>	'Konfigurasi email',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'email'					=>	$this->db->get_where('tb_email',['email_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email harus valid']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/email', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_email();
			$this->session->set_flashdata('flash', 'Konfigurasi email berhasil');
			redirect('admin/master/email');
		}
	}

	public function lokasi() {
		$this->session->set_userdata('kesini', 'admin/master/lokasi');
		$data = array (
			'title'					=>	'Konfigurasi lokasi toko',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'lokasi'				=>	$this->db->get_where('tb_lokasi',['lok_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('prov', 'prov', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kota', 'kota', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lokasi', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_lokasi();
			$this->session->set_flashdata('flash', 'Konfigurasi lokasi berhasil');
			redirect('admin/master/lokasi');
		}
	}

	public function promo() {
		$this->session->set_userdata('kesini', 'admin/master/promo');
		$data = array (
			'title'				=>	'Promo',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'promo'				=>	$this->Admin_model->data_promo(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/promo', $data);
		$this->load->view('admin/footer');
	}

	public function promo_add() {
		$this->session->set_userdata('kesini', 'admin/master/promo/new');
		$data = array (
			'title'				=>	'Input promo',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'promo'				=>	$this->Admin_model->data_promo(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('persen', 'persen', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kode', 'kode', 'required|is_unique[tb_promo.promo_kode]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'is_unique'	=>	'Kode promo sudah terdaftar']);
		$this->form_validation->set_rules('masa', 'masa', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_promo', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_promo();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/master/promo');
		}
	}

	public function promo_edit($id) {
		$this->session->set_userdata('kesini', 'admin/master/promo/edit/'.$id);
		$data = array (
			'title'				=>	'Edit promo',
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'promoid'			=>	$this->db->get_where('tb_promo',['promo_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('persen', 'persen', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kode', 'kode', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('masa', 'masa', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_promo', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->edit_promo($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/master/promo');
		}
	}

	public function promo_delete($id) {
		$this->db->where('promo_id', $id);
		$this->db->delete('tb_promo');
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/master/promo');
	}

	public function api_ongkir() {
		$this->session->set_userdata('kesini', 'admin/api/ongkir');
		$data = array (
			'title'					=>	'Konfigurasi API raja ongkir',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'apiconfig'				=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('key', 'key', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/api_ongkir', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_api_ongkir();
			$this->session->set_flashdata('flash', 'Konfigurasi api raja ongkir berhasil');
			redirect('admin/api/ongkir');
		}
	}

	public function api_midtrans() {
		$this->session->set_userdata('kesini', 'admin/api/midtrans');
		$data = array (
			'title'					=>	'Konfigurasi API midtrans',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'apiconfig'				=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('server', 'server', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('client', 'client', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/api_midtrans', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_api_midtrans();
			$this->session->set_flashdata('flash', 'Konfigurasi api midtrans berhasil');
			redirect('admin/api/midtrans');
		}
	}

	public function transaksi() {
		$this->session->set_userdata('kesini', 'admin/transaksi');
		$data = array (
			'title'					=>	'Transaksi',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'transaksi'				=>	$this->Admin_model->data_transaksi(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('admin/footer');
	}

	public function konfirmasi_transaksi($id) {
		$cek = $this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array();
		$userid = $cek['transaksi_userid'];
		if($cek['transaksi_bukti']) {
			$this->db->set('transaksi_status', 'dibayar');
			$this->db->where('transaksi_id', $id);
			$this->db->update('tb_transaksi');
			$this->session->set_flashdata('flash', 'Transaksi berhasil dikonfirmasi');
			$this->simpan_notif_konfirmasi($userid);
			redirect('admin/transaksi');
		}else {
			$this->session->set_flashdata('error', 'Bukti pembayaran belum ada, transaksi tidak bisa di proses');
			redirect('admin/transaksi');
		}
	}

	private function simpan_notif_konfirmasi($userid) {
		$data = array (
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Pembayaran sudah kami terima, transaksimu akan segera kami proses. Terima kasih.',
			'notif_userid'		=>   $userid,
			'notif_status'		=>   1,
		);
	
		$this->db->insert('tb_notifikasi', $data);
	}

	public function proses_transaksi($id) {
		$cek = $this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array();
		if($cek['transaksi_bukti']) {
			$this->db->set('transaksi_status', 'diproses');
			$this->db->where('transaksi_id', $id);
			$this->db->update('tb_transaksi');
			$this->session->set_flashdata('flash', 'Transaksi berhasil diproses');
			redirect('admin/transaksi');
		}else {
			$this->session->set_flashdata('error', 'Bukti pembayaran belum ada, transaksi tidak bisa di proses');
			redirect('admin/transaksi');
		}
	}

	public function detail_transaksi($id) {
		$this->session->set_userdata('kesini', 'admin/transaksi/show/'.$id);
		$cek = $this->db->get_where('tb_transaksi',['transaksi_id' => $id])->row_array();
		$data = array (
			'title'				=>	'Transaksi #'.$cek['transaksi_kode'],
			'me'				=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'		=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'		=>	$this->Admin_model->data_notifikasi_pesan(),
			'dtransaksi'		=>	$this->Admin_model->transaksibyid($id),
		);
		$this->form_validation->set_rules('resi', 'resi', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/detail_transaksi', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_detail_transaksi($id);
			$this->session->set_flashdata('flash', 'Resi berhasil ditambahkan');
			redirect('admin/transaksi');
		}
	}

	public function artikel() {
		$this->session->set_userdata('kesini', 'admin/artikel');
		$data = array (
			'title'					=>	'Artikel',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'artikel'				=>	$this->Admin_model->data_artikel(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/artikel', $data);
		$this->load->view('admin/footer');
	}

	function upload_image(){
        if(isset($_FILES["image"]["name"])){
            $config['upload_path'] = './wp-content/img/blog/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image')){
                $this->upload->display_errors();
                return FALSE;
            }else{
                $data = $this->upload->data();
                echo base_url().'wp-content/img/blog/'.$data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image(){
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if(unlink($file_name))
        {
            echo 'File Delete Successfully';
        }
    }

	public function add_post() {
		$this->session->set_userdata('kesini', 'admin/artikel/new');
		$data = array (
			'title'					=>	'Buat artikel',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_post', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_artikel();
			$this->session->set_flashdata('flash', 'Data baru berhasil ditambahkan');
			redirect('admin/artikel');
		}
	}

	public function edit_post($id) {
		$this->session->set_userdata('kesini', 'admin/artikel/edit/'.$id);
		$data = array (
			'title'					=>	'Edit artikel',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'artikelid'				=>	$this->db->get_where('tb_blog',['blog_id' => $id])->row_array(),
		);
		$this->form_validation->set_rules('judul', 'judul', 'required', [
				'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('isi', 'isi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_post', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->ubah_artikel($id);
			$this->session->set_flashdata('flash', 'Data berhasil diperbaharui');
			redirect('admin/artikel');
		}
	}

	public function hapus_post($id) {
		$cek = $this->db->get_where('tb_blog',['blog_id' => $id])->row_array();
		$this->Admin_model->cek_aks();
		$this->db->where('blog_id', $id);
		$this->db->delete('tb_blog');
		unlink('wp-content/img/blog/'.$cek['blog_gambar']);
		$this->session->set_flashdata('flash', 'Data berhasil dihapus');
		redirect('admin/artikel');
	}

	public function member() {
		$this->session->set_userdata('kesini', 'admin/member');
		$data = array (
			'title'					=>	'Member',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'member'				=>	$this->Admin_model->data_member(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('admin/footer');
	}

	public function blokir_user($id) {
		$this->db->set('user_status', 2);
		$this->db->where('user_id', $id);
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash', 'Akun berhasil diblokir');
		redirect('admin/member');
	}

	public function aktifkan_user($id) {
		$this->db->set('user_status', 1);
		$this->db->where('user_id', $id);
		$this->db->update('tb_users');
		$this->session->set_flashdata('flash', 'Akun berhasil diaktifkan kembali');
		redirect('admin/member');
	}

	public function komentar() {
		$this->session->set_userdata('kesini', 'admin/komentar');
		$data = array (
			'title'					=>	'Komentar produk',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'komentar'				=>	$this->Admin_model->data_komentar(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/komentar', $data);
		$this->load->view('admin/footer');
	}

	public function lap_transaksi() {
		$this->session->set_userdata('kesini', 'admin/laporan/transaksi');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		if($start == '' AND $end == '') {
			$data = array (
				'title'					=>	'Laporan transaksi',
				'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
				'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
				'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
				'transaksi'				=>	$this->Admin_model->data_transaksi(),
				'awal'					=>	$start,
				'akhir'					=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}else {
			$data = array (
				'title'					=>	'Laporan transaksi',
				'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
				'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
				'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
				'transaksi'				=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
				'awal'					=>	$start,
				'akhir'					=>	$end,
			);
			$this->load->view('admin/header', $data);
			$this->load->view('admin/lap_transaksi', $data);
			$this->load->view('admin/footer');
		}
	}

	public function lap_transaksi_excel() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'			=>	'Laporan Transaksi',
				'transaksi'		=>	$this->Laporan_model->data_transaksi(),
			);
			$this->load->view('admin/excel_transaksi', $data);
		}else {
			$data = array (
				'title'			=>	'Laporan Transaksi',
				'transaksi'		=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
			);
			$this->load->view('admin/excel_transaksi', $data);
		}
	}

	public function lap_transaksi_print() {
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$data = array (
				'title'			=>	'Laporan Transaksi',
				'transaksi'		=>	$this->Laporan_model->data_transaksi(),
			);
			$this->load->view('admin/print_trx', $data);
		}else {
			$data = array (
				'title'			=>	'Laporan Transaksi',
				'transaksi'		=>	$this->Admin_model->data_transaksi_filter(array($start,$end)),
			);
			$this->load->view('admin/print_trx', $data);
		}
	}

	public function lap_transaksi_pdf() {
		$title = "Laporan Transaksi";
		$start = $this->uri->segment(5);
		$end = $this->uri->segment(6);
		if($start == '' AND $end == '') {
			$transaksi = $this->Laporan_model->data_transaksi();
		}else {
			$transaksi = $this->Admin_model->data_transaksi_filter(array($start,$end));
		}
		$pdf = new FPDF('l','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFillColor(112, 226, 137);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(330,7,"Planet Gadgets Online Shopping",0,1,'C');
        // $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(330,7,$title,0,1,'C');
        $pdf->Ln(7);
		// $pdf->Rect(0, 15, 80, 15, 'F');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,10,'No',1,0,'C',1);
        $pdf->Cell(40,10,'Tanggal',1,0,'C',1);
        $pdf->Cell(40,10,'Kode',1,0,'C',1);
        $pdf->Cell(50,10,'Dari',1,0,'C',1);
        $pdf->Cell(30,10,'Total',1,0,'C',1);
        $pdf->Cell(130,10,'Tujuan',1,0,'C',1);
        $pdf->Cell(20,10,'Status',1,1,'C',1);

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach($transaksi as $ss) {
        	$pdf->Cell(10,10,$i.'.',1,0,'C');
        	$pdf->Cell(40,10,date('d-m-Y H:i', strtotime($ss['transaksi_time'])),1,0,'l');
        	$pdf->Cell(40,10,$ss['transaksi_kode'],1,0,'l');
        	$pdf->Cell(50,10,$ss['user_nama'],1,0,'l');
        	$pdf->Cell(30,10,number_format($ss['transaksi_total'],0,',','.'),1,0,'l');
        	$pdf->Cell(130,10,$ss['transaksi_kota'].', '.$ss['transaksi_prov'].', '.$ss['transaksi_pos'],1,0,'l');
        	$pdf->Cell(20,10,ucwords($ss['transaksi_status']),1,1,'l');
        	$i++;
        }
        $pdf->Output('D', $title.'.pdf');
	}

	public function lap_member() {
		$this->session->set_userdata('kesini', 'admin/laporan/member');
		$data = array (
			'title'					=>	'Laporan member',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'member'				=>	$this->Admin_model->data_member(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/lap_member', $data);
		$this->load->view('admin/footer');
	}

	public function lap_member_excel() {
		$data = array (
			'title'					=>	'Laporan member',
			'member'				=>	$this->Admin_model->data_member(),
		);
		$this->load->view('admin/lap_member_excel', $data);
	}

	public function lap_member_print() {
		$data = array (
			'title'					=>	'Laporan member',
			'member'				=>	$this->Admin_model->data_member(),
		);
		$this->load->view('admin/lap_member_print', $data);
	}

	public function lap_member_pdf() {
		$title = "Laporan member";
		$member = $this->Admin_model->data_member();
		$pdf = new FPDF('p','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFillColor(112, 226, 137);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(200,7,"Planet Gadgets Online Shopping",0,1,'C');
        // $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(200,7,$title,0,1,'C');
        $pdf->Ln(7);
		// $pdf->Rect(0, 15, 80, 15, 'F');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,10,'No',1,0,'C',1);
        $pdf->Cell(43,10,'Nama',1,0,'C',1);
        $pdf->Cell(52,10,'Email',1,0,'C',1);
        $pdf->Cell(30,10,'Telp/HP',1,0,'C',1);
        $pdf->Cell(25,10,'Status',1,0,'C',1);
        $pdf->Cell(35,10,'Registrasi',1,1,'C',1);

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach($member as $ss) {
        	if($ss['user_status'] == 0) {
        		$status = 'Belum Aktif';
    		}elseif($ss['user_status'] == 1) {
    			$status = 'Aktif';
			}else {
				$status = 'Terblokir';
			}
        	$pdf->Cell(10,10,$i.'.',1,0,'C');
        	$pdf->Cell(43,10,$ss['user_nama'],1,0,'l');
        	$pdf->Cell(52,10,$ss['user_email'],1,0,'l');
        	$pdf->Cell(30,10,$ss['user_telp'],1,0,'l');
        	$pdf->Cell(25,10,$status,1,0,'l');
        	$pdf->Cell(35,10,date('d-m-Y H:i', strtotime($ss['user_created'])),1,1,'l');
        	$i++;
        }
        $pdf->Output('D', $title.'.pdf');
	}

	public function lap_produk() {
		$this->session->set_userdata('kesini', 'admin/laporan/produk');
		$data = array (
			'title'					=>	'Laporan produk',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'produk'				=>	$this->Admin_model->data_produk(),
		);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/lap_produk', $data);
		$this->load->view('admin/footer');
	}

	public function lap_produk_excel() {
		$data = array (
			'title'					=>	'Laporan produk',
			'produk'				=>	$this->Admin_model->data_produk(),
		);
		$this->load->view('admin/lap_produk_excel', $data);
	}

	public function lap_produk_print() {
		$data = array (
			'title'					=>	'Laporan produk',
			'produk'				=>	$this->Admin_model->data_produk(),
		);
		$this->load->view('admin/lap_produk_print', $data);
	}

	public function lap_produk_pdf() {
		$title = "Laporan produk";
		$produk = $this->Admin_model->data_produk();
		$pdf = new FPDF('l','mm','Legal');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFillColor(112, 226, 137);
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(320,7,"Planet Gadgets Online Shopping",0,1,'C');
        // $pdf->Cell(10,10,'',0,1);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(320,7,$title,0,1,'C');
        $pdf->Ln(7);
		// $pdf->Rect(0, 15, 80, 15, 'F');
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(10,10,'No',1,0,'C',1);
        $pdf->Cell(135,10,'Nama',1,0,'C',1);
        $pdf->Cell(50,10,'Harga Normal',1,0,'C',1);
        $pdf->Cell(50,10,'Harga Diskon',1,0,'C',1);
        $pdf->Cell(30,10,'Diskon',1,0,'C',1);
        $pdf->Cell(30,10,'Berat',1,0,'C',1);
        $pdf->Cell(30,10,'Stok',1,1,'C',1);

        $pdf->SetFont('Times','',10);
        $i = 1;
        foreach($produk as $ss) {
        	$pdf->Cell(10,10,$i.'.',1,0,'C');
        	$pdf->Cell(135,10,$ss['produk_name'],1,0,'l');
        	$pdf->Cell(50,10,number_format($ss['produk_price'],0,',','.').',-',1,0,'l');
        	$pdf->Cell(50,10,number_format($ss['produk_price_diskon'],0,',','.').',-',1,0,'l');
        	$pdf->Cell(30,10,$ss['produk_diskon'].'%',1,0,'l');
        	$pdf->Cell(30,10,$ss['produk_weight'].' gram',1,0,'l');
        	$pdf->Cell(30,10,$ss['produk_stok'],1,1,'l');
        	$i++;
        }
        $pdf->Output('D', $title.'.pdf');
	}

	public function baca_notif($id) {
		$this->db->set('ns_status', 1);
		$this->db->where('ns_id', $id);
		$this->db->update('tb_notif_sistem');
		redirect($this->session->userdata('kesini'));
	}

	public function profil_toko() {
		$this->session->set_userdata('kesini', 'admin/master/profil');
		$data = array (
			'title'					=>	'Profil Toko',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
			'profilid'				=>	$this->db->get_where('tb_profil',['profil_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('email', 'email', 'valid_email', [
					'valid_email'=>	'Email tidak valid']);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric|min_length[10]|max_length[14]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Harus angka',
					'min_length'=>	'Minimal 10 angka',
					'max_length'=>	'Maksimal 14 angka']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/profil', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_profiltoko();
			$this->session->set_flashdata('flash', 'Profil toko berhasil diperbaharui');
			redirect('admin/master/profil');
		}
	}

	public function profil() {
		$data = array (
			'title'					=>	'Profil',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'regex_match'=>	'Nama harus berupa huruf']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email tidak valid']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akun_profil', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_profil();
		}
	}

	public function password() {
		$data = array (
			'title'					=>	'Password',
			'me'					=>	$this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array(),
			'notifikasi'			=>	$this->Admin_model->data_notifikasi(),
			'pesanmasuk'			=>	$this->Admin_model->data_notifikasi_pesan(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi password baru salah']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/akun_password', $data);
			$this->load->view('admin/footer');
		}else {
			$this->Admin_model->simpan_password();
		}
	}

	public function city() {
		$cekapi = $this->db->get_where('tb_api',['api_id' => 1])->row_array();
		$apikey = $cekapi['api_ongkir'];
		$prov = $this->input->post('prov', TRUE);
		$curl = curl_init();
		curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: $apikey"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
         $data = json_decode($response, TRUE);

         echo '<option value="" selected disabled>Kota / Kabupaten</option>';

         for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
            echo '<option value="'.$data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
         }
      }
   }

}