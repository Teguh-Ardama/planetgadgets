<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function profil_toko() {
		$this->db->where('profil_id', 1);
		return $this->db->get('tb_profil')->row_array();
	}

	public function all_produk() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get()->result_array();
	}

	public function all_produk_forhome() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}

	public function all_produk_bys() {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('rand()');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}

	public function cari_produk($key) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('produk_tgl', 'DESC');
		$this->db->like('produk_name', $key);
		$this->db->or_like('produk_price', $key);
		return $this->db->get()->result_array();
	}

	public function cari_artikel($s) {
		$this->db->like('blog_judul', $s);
		$this->db->or_like('blog_isi', $s);
		return $this->db->get('tb_blog')->result_array();
	}

	public function all_slider() {
		$this->db->order_by('slider_urutan', 'ASC');
		return $this->db->get('tb_slider')->result_array();
	}

	public function detail_produk($id,$tag,$url) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->where('produk_url', $url);
		$this->db->where('url', $tag);
		$this->db->where('produk_id', $id);
		return $this->db->get()->row_array();
	}

	public function related_produk($tag) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->where('url', $tag);
		$this->db->limit(4);
		return $this->db->get()->result_array();
	}

	public function ulasan_produk($id) {
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('tb_reviews', 'tb_reviews.re_produkid = tb_produk.produk_id');
		$this->db->join('tb_users', 'tb_users.user_id = tb_reviews.re_userid');
		$this->db->where('produk_id', $id);
		$this->db->order_by('re_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function detail_artikel($url) {
		return $this->db->get_where('tb_blog', ['blog_url' => $url])->row_array();
	}

	public function all_kategori() {
		$this->db->order_by('rand()');
		return $this->db->get('tb_kategori')->result_array();
	}

	public function data_artikel_for_home() {
		$this->db->order_by('blog_tgl', 'DESC');
		$this->db->limit(4);
		return $this->db->get('tb_blog')->result_array();
	}

	public function data_artikel() {
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function register_user() {
		$data = array (
			'user_id'				=>	md5(rand()),
			'user_nama'				=>	ucwords($this->input->post('nama')),
			'user_telp'				=>	$this->input->post('telp'),
			'user_email'			=>	strtolower($this->input->post('email')),
			'user_alamat'			=>	$this->input->post('alamat'),
			'user_kpos'				=>	$this->input->post('kpos'),
			'user_sandi'			=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
			'user_status'			=>	1,
			'user_foto'				=>	'user.png',
		);
		$token = base64_encode(openssl_random_pseudo_bytes(32));
		$member_token = array (
			'email'					=>	strtolower($this->input->post('email')),
			'token'					=>	$token,
			'created'				=>	time()
		);
		$this->db->insert('tb_users', $data);
		$this->db->insert('tb_token', $member_token);
		$this->_sendemail($token);
	}

	private function _sendemail($token) {
		$cekmail = $this->db->get_where('tb_email',['email_id' => 1])->row_array();

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'AKTIVASI AKUN PLANET GADGETS';
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_host'] = 'ssl://mail.zonaban.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '5';
		$config['smtp_user'] = $cekmail['email']; //email anda di sini
		$config['smtp_pass'] = $cekmail['email_password']; // password email anda di sini
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from($cekmail['email'], 'AKTIVASI AKUN PLANET GADGETS');  //email anda di sini
		$this->email->to($this->input->post('email'));
        $this->email->subject('AKTIVASI AKUN PLANET GADGETS');
		$this->email->message('<h4>Hi, ' .ucwords($this->input->post('nama')) . '</h4>Klik tombol di bawah ini untuk memverifikasi email anda. <p><a href="' . base_url() . 'home/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Verifikasi</a></p>');

		$this->email->send();
	}

	public function sigin_user() {
		$mail = $this->input->post('email');
		$sandi = $this->input->post('password');

		$cek_blok = $this->db->get_where('tb_users',['user_email' => $mail])->row_array();
		if($cek_blok['user_status'] == 2) {
			$this->session->set_flashdata('error','Maaf, akun anda terblokir');

			redirect('login');
		}

		$cek_user = $this->db->get_where('tb_users',['user_email' => $mail])->row_array();
		if($cek_user) {
			if($cek_user['user_status'] == 1) {
				if(password_verify($sandi, $cek_user['user_sandi'])) {
					$sess_create = array (
						'userid'			=>	$cek_user['user_id'],
						'loginstatus'		=>	'6484bbvnvfdswuieywor3443993'
					);

					$this->session->set_userdata($sess_create);
					if($this->session->userdata('kesini')) {
						redirect($this->session->userdata('kesini'));
					}else {
						redirect('user/panel');
					}
				}else {
					$this->session->set_flashdata('error','Password anda salah');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error','Akun anda belum aktif, silahkan cek kembali email konfirmasi dari kami');
				redirect('login');
			}
		}else {
			$this->session->set_flashdata('error','Email tidak ditemukan');
			redirect('login');
		}
	}

	public function data_cart() {
		$this->db->where('cart_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_cart')->result_array();
	}

	public function simpan_transaksi() {
		$this->db->order_by('transaksi_urut', 'DESC');
        $sqlinc = $this->db->get('tb_transaksi');
        if ($sqlinc->num_rows() == 0) {
        	$autoinc = 1;
        }else {
        	$urutinc = $sqlinc->row()->transaksi_urut;
        	$urutinc++;
        	$autoinc = $urutinc;
        }
        $this->db->order_by('transaksi_urut', 'DESC');
        $sql = $this->db->get('tb_transaksi');
        if ($sql->num_rows() == 0) {
          $kodetrx   = date('Ym')."0001";
        }else{
          $noUrut       = substr($sql->row()->transaksi_kode, 6, 4);
          $noUrut++;
          $kodetrx     = date('Ym').sprintf("%04s", $noUrut);
        }
		$id_order = md5(time());
		$prov = explode(",", $this->input->post('prov', TRUE));
		$kota = explode(",", $this->input->post('kota', TRUE));
		$alamat = $this->input->post('alamat', TRUE);
		$pos = $this->input->post('pos', TRUE);
		$kurir = $this->input->post('kurir', TRUE);
		$layanan = explode(",", $this->input->post('layanan', TRUE));
		$ongkir = $this->input->post('ongkir', TRUE);
		$total = $this->input->post('total', TRUE);
		$tgl_pesan = date("Y-m-d");
		$bts = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
		$note = $this->input->post('note');
		$resi = $this->input->post('resi');

		$data = array (
			'transaksi_id'				=> $id_order,
			'transaksi_userid'			=> $this->session->userdata('userid'),
			'transaksi_penerima'		=> $this->input->post('nama'),
			'transaksi_telp'			=> $this->input->post('telp'),
			'transaksi_total'			=> $total,
			'transaksi_tujuan'			=> $alamat,
			'transaksi_pos'				=> $pos,
			'transaksi_prov'			=> $prov[1],
			'transaksi_kota'			=> $kota[1],
			'transaksi_kurir'			=> $kurir,
			'transaksi_service'			=> $layanan[1],
			'transaksi_tgl_pesan'		=> $tgl_pesan,
			'transaksi_bts_bayar'		=> $bts,
			'transaksi_tgl'				=> date('Y-m-d'),
			'transaksi_status'			=> 'belum',
			'transaksi_note'			=> $note,
			'transaksi_urut'			=> $autoinc,
			'transaksi_kode'			=> $kodetrx,
			'transaksi_ongkir'			=> $ongkir,
			'transaksi_kode_promo'		=> $this->session->userdata('kodepromo'),
			'transaksi_persen_promo'	=> $this->session->userdata('potonganprc'),
			'transaksi_total_potongan'	=> $this->session->userdata('potongan'),
			'transaksi_resi'			=> $resi,
		);

		if($this->db->insert('tb_transaksi', $data)) {
			foreach ($this->cart->contents() as $key) {
				$detail = array (
					'd_transaksi_id'		=> $id_order,
					'd_transaksi_item'		=> $key['id'],
					'd_transaksi_qty' 		=> $key['qty'],
					'd_transaksi_biaya' 	=> $key['subtotal']
				);

				$this->db->insert('tb_detail_transaksi', $detail);
			}
			$this->cart->destroy();
			if($this->session->userdata('kodepromo')) {
				$this->session->unset_userdata('kodepromo');
				$this->session->unset_userdata('potongan');
				$this->session->unset_userdata('potonganprc');
				$this->session->unset_userdata('potongantitle');
				$this->session->unset_userdata('dibayar');
			}
			$this->session->set_flashdata('flash', 'Transaksi berhasil, silahkan pilih metode pembayaran anda');
			$this->simpan_notif_pilih();
			$this->ns_trx_success();
			redirect('metode-pembayaran');
		}else {
			$this->session->set_flashdata('error', 'Transaksi gagal, silahkan coba lagi');
			redirect('checkout');
		}
	}

	private function ns_trx_success() {
		$data = array (
			'ns_id'			=>   md5(rand()),
			'ns_dari'		=>   $this->session->userdata('userid'),
			'ns_perihal'	=>   'Baru saja melakukan transaksi',
			'ns_status'		=>   0,
		);
	
		$this->db->insert('tb_notif_sistem', $data);
	}

	public function produkbytag($url) {
		$this->db->select('*');
		$this->db->from('tb_rkategori');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_rkategori.id_item');
		$this->db->where('url', $url);
		return $this->db->get()->result_array();
	}

	public function simpan_notif_pilih() {
		$data = array (
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Transaksi berhasil, silahkan pilih metode pembayaran anda',
			'notif_userid'		=>   $this->session->userdata('userid'),
			'notif_status'		=>   1,
		);
	
		$this->db->insert('tb_notifikasi', $data);
	}

	public function simpan_notif_bayar_selesai() {
		$data = array (
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Metode pembayaran berhasil di pilih, silahkan lakukan pembayaran sesuai metode yang dipilih',
			'notif_userid'		=>   $this->session->userdata('userid'),
			'notif_status'		=>   1,
		);
	
		$this->db->insert('tb_notifikasi', $data);
	}
}