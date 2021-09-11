<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
	public function index(){
		$role_id = $this->session->userdata('role_id');

		if($role_id == 1){
	        $data['title'] = 'Halaman Profil';
	        $data['user'] = $this->db->get_where('user', ['email' =>
	        $this->session->userdata('email')])->row_array();

	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('templates/profil', $data);
	        $this->load->view('templates/footer');
		}elseif($role_id == 2){
	        $data['title'] = 'Supervisor';
	        $data['user'] = $this->db->get_where('user', ['email' =>
	        $this->session->userdata('email')])->row_array();

	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar-supervisor', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('templates/profil', $data);
	        $this->load->view('templates/footer');
		}else{
			$data['title'] = 'Marketing';
	        $data['user'] = $this->db->get_where('user', ['email' => 
	        $this->session->userdata('email')])->row_array();

	        $this->load->view('templates/header', $data);
	        $this->load->view('templates/sidebar-marketing', $data);
	        $this->load->view('templates/topbar', $data);
	        $this->load->view('templates/profil', $data);
	        $this->load->view('templates/footer'); 
		}
	}

	public function ubahPassword(){
		$id = $this->session->userdata('id');

		$userdata = $this->db->get_where('user', ['id' => $id])->row_array();

		$old = $this->input->post('old_pw');
		$new = $this->input->post('new_pw');
		$confirm = $this->input->post('confirm_pw');

		if(password_verify($old, $userdata['password'])){
			if($new == $confirm){
				$password = password_hash($new, PASSWORD_DEFAULT);

				$data = ['password' => $password];

				$this->db->where('id', $id);
				$this->db->set($data);
				if($this->db->update('user')){
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		            Berhasil mengubah Kata Sandi!</div>');
		            redirect('pengaturan');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
		            Someting went wrong, please try again!</div>');
		            redirect('pengaturan');
				}


			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
	            Maaf, Konfirmasi Kata Sandi yang anda masukan salah!</div>');
	            redirect('pengaturan');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Maaf, Kata Sandi lama yang anda masukan salah!</div>');
            redirect('pengaturan');
		}
	}

	public function ubahProfil(){
		$id = $this->session->userdata('id');

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');

		$data = ['name' => $nama, 'email' => $email];

		$this->db->where('id', $id);
		$this->db->set($data);
		if($this->db->update('user')){
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mengubah profil, lakukan login ulang untuk melihat perubahan!</div>');
            redirect('pengaturan');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Gagal mengubah profil, silahkan coba lagi nanti!</div>');
            redirect('pengaturan');
		}
	}

}