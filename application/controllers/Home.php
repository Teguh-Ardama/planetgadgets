<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('User_model');
		$cekapi = $this->db->get_where('tb_api',['api_id' => 1])->row_array();
		$params = array('server_key' => $cekapi['api_mid_server'], 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index() {
		$this->session->set_userdata('kesini', '');
		$data = array (
			'title'				=>	'Beranda',
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'produk'			=>	$this->Home_model->all_produk_forhome(),
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'produkbys'			=>	$this->Home_model->all_produk_bys(),
			'dataartikel'		=>	$this->Home_model->data_artikel_for_home(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'slider'			=>	$this->Home_model->all_slider(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
			'wishlist'			=>	$this->User_model->data_wishlist(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
		);
		$this->load->view('mobile/index', $data);
	}

	public function single($id,$tag,$url) {
		$cek = $this->db->get_where('tb_produk',['produk_id' => $id])->row_array();
		$data = array (
			'title'				=>	$cek['produk_name'],
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'detail'			=>	$this->Home_model->detail_produk($id,$tag,$url),
			'related'			=>	$this->Home_model->related_produk($tag),
			'ulasan'			=>	$this->Home_model->ulasan_produk($id),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'imglain'			=>	$this->db->get_where('tb_foto_rel',['fr_proid' => $id])->result_array(),
		);
		$this->load->view('mobile/single', $data);
	}

	public function single2($id,$tag,$url) {
		$cek = $this->db->get_where('tb_produk',['produk_id' => $id])->row_array();
		$data = array (
			'title'				=>	$cek['produk_name'],
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'detail'			=>	$this->Home_model->detail_produk($id,$tag,$url),
			'related'			=>	$this->Home_model->related_produk($tag),
			'ulasan'			=>	$this->Home_model->ulasan_produk($id),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'imglain'			=>	$this->db->get_where('tb_foto_rel',['fr_proid' => $id])->result_array(),
		);
		$this->load->view('mobile/single2', $data);
	}

	public function all_pro() {
		$data = array (
			'title'				=>	'Produk',
			'wishlist'			=>	$this->User_model->data_wishlist(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'produk'			=>	$this->Home_model->all_produk(),
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'produkbys'			=>	$this->Home_model->all_produk_bys(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'dataartikel'		=>	$this->Home_model->data_artikel_for_home(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/product', $data);
	}

	public function single_blog($url) {
		$cek = $this->db->get_where('tb_blog',['blog_url' => $url])->row_array();
		$data = array (
			'title'				=>	$cek['blog_judul'],
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'detailblog'		=>	$this->Home_model->detail_artikel($url),
		);
		$this->load->view('mobile/single_blog', $data);
	}

	public function cari_key() {
		$data['title'] = 'Hasil Pencarian';
		$data['profil'] = $this->Home_model->profil_toko();
		$data['cekapi'] = $this->db->get_where('tb_api',['api_id' => 1])->row_array();
		$key = $this->input->post('key');
		$data['key'] = $this->input->post('key');
		$data['produkbys'] = $this->Home_model->all_produk_bys();
		$data['dataartikel'] = $this->Home_model->data_artikel_for_home();
		$data['keranjang'] = $this->cart->contents();
		$data['wishlist'] = $this->User_model->data_wishlist();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['produk'] = $this->Home_model->cari_produk($key);
		$this->load->view('mobile/produk_results', $data);
	}

	public function signup() {
		$data = array (
			'title'				=>	'Registrasi',
			'keranjang'			=>	$this->cart->contents(),
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
		);
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'regex_match'=>	'Nama harus berupa huruf']);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[tb_users.user_email]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'valid_email'=>	'Email tidal valid',
					'is_unique'	=>	'Email ini telah terdaftar']);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric|max_length[15]|min_length[9]|is_unique[tb_users.user_telp]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'No telepon harus angka',
					'is_unique'	=>	'No telepon ini telah terdaftar',
					'max_length'=>	'Maksimal 15 karakter',
					'min_length'=>	'Minimal 9 karakter']);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'matches'	=>	'Konfirmasi sandi salah']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/daftar', $data);
		}else {
			$this->Home_model->register_user();
			// $this->ns_new_success();
			$this->session->set_flashdata('flash','Registrasi berhasil, silahkan cek email anda untuk mengaktifkan akun anda');
			redirect('login');
		}
	}

	private function ns_new_success() {
		$data = array (
			'ns_id'			=>   md5(rand()),
			'ns_dari'		=>   '',
			'ns_perihal'	=>   'Member baru',
			'ns_status'		=>   0,
		);
	
		$this->db->insert('tb_notif_sistem', $data);
	}

	public function sigin() {
		$data['title'] = 'Login';
		$data['profil'] = $this->Home_model->profil_toko();
		$data['cekapi'] = $this->db->get_where('tb_api',['api_id' => 1])->row_array();
		$data['keranjang'] = $this->cart->contents();
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/login', $data);
		}else {
			$this->Home_model->sigin_user();
		}
	}

	public function sigout() {
		$this->session->sess_destroy();
		redirect('login');
	}

	public function apply_promo() {
		$cek = $this->db->get_where('tb_promo',['promo_kode' => $this->input->post('kodepromo')])->row_array();
		$begtotal = $this->cart->total() * $cek['promo_persen'] / 100;
		$dibayar = $this->cart->total() - $begtotal;
		if($cek) {
			$data = array (
				'kodepromo'			=>	$this->input->post('kodepromo'),
				'potongan'			=>	$begtotal,
				'potonganprc'		=>	$cek['promo_persen'],
				'potongantitle'		=>	$cek['promo_judul'],
				'dibayar'			=>	$dibayar,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('flashkodepromo', 'Kode promo berhasil digunakan');
			redirect('');
		}else {
			$this->session->set_flashdata('errorkodepromo', 'Kode promo tidak ditemukan');
			redirect('');
		}
	}

	public function help_page() {
		$data = array (
			'title'				=>	'Bantuan',
			'profil'			=>	$this->Home_model->profil_toko(),
			'keranjang'			=>	$this->cart->contents(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'transaksi'			=>	$this->User_model->data_transaksi(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/help', $data);
	}

	private function search_blog($title){
        $this->db->like('transaksi_tujuan', $title , 'both');
        $this->db->order_by('transaksi_tujuan', 'ASC');
        $this->db->where('transaksi_userid', $this->session->userdata('userid'));
        return $this->db->get('tb_transaksi')->result();
    }

	public function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->transaksi_tujuan;
                echo json_encode($arr_result);
            }
        }
    }

	public function lanjut() {
		$cektransaksi = $this->db->get_where('tb_transaksi',['transaksi_userid' => $this->session->userdata('userid'), 'transaksi_status' => 'belum'])->row_array();
		if($this->session->userdata('userid') == '') {
			$this->session->set_flashdata('error', 'Silahkan login dahulu');
			$this->session->set_userdata('kesini', 'checkout');
			redirect('login');
		}
		if($this->cart->total() == 0 ) {
			redirect('');
		}
		if($cektransaksi) {
			$this->cart->destroy();
			$this->session->set_flashdata('error', 'Silahkan selesaikan pembayaran untuk transaksi berikut');
			redirect('user/panel');
		}
		$data = array (
			'title'				=>	'Checkout',
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->form_validation->set_rules('prov', 'prov', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('kota', 'kota', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('pos', 'pos', 'required|numeric|min_length[5]|max_length[5]', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'Kode POS harus berupa angka',
					'min_length'=>	'Kode POS minimal 5 angka',
					'max_length'=>	'Kode POS maksimal 5 angka']);
		$this->form_validation->set_rules('kurir', 'kurir', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('layanan', 'layanan', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('ongkir', 'ongkir', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('total', 'total', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('nama', 'nama', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('telp', 'telp', 'required|numeric', [
					'required'	=>	'Kolom ini tidak boleh kosong',
					'numeric'	=>	'No telepon harus angka']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/checkout', $data);
		}else {
			$tagihan = array (
				'tagihan'		=>	$this->input->post('total'),
			);
			$this->session->set_userdata($tagihan);
			$this->Home_model->simpan_transaksi();
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

	public function getcost() {
		$cekapi = $this->db->get_where('tb_api',['api_id' => 1])->row_array();
		$ceklok = $this->db->get_where('tb_lokasi',['lok_id' => 1])->row_array();
		$apikey = $cekapi['api_ongkir'];
		$keranjang = $this->cart->contents();
		$asal = $ceklok['lok_id_kota'];
		$dest = $this->input->post('dest', TRUE);
		$kurir = $this->input->post('kurir', TRUE);
		$berat = 0;

		foreach ($keranjang as $key) {
			$berat += ($key['weight'] * $key['qty']);
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
		  CURLOPT_HTTPHEADER => array(
		    "content-type: application/x-www-form-urlencoded",
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

		  echo '<option value="" selected disabled>Layanan yang tersedia</option>';

		  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {

				for ($l=0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

					echo '<option value="'.$data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'].','.$data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')">';
					echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'].'('.$data['rajaongkir']['results'][$i]['costs'][$l]['description'].')</option>';

				}

		  }
		}
	}

	public function cost() {
		if($this->session->userdata('kodepromo')) {
			$biaya = explode(',', $this->input->post('layanan', TRUE));
			$total = $this->session->userdata('dibayar') + $biaya[0];
			echo $biaya[0].','.$total;
		}else {
			$biaya = explode(',', $this->input->post('layanan', TRUE));
			$total = $this->cart->total() + $biaya[0];
			echo $biaya[0].','.$total;
		}
	}

	public function token() {
		$me = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array();
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  // 'gross_amount' => '500000', // no decimal allowed for creditcard
		  'gross_amount' => $this->session->userdata('tagihan'), // no decimal allowed for creditcard
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $me['user_nama'],
		  'email'         => $me['user_email'],
		  'phone'         => $me['user_telp']
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'hour', 
            'duration'  => 4
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            // 'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function send() {
    	if($this->input->post('result_data') == '') {
    		redirect('logout');
    	}else {
    		$result = json_decode($this->input->post('result_data'), true);
    		$this->session->unset_userdata('tagihan');
    		$this->session->set_flashdata('flash', 'Transaksi berhasil');
    		$this->Home_model->simpan_notif_bayar_selesai();
    		redirect('terimakasih');
    	}
    	// echo 'RESULT <br><pre>';
    	// $status = $result['status_message'];
    	// var_dump($status);
    	// echo '</pre>' ;

    }

    public function met() {
    	if($this->session->userdata('tagihan') == 0) {
    		redirect('checkout');
    	}
    	$data = array (
			'title'				=>	'Pilih Metode Pembayaran',
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/method', $data);
	}

	public function thky() {
    	$data = array (
			'title'				=>	'Transaksi berhasil',
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
		);
		$this->load->view('mobile/terimakasih');
	}

	public function tag($url) {
		$cek = $this->db->get_where('tb_kategori',['url' => $url])->row_array();
		if($this->uri->segment(2) == '') {
			redirect('');
		}
		$data = array (
			'title'				=>	'Kategori '.$cek['kategori'],
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'produkbys'			=>	$this->Home_model->all_produk_bys(),
			'keranjang'			=>	$this->cart->contents(),
			'wishlist'			=>	$this->User_model->data_wishlist(),
			'notifikasi'		=>	$this->User_model->data_notifikasi(),
			'dataartikel'		=>	$this->Home_model->data_artikel_for_home(),
			'me'				=>	$this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array(),
			'kate'				=>	$url,
			'produk'			=>	$this->Home_model->produkbytag($url),
		);
		$this->load->view('mobile/tag_results', $data);
	}

	public function wish($id) {
		if($this->session->userdata('userid') == '') {
			$this->session->set_flashdata('error', 'Silahkan login dahulu');
			redirect('login');
		}
		$data = array (
			'list_id'			=>   md5(microtime()),
			'list_proid'		=>   $id,
			'list_userid'		=>   $this->session->userdata('userid'),
		);
	
		$this->db->insert('tb_wishlist', $data);
		$this->session->set_flashdata('flash', 'Berhasil');
    	redirect('user/wishlist');
	}

	public function fopas() {
		$data = array (
			'title'				=>	'Lupa password',
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
		);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
					'required'	=>	'Kolom email tidak boleh kosong',
					'valid_email'=>	'Email tidak valid']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/login', $data);
		}else {
			$this->_cek_lupa_password();
		}
	}

	private function _cek_lupa_password() {
		$email = strtolower($this->input->post('email'));
		$pengguna = $this->db->get_where('tb_users',['user_email' => $email, 'user_status' => 1])->row_array();

		if($pengguna) {
			$token = base64_encode(openssl_random_pseudo_bytes(32));
			$token_pengguna = array (
				'email'		=>	$email,
				'token'		=>	$token,
				'created'	=>	time()
			);

			$this->db->insert('tb_token', $token_pengguna);
			$this->_sendemail($token);
			$this->session->set_flashdata('flash', 'Silahkan periksa email anda untuk mengganti password');
			redirect('lupa-password');
		}else {
			$this->session->set_flashdata('error', 'Maaf, email tidak terdaftar');
			redirect('lupa-password');
		}
	}

	private function _sendemail($token) {
		$cekmail = $this->db->get_where('tb_email',['email_id' => 1])->row_array();

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'RESET PASSWORD';
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

		$this->email->from($cekmail['email'], 'RESET PASSWORD'); //email anda di sini
		$this->email->to($this->input->post('email'));
        $this->email->subject('RESET PASSWORD');
		$this->email->message('Klik tombol di bawah ini untuk mengatur ulang password anda. <p><a href="' . base_url() . 'change?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Ganti Password</a></p>');

		$this->email->send();
	}

	public function ganti() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('tb_users',['user_email' => $email])->row_array();

		if($pengguna) {
			$token_pengguna = $this->db->get_where('tb_token',['token' => $token])->row_array();
			if($token_pengguna) {
				if(time() - $token_pengguna['created'] < (60*60*60)) {
					$this->session->set_userdata('reset_email', $email);
					$this->ubah_password();
				}else {
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Token kadaluarsa !');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Token salah');
				redirect('login');
			}
		}else {
			$this->session->set_flashdata('error', 'Email salah');
			redirect('login');
		}
	}

	public function ubah_password() {
		if(!$this->session->userdata('reset_email')) {
			redirect('login');
		}
		$data = array (
			'title'				=>	'Atur ulang password',
			'profil'			=>	$this->Home_model->profil_toko(),
			'cekapi'			=>	$this->db->get_where('tb_api',['api_id' => 1])->row_array(),
			'kategori'			=>	$this->Home_model->all_kategori(),
			'keranjang'			=>	$this->cart->contents(),
		);
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
					'required'	=>	'Kolom password baru tidak boleh kosong',
					'min_length'=>	'Minimal 5 karakter']);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
					'required'	=>	'Kolom konfirmasi password baru tidak boleh kosong',
					'matches'	=> 'Konfirmasi password baru tidak sama']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('mobile/login', $data);
		}else {
			$password = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('user_sandi', $password);
			$this->db->where('user_email', $email);
			$this->db->update('tb_users');
			$this->db->where('email', $email);
			$this->db->delete('tb_token');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('flash', 'Password berhasil diperbaharui');
			redirect('login');
		}
	}

	public function verify() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$cek_member = $this->db->get_where('tb_users', ['user_email' =>	$email])->row_array();
		$usid = $cek_member['user_id'];
		if($cek_member) {
			$member_token = $this->db->get_where('tb_token', ['token' => $token])->row_array();
			if($member_token) {
				if(time() - $member_token['created'] < (60*60*60)) {
					$this->db->set('user_status', 1);
					$this->db->where('user_email', $email);
					$this->db->update('tb_users');
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('flash', 'Verifikasi email berhasil, silahkan login !');
					$this->ns_new_member($usid);
					redirect('login');
				}else {
					$this->db->delete('tb_users', ['user_email' => $email]);
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Verifikasi email gagal, token kadaluarsa !');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Verifikasi email gagal, token tidak valid !');
				redirect('login');
			}
		}else {
			$this->session->set_flashdata('error', 'Verifikasi email gagal, email tidak valid !');
			redirect('login');
		}
	}

	private function ns_new_member($usid) {
		$data = array (
			'ns_id'			=>   md5(rand()),
			'ns_dari'		=>   $usid,
			'ns_perihal'	=>   'Member baru',
			'ns_status'		=>   0,
		);
	
		$this->db->insert('tb_notif_sistem', $data);
	}

}
