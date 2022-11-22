<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function cek_aks() {
        $ceks = $this->db->get_where('tb_lock',['lock_id' => 1])->row_array();
        if($ceks['lock_status'] == 'YES') {
            $this->session->set_flashdata('error','Penggunaan versi demo dibatasi');
            redirect('admin');
        }
    }

	public function data_produk() {
		$this->db->order_by('produk_tgl', 'DESC');
		return $this->db->get('tb_produk')->result_array();
	}

	public function data_kategori() {
		return $this->db->get('tb_kategori')->result_array();
	}

	private function kategori($id_item, $kategori) {
		$kat = explode(", ", $kategori);
		$len = count($kat);
		$a = array(' ');
		$b = array ('`','~','!','@','#','$','%','^','&','*','(',')','_','+','=','[',']','{','}','\'','"',':',';','/','\\','?','/','<','>');

		for ($i = 0; $i  < $len; $i ++) {
			$url = str_replace($b, '', $kat[$i]);
			$url = str_replace($a, '-', strtolower($url));

			$cek = $this->get_where('tb_kategori', ['url' => $url]);

			if ($cek->num_rows() > 0) {

				$get = $cek->row();
				$id_kat = $get->id_kategori;

			} else {

				$data = array(
					'id_kategori' => rand(),
					'kategori' => ucwords(trim($kat[$i])),
					'url' => $url
				);

				$id = $this->insert_last('tb_kategori', $data);
				if($id) {
					$id_kat = $id->id_kategori;
				}
				
				
			}

			$cek2 = $this->get_where('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id_kat]);

			if ($cek2->num_rows() < 1) {
				$this->insert('tb_rkategori', ['id_item' => $id_item, 'id_kategori_r' => $id_kat]);
			}
		}
	}

	public function get_where($table = null, $where = null) {
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function insert_last($table = '', $data = '') {
		$this->db->insert($table, $data);
		$last = $this->db->order_by('id_kategori',"desc")->limit(1)->get($table)->row();
		return $last;
	}

	public function insert($table = '', $data = '') {
		$this->db->insert($table, $data);
	}

	public function simpan_produk() {
		$id = md5(rand());
		$id_item = $id;
	    $url = url_title(strtolower($this->input->post('nama')), 'dash', TRUE).'-'.time().'.html';
	    $pdbeg = $this->input->post('harga') * $this->input->post('diskon') / 100;
	    $pricediskon = $this->input->post('harga') - $pdbeg;
	
	    // get foto
	    $config['upload_path'] = 'wp-content/img/product/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'produk_id'					=>	$id,
                    'produk_url'				=>	$url,
                    'produk_name'				=>	ucwords($this->input->post('nama')),
                    'produk_stok'				=>	$this->input->post('stok'),
                    'produk_weight'				=>	$this->input->post('berat'),
                    'produk_diskon'				=>	$this->input->post('diskon'),
                    'produk_price'				=>	$this->input->post('harga'),
                    'produk_price_diskon'		=>	$pricediskon,
                    'produk_description'		=>	$this->input->post('deskripsi'),
					'produk_image'				=>	$gambar['file_name']
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/master/produk/new');
	    }
	
		$this->db->insert('tb_produk', $data);
		$this->kategori($id_item, $this->input->post('kategori'));
	}
	
	public function ubah_produk($id) {
		$pdbeg = $this->input->post('harga') * $this->input->post('diskon') / 100;
	    $pricediskon = $this->input->post('harga') - $pdbeg;
	
	    // get foto
	    $config['upload_path'] = 'wp-content/img/product/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'produk_name'				=>	ucwords($this->input->post('nama')),
                    'produk_stok'				=>	$this->input->post('stok'),
                    'produk_weight'				=>	$this->input->post('berat'),
                    'produk_diskon'				=>	$this->input->post('diskon'),
                    'produk_price'				=>	$this->input->post('harga'),
                    'produk_price_diskon'		=>	$pricediskon,
                    'produk_description'		=>	$this->input->post('deskripsi'),
					'produk_image'				=>	$gambar['file_name']
                );
           }
	    }else {
	    	$data = array(
                'produk_name'				=>	ucwords($this->input->post('nama')),
                'produk_stok'				=>	$this->input->post('stok'),
                'produk_weight'				=>	$this->input->post('berat'),
                'produk_diskon'				=>	$this->input->post('diskon'),
                'produk_price'				=>	$this->input->post('harga'),
                'produk_description'		=>	$this->input->post('deskripsi'),
				'produk_image'				=>	$this->input->post('gambar_old')
	        );
	    }
	
		$this->db->where('produk_id', $id);
		$this->db->update('tb_produk', $data);
		$this->db->delete('tb_rkategori', ['id_item' => $id]);
		$this->kategori($id, $this->input->post('kategori'));
	}

	public function simpan_photos($id) {
		$filesCount = count($_FILES['files']['name']);
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']    = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];
            
            // File upload configuration
            $uploadPath = 'wp-content/img/product/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
            $config['encrypt_name'] = TRUE;
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $uploadData[$i]['fr_proid'] = $id;
                $uploadData[$i]['fr_nama'] = $fileData['file_name'];
            }
        }
        if($uploadData) {
        	$this->db->insert_batch('tb_foto_rel', $uploadData);
        }else {
        	$this->session->set_flashdata('error', 'Pilih foto minimal 1');
			redirect('admin/master/produk/image/'.$id);
        }
	}

	public function simpan_kategori() {
		$url = url_title(strtolower($this->input->post('nama')), 'dash', TRUE);
	
	    // get foto
	    $config['upload_path'] = 'wp-content/img/category/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'id_kategori'		=>	rand(),
                    'kategori'			=>	ucwords($this->input->post('nama')),
                    'url'				=>	$url,
					'kat_image'			=>	$gambar['file_name']
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih foto untuk kategori');
			redirect('admin/master/kategori/new');
	    }
	
		$this->db->insert('tb_kategori', $data);
	}
	
	public function edit_kategori($id) {
		$url = url_title(strtolower($this->input->post('nama')), 'dash', TRUE);
	    // get foto
	    $config['upload_path'] = 'wp-content/img/category/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'kategori'		=>	ucwords($this->input->post('nama')),
                    'url'			=>	$url,
					'kat_image'		=>	$gambar['file_name']
                );
           }
	    }else {
	    	$data = array(
	            'kategori'		=>	ucwords($this->input->post('nama')),
	            'url'			=>	$url,
				'kat_image'		=>	$this->input->post('gambar_old')
	        );
	    }
	
		$this->db->where('id_kategori', $id);
		$this->db->update('tb_kategori', $data);
	}

	public function data_komentar() {
		$this->db->select('*');
		$this->db->from('tb_reviews');
		$this->db->join('tb_users', 'tb_users.user_id = tb_reviews.re_userid');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_reviews.re_produkid');
		$this->db->order_by('re_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_transaksi_index() {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->order_by('transaksi_time', 'DESC');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}

	public function data_transaksi() {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function transaksibyid($id) {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_id', $id);
		return $this->db->get();
	}

	public function data_artikel() {
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function simpan_artikel() {
	    $url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE).'-'.time().'.html';
	
	    // get foto
	    $config['upload_path'] = 'wp-content/img/blog/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'blog_id'					=>	md5(rand()),
                    'blog_url'					=>	$url,
                    'blog_judul'				=>	ucwords($this->input->post('judul')),
                    'blog_isi'					=>	$this->input->post('isi'),
					'blog_gambar'				=>	$gambar['file_name']
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/artikel/new');
	    }
	
		$this->db->insert('tb_blog', $data);
	}
	
	public function ubah_artikel($id) {
		$url = url_title(strtolower($this->input->post('judul')), 'dash', TRUE).'-'.time().'.html';
	
	    // get foto
	    $config['upload_path'] = 'wp-content/img/blog/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'blog_url'					=>	$url,
                    'blog_judul'				=>	ucwords($this->input->post('judul')),
                    'blog_isi'					=>	$this->input->post('isi'),
					'blog_gambar'				=>	$gambar['file_name']
                );
           }
	    }else {
	    	$data = array(
                'blog_url'					=>	$url,
                'blog_judul'				=>	ucwords($this->input->post('judul')),
                'blog_isi'					=>	$this->input->post('isi'),
				'blog_gambar'				=>	$this->input->post('gambar_old'),
	        );
	    }
	
		$this->db->where('blog_id', $id);
		$this->db->update('tb_blog', $data);
	}

	public function data_slider() {
		return $this->db->get('tb_slider')->result_array();
	}

	public function simpan_slider() {
	    // get foto
	    $config['upload_path'] = 'wp-content/img/slider/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'slider_text_1'			=>	ucwords($this->input->post('teks1')),
                    'slider_text_2'			=>	ucwords($this->input->post('teks2')),
                    'slider_text_3'			=>	ucwords($this->input->post('teks3')),
                    'slider_urutan'			=>	$this->input->post('urutan'),
                    'slider_link'			=>	strtolower($this->input->post('url')),
					'slider_gambar'			=>	$gambar['file_name']
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/master/slider/new');
	    }
	
		$this->db->insert('tb_slider', $data);
	}

	public function edit_slider($id) {
	    // get foto
	    $config['upload_path'] = 'wp-content/img/slider/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
                    'slider_text_1'			=>	ucwords($this->input->post('teks1')),
                    'slider_text_2'			=>	ucwords($this->input->post('teks2')),
                    'slider_text_3'			=>	ucwords($this->input->post('teks3')),
                    'slider_urutan'			=>	$this->input->post('urutan'),
                    'slider_link'			=>	strtolower($this->input->post('url')),
					'slider_gambar'			=>	$gambar['file_name']
                );
           }
	    }else {
	    	$data = array(
                'slider_text_1'			=>	ucwords($this->input->post('teks1')),
                'slider_text_2'			=>	ucwords($this->input->post('teks2')),
                'slider_text_3'			=>	ucwords($this->input->post('teks3')),
                'slider_urutan'			=>	$this->input->post('urutan'),
                'slider_link'			=>	strtolower($this->input->post('url')),
				'slider_gambar'			=>	$this->input->post('gambar_old'),
            );
	    }
	
		$this->db->where('slider_id', $id);
		$this->db->update('tb_slider', $data);
	}

	public function data_promo() {
		$this->db->order_by('promo_persen', 'DESC');
		return $this->db->get('tb_promo')->result_array();
	}

	public function simpan_promo() {
		$data = array (
			'promo_id'			=>   md5(rand()),
			'promo_kode'		=>   strtoupper($this->input->post('kode')),
			'promo_masa'		=>   $this->input->post('masa'),
			'promo_judul'		=>   ucwords($this->input->post('judul')),
			'promo_persen'		=>   $this->input->post('persen'),
		);
	
		$this->db->insert('tb_promo', $data);
	}

	public function edit_promo($id) {
		$data = array (
			'promo_kode'		=>   strtoupper($this->input->post('kode')),
			'promo_masa'		=>   $this->input->post('masa'),
			'promo_judul'		=>   ucwords($this->input->post('judul')),
			'promo_persen'		=>   $this->input->post('persen'),
		);
	
		$this->db->where('promo_id', $id);
		$this->db->update('tb_promo', $data);
	}
	
	public function data_member() {
		$this->db->order_by('user_created', 'DESC');
		return $this->db->get('tb_users')->result_array();
	}

	public function data_member_index() {
		$this->db->limit(5);
		$this->db->order_by('user_created', 'DESC');
		return $this->db->get('tb_users')->result_array();
	}

	public function graph() {
		$this->db->select('transaksi_tgl,transaksi_total');
		$this->db->order_by('transaksi_time','DESC');
		return $this->db->get('tb_transaksi')->result();
	}

	public function data_pesan() {
		$this->db->order_by('pesan_tgl', 'DESC');
		return $this->db->get('tb_pesan')->result_array();
	}

	public function data_notifikasi() {
		$this->db->order_by('ns_time', 'DESC');
		$this->db->where('ns_status', 0);
		$this->db->limit(5);
		return $this->db->get('tb_notif_sistem')->result_array();
	}

	public function data_notifikasi_pesan() {
		$this->db->order_by('notif_time', 'DESC');
		$this->db->where('notif_status', 0);
		$this->db->where('notif_perihal', 'Pesan baru');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function simpan_password() {
		$sandi = $this->input->post('password');
		$sandi2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array();

		if(password_verify($sandi, $cek['admin_sandi'])) {
			$this->db->set('admin_sandi', $sandi2);
			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin');
			$this->session->set_flashdata('flash', 'Password anda berhasil diperbaharui');
			redirect('admin/password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('admin/password');
		}
	}

	public function simpan_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_admin',['admin_id' => $this->session->userdata('adminid')])->row_array();

		if(password_verify($sandi, $cek['admin_sandi'])) {

			// get foto
		    $config['upload_path'] = 'wp-admin/images/';
		    $config['allowed_types'] = 'jpg|jpeg|png|gif|svg';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'admin_nama'				=>	ucwords($this->input->post('nama')),
	                    'admin_email'				=>	strtolower($this->input->post('email')),
						'admin_foto'				=>	$gambar['file_name'],
	                );
	           }
		    }else {
		    	$data = array(
	                'admin_nama'				=>	ucwords($this->input->post('nama')),
                    'admin_email'				=>	strtolower($this->input->post('email')),
					'admin_foto'				=>	$this->input->post('gambar_old'),
		        );
		    }

			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('tb_admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/profil');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password salah');
			redirect('admin/profil');
		}
	}

	public function simpan_profiltoko() {
		$data = array(
            'profil_nama'		=>	ucwords($this->input->post('nama')),
            'profil_email'		=>	strtolower($this->input->post('email')),
            'profil_telp'		=>	$this->input->post('telp'),
            'profil_alamat'		=>	$this->input->post('alamat'),
        );
	
		$this->db->where('profil_id', 1);
		$this->db->update('tb_profil', $data);
	}

	public function simpan_lokasi() {
		$prov = explode(",", $this->input->post('prov', TRUE));
		$kota = explode(",", $this->input->post('kota', TRUE));
		$data = array (
			'lok_id_prov'		=>   $prov[0],
			'lok_prov'			=>   $prov[1],
			'lok_id_kota'		=>   $kota[0],
			'lok_kota'			=>   $kota[1]
		);
	
		$this->db->where('lok_id', 1);
		$this->db->update('tb_lokasi', $data);
	}

	public function simpan_email() {
		$data = array (
			'email'						=>   strtolower($this->input->post('email')),
			'email_password'			=>   $this->input->post('password'),
		);
	
		$this->db->where('email_id', 1);
		$this->db->update('tb_email', $data);
	}

	public function simpan_api_ongkir() {
		$data = array (
			'api_ongkir'			=>   $this->input->post('key'),
		);
		// var_dump($data);
		// die;
		$this->db->where('api_id', 1);
		$this->db->update('tb_api', $data);
	}

	public function simpan_api_midtrans() {
		$data = array (
			'api_mid_client'		=>   $this->input->post('client'),
			'api_mid_server'		=>   $this->input->post('server'),
		);
	
		$this->db->where('api_id', 1);
		$this->db->update('tb_api', $data);
	}

	public function data_transaksi_filter($daterange) {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_users', 'tb_users.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_time >=', $daterange[0]);
		$this->db->where('transaksi_time <=', $daterange[1]);
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function produk_terlaris() {
		$this->db->select('SUM(d_transaksi_qty) as jumlah, produk_image as fotoproduk, produk_name as namaproduk, produk_price_diskon as diskonproduk');
		$this->db->from('tb_detail_transaksi');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->order_by('d_transaksi_qty', 'DESC');
		$this->db->group_by('d_transaksi_item');
		$this->db->limit(5);
		return $this->db->get()->result_array();
	}

	public function simpan_detail_transaksi($id) {
		$data = array (
			'transaksi_resi'			=>   $this->input->post('resi'),
		);
		$this->db->where('transaksi_id', $id);
		$this->db->update('tb_transaksi', $data);
	}
}