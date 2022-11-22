<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function data_transaksi_limit() {
		$this->db->limit(5);
		$this->db->order_by('transaksi_tgl_pesan', 'DESC');
		$this->db->where('transaksi_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi() {
		$this->db->order_by('transaksi_tgl_pesan', 'DESC');
		$this->db->where('transaksi_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi');
	}

	public function upload_bukti($id) {
	
	    // get foto
	    $config['upload_path'] = 'wp-admin/images/bukti/';
	    $config['allowed_types'] = 'jpg|png|jpeg|gif';
	    $config['encrypt_name'] = TRUE;
	
	    $this->upload->initialize($config);
	    if (!empty($_FILES['gambar']['name'])) {
	        if ( $this->upload->do_upload('gambar') ) {
	            $gambar = $this->upload->data();
	                
	            $data = array(
					'transaksi_bukti'	=>	$gambar['file_name']
                );
           }
	    }else {
	    	$this->session->set_flashdata('error', 'Kolom tidak boleh kosong');
			redirect('user/upload-bukti/'.$id);
	    }
	
		$this->db->where('transaksi_id', $id);
		$this->db->update('tb_transaksi', $data);
	}

	public function kirim_reviews($id) {
		$data = array (
			're_id'				=>   md5(rand()),
			're_userid'			=>   $this->session->userdata('userid'),
			're_produkid'		=>   $this->input->post('produk'),
			're_bintang'		=>   $this->input->post('bintang'),
			're_isi'			=>   $this->input->post('isi'),
			're_transaksi'		=>   $id,
		);
	
		$this->db->insert('tb_reviews', $data);
	}

	public function _cekpas() {
		$nama = ucwords($this->input->post('nama'));
		$email = strtolower($this->input->post('email'));
		$sandi = $this->input->post('password');
		$cekpassw = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array();

		if(password_verify($sandi, $cekpassw['user_sandi'])) {
			$data = array (
				'user_nama'			=>   $nama,
				'user_email'		=>   $email
			);
		
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('tb_users', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('user/profil');
		}else {
			$this->session->set_flashdata('error','Konfirmasi password salah, silahkan coba lagi');
			redirect('user/profil');
		}
	}

	public function data_komentar() {
		$this->db->select('*');
		$this->db->from('tb_komentar');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_komentar.komentar_proid');
		$this->db->order_by('komentar_tgl', 'DESC');
		$this->db->where('komentar_userid', $this->session->userdata('userid'));
		return $this->db->get()->result_array();
	}

	public function del_komentar($id) {
		$this->db->where('komentar_id', $id);
		$this->db->delete('tb_komentar');
	}

	public function data_wishlist() {
		$this->db->select('*');
		$this->db->from('tb_wishlist');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_wishlist.list_proid');
		$this->db->join('tb_rkategori', 'tb_rkategori.id_item = tb_produk.produk_id');
		$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_rkategori.id_kategori_r');
		$this->db->order_by('list_tgl', 'DESC');
		$this->db->where('list_userid', $this->session->userdata('userid'));
		return $this->db->get()->result_array();
	}

	public function data_notifikasi() {
		$this->db->where('notif_userid', $this->session->userdata('userid'));
		$this->db->where('notif_status', 1);
		$this->db->order_by('notif_time', 'DESC');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function simpan_profil() {
		$sandi = $this->input->post('password');
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array();

		if(password_verify($sandi, $cek['user_sandi'])) {
			$config['upload_path'] = 'wp-content/img/';
		    $config['allowed_types'] = 'jpg|png|jpeg|gif';
		    $config['encrypt_name'] = TRUE;
		
		    $this->upload->initialize($config);
		    if (!empty($_FILES['gambar']['name'])) {
		        if ( $this->upload->do_upload('gambar') ) {
		            $gambar = $this->upload->data();
		                
		            $data = array(
	                    'user_nama'			=>	ucwords($this->input->post('nama')),
	                    'user_telp'			=>	$this->input->post('telp'),
						'user_alamat'			=>	$this->input->post('alamat'),
						'user_kpos'			=>	$this->input->post('kpos'),
	                    'user_email'		=>	strtolower($this->input->post('email')),
						'user_foto'			=>	$gambar['file_name']
	                );
	           }
		    }else {
		    	$data = array(
	                'user_nama'			=>	ucwords($this->input->post('nama')),
                    'user_telp'			=>	$this->input->post('telp'),
                    'user_alamat'			=>	$this->input->post('alamat'),
                    'user_kpos'			=>	$this->input->post('kpos'),
                    'user_email'		=>	strtolower($this->input->post('email')),
					'user_foto'			=>	$this->input->post('gambar_old')
		        );
		    }
		
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('tb_users', $data);
			$this->session->set_flashdata('flash', 'Profil berhasil diperbaharui');
			redirect('user/akun');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi sandi salah');
			redirect('user/akun/profil');
		}
	}

	public function simpan_password() {
		$password = $this->input->post('password');
		$password2 = password_hash($this->input->post('password2'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('tb_users',['user_id' => $this->session->userdata('userid')])->row_array();

		if(password_verify($password, $cek['user_sandi'])) {
			$this->db->set('user_sandi', $password2);
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('tb_users');
			$this->session->set_flashdata('flash', 'Password berhasil diperbaharui');
			redirect('user/akun');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi password lama salah');
			redirect('user/akun/password');
		}
	}
}